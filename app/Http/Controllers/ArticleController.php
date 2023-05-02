<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Mockery\Undefined;
use App\Jobs\AddWatermarkJob;
use App\Jobs\AddWatermarkJob2;
use App\Jobs\AddWatermarkJob3;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\GoogleVisualabelImage;
use App\Jobs\RemoveFaces;
use PhpParser\Node\Expr\New_;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();

        return view('ads' , compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */







    public function store(StoreArticleRequest $request)
    {
        $article = Article::create([
            'user_id' => auth()->user()->id,
            'title'=> $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'body' => $request->body,
            'type' => $request->type
        ]);


        $article->category()->associate($request->category);
        $article->save();

        $nameImage = [
            1 =>'image' ,
             2 =>'image2' ,
             3 => 'image3'
            ];

    foreach($nameImage as $image){

        if ($request->hasFile($image) && $request->file($image)->isValid()) {

                $fileExtension = $request->file($image)->extension();
                $randomFileName = date('Y_m_d'). uniqid('_image_') . '.' . $fileExtension;
                $imagePath = $request->file($image)->storeAs('public/articles/' . $article->id, $randomFileName);
                $newimage = $article->images()->create(['path'=>"articles/". $article->id.'/'.$randomFileName ]);
                $typeimgae = imagetypes();

                // if($typeimgae != IMG_JPG && $typeimgae != IMG_PNG && $typeimgae != IMG_GIF && $typeimgae != IMG_BMP  ){
                //     return redirect()->back()->with(['message' => "il file inserito non è supportato :  inserisci un file con uno di queste estensioni JPG,PNG,GIF,BMP"]);
                // }

            RemoveFaces::withChain([  //withchain fara i job in ordine dove il primo job sarà removefaces///

                (new AddWatermarkJob($newimage->path , 1920 , 1080)),
                (new GoogleVisionSafeSearch($newimage->id)),
                (new GoogleVisualabelImage($newimage->id))

            ])->dispatch($newimage->id);


                $article->save();
            }

        }

        return redirect()->route('welcome')->with(['success' => 'Il tuo annuncio è stato inserito correttamente!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if(count($article->favorite) > 0 && $article->favorite[0]->check==True){
            $articles= [
                'check' => $article->favorite[0]->check,
                'article' => $article
            ];
        } else {
            $articles= [
                'check' => False,
                'article' => $article
            ];
        }
        return view('show', $articles);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article , Category $category)
    {
      $category = Category::all();
        return view('editArticle.edit' , compact('article' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request  $request, Article $article )
    {

        $article->title = $request->title;
        $article->category()->associate($request->category_id);
        $article->price = $request->price;
        $article->type = $request->type;
        $article->body = $request->body;
        $article->save();
        $nameImage = [
            1 => "image",
             2 =>"image2",
             3 => "image3"
            ];

        foreach($nameImage as $image){

            if ($request->hasFile($image) && $request->file($image)->isValid()) {

                    $fileExtension = $request->file($image)->extension();
                    $randomFileName = date('Y_m_d'). uniqid('_image_') . '.' . $fileExtension;
                    $imagePath = $request->file($image)->storeAs('public/articles/' . $article->id, $randomFileName);
                    $newimage = $article->images()->create(['path'=>"articles/". $article->id.'/'.$randomFileName ]);

                    dispatch(new AddWatermarkJob($newimage->path , 1920 , 1080));

                    $article->save();
                }

            }


        return redirect()->route('welcome')->with(['success'  => 'elemento modificato con successo']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with('success' , 'articolo eliminato con succeso ');
    }


}
