<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'slug' => Str::slug('admin'),
            'email' => 'admin@tokoku.com',
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Rizqi Krisandika',
            'slug' => Str::slug('Rizqi Krisandika'),
            'email' => 'rizqi@gmail.com',
            'password' => bcrypt('rizqi12345')
        ]);

        $user->assignRole('user');
    }
}
