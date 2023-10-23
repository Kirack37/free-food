<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Comprobamos que el usuario esté en DB
        $user = User::where('email', 'gerente@host.com')->first();
        if(!isset($user)) {
            User::insert([
                'name' => 'Gerente',
                'email' => 'gerente@host.com',
                'password' => Hash::make('gerente'),
                'email_verified_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
