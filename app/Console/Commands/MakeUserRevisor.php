<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:MakeUserRevisor {email}';  //creo il comando per diventare Revisore che possiamo visualizzarlo con php artisan

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'comando per diventare revisore';   //do una descrizione al comando creato 

    /**
     * Execute the console command.  
     */
    public function handle(): void
    {
        $user = User::where('email' , $this->argument('email'))->first(); //cerchiamo email utente inserita nel terminale 
        if(!$user){ 
            $this->error('utente non trovato');  //se non  è presenta do il messaggio di eerore al terminale con il this chiamo $user
        }
        $user->is_revisor = true;     //modifico il campo is_revisore impostat di default false in true
        $user->save();      //salvo in $user
        $this->info("l'utente {$user->name} è ora revisore");  //se  presente messaggio di utente revisore
    }
}
