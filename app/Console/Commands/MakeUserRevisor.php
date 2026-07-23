<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\User;

class MakeUserRevisor extends Command
{
    protected $signature="app:make-user-revisor {email}";    
    protected $description = 'Rende revisore un utente';
    public function handle()
    {
        $user= User::where("email",$this->argument("email"))->first();
        if (!$user) {
            $this->error("Utente non trovato");
            return;
        }
        $user->is_revisor= true;
        $user->save();
        $this->info("l'utente {$user->name} è stato reso revisore");
    }
}
