<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:MakeUserRevisor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rendi un utente revisore';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->ask("Inserisci l'email dell'utente che vuoi far diventare revisor");
        $user = User::where('email', $email)->first();
        
        if(!$user){
            $this->error('Utente non trovato');
            return ;
        } 
        
        $user->is_revisor = true;
        $user->save();
        $this->info("L'utente {{$user->name}} adesso e' un revisore");
    }
}
