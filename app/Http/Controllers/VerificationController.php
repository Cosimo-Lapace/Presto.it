<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function notice (){          //in questa route andiamo verificare la mail dell'utente che sia valida e nel middleware mettiamo un array 
        return view('auth.verify-email');

    }
    public  function emailverify (EmailVerificationRequest $request){
        $request->fulfill();
  
        return redirect('/');
    
    }

    public  function resendMailverify (Request $request){
        // $user = User::all();
        $request->user()->SendEmailVerificationNotification();
  
        return back()->with('success' , "Email inviata con successo,controlla la tua email!", compact('request'));
    }



}
