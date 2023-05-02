<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class SocialiteController extends Controller
{
    public function redirect(){

        $data = Socialite::driver('github')->redirect();
        return $data;
    }
    public function redirect2(){

        $data = Socialite::driver('google')->redirect();
        return $data;

    }
    public function callback(){

        $user = Socialite::driver('github')->user();  //guido l'utente su git hub

        $data = User::where('email' , $user->email)->first();  //cerco l'email utente
        if(is_null($data)){    //se la variabile $data is_null quindi è vuota
           $users['name'] = $user->nickname;  //vado a salvare il name prendendo il nickname in questo caso inserendo il dd() si puà vedere
           $users['email'] = $user->email; //prendo e salvo la email
           $users['password'] = '';  //lasciando vuota la password
           $data = User::create($users);  //racchiudo tutto con users e creo il nuovo utente in user
        }
          Auth::login($data); //con auth::login accedo manualmente ad un utente
        return redirect('/');  //renderizzo l'utente nella pagina precedente....

    }
    public function callback2(Request $request){

        $user = Socialite::driver('google')->user();  //guido l'utente su git hub

        $data = User::where('email' , $user->email)->first();  //cerco l'email utente
        if(is_null($data)){    //se la variabile $data is_null quindi è vuota
           $users['name'] = $user->name;  //vado a salvare il name prendendo il nickname in questo caso inserendo il dd() si puà vedere
           $users['email'] = $user->email; //prendo e salvo la email
           $users['password'] = '';  //lasciando vuota la password
           $data = User::create($users);  //racchiudo tutto con users e creo il nuovo utente in user
        }
          Auth::login($data); //con auth::login accedo manualmente ad un utente
        return redirect('/');  //renderizzo l'utente nella pagina precedente....

    }
}
