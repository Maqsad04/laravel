<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Check if a user with this email already exists
        if (!User::where('email', 'maqsad04@gmail.com')->exists()) {
            User::create([
                'name' => 'Maqsad',
                'email' => 'maqsad04@gmail.com',
                'password' => Hash::make('102938md'), // Hash the password
                'role' => 'admin', // Set the role to 'admin'
            ]);
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}
