<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function welcome(Article $article, Category $category){
        $array = [

            'articles' => $article::where('is_accepted' , true)->paginate(3)->sortBy('created_at'),   //creo un array contenente le due classi;;;
            'categories' =>$category::all()

             ];


        return view('welcome', $array);
    }
    public function annunci(Article $article, Category $category){
        $articles = Article::where('is_accepted' , true)->paginate(12);
        $categories = $category::all();
        return view('annunci',compact('articles','categories'));
    }
    public function imieiannunci(){
        $user = Auth::user();
        $articles = Article::where('is_accepted' , true)->where('user_id', $user->id)->get();
        return view('imieiannunci', compact('articles'));
    }


    public function profilo(){

        $user= User::all();
        return view ('modifica', compact('user'));
    }


    public function profiloPost (Request $request,User $user){

        $user->fill($request->all())->save();
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $fileExtension = $request->file('image')->extension();
            $randomFileName = date('Y_m_d'). uniqid('_image_') . '.' . $fileExtension;
            $imagePath = $request->file('image')->storeAs('public/images/user' . $user->id, $randomFileName);
            $user->image = $imagePath;
            $user->save();
        }
        return redirect()->back();
    }
    // LINGUA
    public function setLenguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function searchsimple(Request $request,Category $category){
        $query = Article::where('is_accepted', true);
        if ($request->filled('searchtitle')) {
            $query->where('title', 'like', '%' . $request->input('searchtitle') . '%');
        }
        if ($request->filled('searchcategories')) {
            $query->where('category_id', 'like', '%'.$request->input('searchcategories').'%');
        }
        if ($request->filled('searchLatestandOldest')) {
            $query->when($request->input('searchLatestandOldest') === 'latest', function($q) {
                $q->orderBy('created_at', 'desc');
            }, function ($q) {
                $q->orderBy('created_at', 'asc');
            });
        }
        $results = $query->orderBy('title')->paginate(12);
        $categories = $category::all();
        return view('annunci', ['articles' => $results, 'categories'=> $categories]);

    }
    /* endfiltri */
    /* filtro avanzato */
    public function advancedsearch(Request $request,Category $category) {
        $query = Article::where('is_accepted', true);

            if ($request->filled('advancedsearchtitle')) {
                $query->where('title', 'like', '%' . $request->input('advancedsearchtitle') . '%');
            }

            if ($request->filled('advancedsearcategories')) {
                $query->where('category_id', 'like', '%'.$request->input('advancedsearcategories').'%');
            }

            if ($request->filled('advancedsearchbody')) {
                $query->where('body', 'like', '%' . $request->input('advancedsearchbody') . '%')
                ->orWhere('title', 'like', '%' . $request->input('advancedsearchbody') . '%');
            }

            if ($request->filled('advancedsearchtype')){
                $query->when($request->input('advancedsearchtype') === 'advancedsearchtypesell',function($q){
                    $q->where('type','like','%'.'vendo'.'%');
                });
                $query->when($request->input('advancedsearchtype') === 'advancedsearchtypesearch',function($q){
                    $q->where('type','like','%'.'cerco'.'%');
                });
            }

            if ($request->filled('advancedsearchlatestoldest')) {
                $query->when($request->input('advancedsearchlatestoldest') === 'latestmodal', function($q) {
                    $q->orderBy('created_at', 'desc');
                }, function ($q) {
                    $q->orderBy('created_at', 'asc');
                });
            }

            $results = $query->orderBy('title')->paginate(12);
            $categories = $category::all();

            return view('annunci', ['articles' => $results,'categories'=> $categories]);
        }
        /* fine filtro avanzato */


}
