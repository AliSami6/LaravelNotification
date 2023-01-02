<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UnverifyUserDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete'; //remove user

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unverified user delete from database '; //write your command description

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return User::whereNull('email_verified_at')->delete();
    }
}