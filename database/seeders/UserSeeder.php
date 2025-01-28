<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting a user manually (you can customize this data)
        User::create([
            'username' => 'john_doe',
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password123'), // Encrypt the password
            'contact' => '1234567890',
            'address' => '123 Main Street',
            
        ]);
    }
}
