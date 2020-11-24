<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'Admin',
                'email'=>'admin@tokoku.com',
                'password'=>Hash::make('admin'),
                'role'=>'Admin'
            ],
            [
                'id'=>2,
                'name'=>'Alnova',
                'email'=>'alnova@gmail.com',
                'password'=>Hash::make('alnova'),
                'role'=>'Customer'
            ],
        ]);
    }
}
