<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@bdpay.co.id',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $author = User::create([
            'name' => 'Author',
            'email' => 'author@bdpay.co.id',
            'password' => bcrypt('password'),
        ]);
        $author->assignRole('author');
    }
}
