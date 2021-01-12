<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Md. Admin',
            'username' => 'admin',
            'email' => 'mazhar.rony@gmail.com',
            'password' => Hash::make('admin')
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Md. Author',
            'username' => 'author',
            'email' => 'imran@gmail.com',
            'password' => Hash::make('admin')
        ]);
    }
}
