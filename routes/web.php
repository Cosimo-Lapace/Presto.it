<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Providers;
use App\Http\Controllers\RemeberPassword;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;
use PhpParser\Lexer\TokenEmulator\ReverseEmulator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

   Route::middleware(['auth' , 'verified'])->prefix('account')->group(function(){
      Route::resource('/articles',ArticleController::class);



      Route::resource('/categories', CategoryController::class);

      Route::post('favorites/{article_id}',[FavoriteController::class,'store'])->name('favorites.store');

      Route::get('favorites',[FavoriteController::class,'index'])->name('favorites.index');

      Route::delete('favorites/{id}',[FavoriteController::class,'destroy'])->name('favorites.destroy');

      Route::resource('images',ImageController::class);

      Route::get('/profilo', [PageController::class,'profilo'])->name('profilo');

      Route::put('modifica/{user}', [PageController::class, 'profiloPost'])->name('profiloPost');

      Route::get('/annunci', [PageController::class,'annunci'])->name('annunci');

      Route::get('/imieiannunci',[PageController::class,'imieiannunci'])->name('imieiannunci');

      Route::get('/lavora', [RevisorController::class, 'lavora'])->name('lavora');

      Route::put('/lavora' , [RevisorController::class , 'descrizione'])->name('descrizione');
      //rotta per aggiungere descrizione
      Route::put('/lavora2' , [RevisorController::class , 'update'])->name('update');
      //rotta lavora con noi
      // Route::post('/modifica/{article}' , [ArticleController::class , 'edit'])->name('edit');
      // Route::post('/elimina/{article}' , [ArticleController::class , 'delete'])->name('delete');
   });


   Route::get('/', [PageController::class,'welcome'])->name('welcome');
   // Route LINGUA
   Route::post('/lingua/{lang}',[PageController::class,'setLenguage'])->name('setLenguage');


   /* filtri */
   Route::get('/articles/searchsimple/', [PageController::class,'searchsimple'])->name('search.simple');
   Route::get('/articles/advancedsearch/', [PageController::class,'advancedsearch'])->name('search.advanced');
   /* end filtri */


   //rotte revisor
   Route::get('/revisor/indexRevisor' , [RevisorController::class , 'index'])->middleware('ForRevisor')->name('indexRevisor');
   Route::patch('/revisor/accepted{article}' , [RevisorController::class , 'accepted'])->middleware('ForRevisor')->name('accepted');
   Route::patch('/revisor/decline{article}' , [RevisorController::class , 'decline'])->middleware('ForRevisor')->name('decline');


   //richiesta revisore
   Route::get('/accessi/revisore' , [RevisorController::class , 'requestRevisor'])->name('requestRevisor');
   //rendi revisore
   Route::get('/accessi/utenteRevisore{user}' , [RevisorController::class , 'revisor'])->name('revisor');


   // route for  RemeberPassword //....
   Route::get('/forgot-password',[RemeberPassword::class , 'step1'])->middleware('guest')->name('password.request');

   Route::post('/forgot-password', [RemeberPassword::class , 'step2'])->middleware('guest')->name('password.email');

   Route::get('/reset-password/{token}', [RemeberPassword::class , 'step3'])->middleware('guest')->name('password.reset');

   Route::post('/reset-password', [RemeberPassword::class , 'step4'])->middleware('guest')->name('password.update');
   // route end remeber password


   //route per la verifica delle email
   Route::get('/email/verify' , [VerificationController::class , 'notice'])->middleware('auth')->name('verification.notice');               //notifica di email per verificare email

   Route::get('/email/verify/{id}/{hash}' ,[VerificationController::class , 'emailverify'])->middleware(['auth' , 'signed'])->name('verification.verify');  //utente verificato dopo email accettata

   Route::post('/email/verification-notification' ,[VerificationController::class , 'resendMailverify'])->middleware(['auth' , 'throttle:6,1'])->name('verification.send');  //route per ripetere la verifica della email nel caso non fosse arrivata la mail
   //fimphpe verifica email    //il middleware è come array nelle pagine oltre ad essere autenticato devi essere un utente verificato

   //route Socialite
   Route::get('/auth/redirect', [SocialiteController::class , 'redirect'])->name('redirect');
   Route::get('/auth/girhub/callback', [SocialiteController::class , 'callback'])->name('callback');
   Route::get('/auth/redirect2',[SocialiteController::class , 'redirect2'])->name('google');
   Route::get('/auth/google/callback2', [SocialiteController::class , 'callback2'])->name('callback2');
   //fine route social lite

