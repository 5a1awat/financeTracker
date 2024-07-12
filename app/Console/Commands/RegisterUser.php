<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:register-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userName = $this->ask('What is your name?', 'Name');
        $email = strtolower($userName) . '@example.com';
        $password = $this->ask('What is your password?', '12345678');

        if ($this->confirm('Do you wish to continue?')) {
            $user = User::create([
                'name' => $userName,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            event(new Registered($user));

            $this->info('The user has been successfully created!');
        }
    }
}
