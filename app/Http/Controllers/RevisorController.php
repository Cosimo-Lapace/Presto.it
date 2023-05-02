<?php

namespace App\Http\Controllers;

use App\Mail\NewAdmin;
use App\Models\Article;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index(){
        $revisore = Auth::user()->id;
        $check = Article::where('is_accepted' , null)->where('user_id' , '!=' , $revisore )->first();  //mostra tutti gli articoli con is_accepted 
        
            return view('revisor.indexRevisor' , compact('check') );
       
     
        
    }
    public function accepted(Article $article){   //metodo che una volta accettato modifica is_accepted da nullable a true = 1

        $article->acceptArticle(true);
        return redirect()->back()->with('message' , 'articolo accettato');

    }
    public function decline(Article $article){     // declina articolo in attesa

        $article->acceptArticle(false);
        if ($article->acceptArticle(false)) {
            $article->delete();
            return redirect()->back()->with('message' , 'articolo ignorato ');
        }


    }
    public function requestRevisor(){  //crea una richiesta per diventare revisore inoltrando una mail
        Mail::to(auth()->user()->email)->send(new NewAdmin(Auth::user()));
        return redirect()->back()->with('message' , 'complimenti! hai richiesto di diventare un utente revisore');
    }
    public function revisor(User $user){   //una volta ricevuta la mail
        Artisan::call('presto:MakeUserRevisor' , ["email" => $user->email]);  //qui utilizzo artisan::call me avviare il metodo per rendere revisore senza scriverlo nel terminale e su email raccolgo i dati del'utente che sto passando
        return redirect('/')->with('message' , "complimenti $user->name sei diventato revisore");  //messaggio di conferma
    }
    public function lavora(){
        return view('lavora');
    }
    public function descrizione(User $user){

            $user = User::all();
       
        return view('lavora' , compact('user'));
    }
    public function update(Request $request , User $user){

          $utente = Auth::user();
        $utente->description = $request->description;
        
        $utente->update(['description' => $request->description]);  //update vado a modifcare l'unico campo che interessa riempire visto che l'utente esiste già 
            //se update manda un errore è solo un problema visivo , in uodate passiamo il campo che vogliamo riempire che prendiamo dalla request con chiave valore
        $this->requestRevisor();  //richiamo metodo per inviare richiesta per diventare revisore 
        return redirect()->route('welcome');      
    }
}
