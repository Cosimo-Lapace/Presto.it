<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request, $article_id)
    {

        $user_id = Auth::id();
        $favorite = Favorite::where('user_id', $user_id)
            ->where('article_id', $article_id)
            ->first();

        if (!$favorite) {
            $favorite = new Favorite();
            $favorite->user_id = $user_id;
            $favorite->article_id = $article_id;
            $favorite->check = True;
            session(['check'=> $favorite->check]);
            $favorite->save();



            return redirect()->back()->with('success', 'Articolo aggiunto ai preferiti!');
        }else{
            $favorite->check = False;
            session(['check'=> $favorite->check]);
            $favorite->delete();

            return redirect()->back()->with('success', 'Articolo rimosso dai preferiti!');
        }


    }

    public function index()
    {
        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->with('article')->get();
        return view('preferiti', compact('favorites'));
    }

    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();

        return redirect()->back()->with('success', 'Articolo rimosso dai preferiti!');
    }
}
