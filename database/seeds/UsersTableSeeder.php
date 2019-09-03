<?php

use Illuminate\Database\Seeder;

use App\User;


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
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->PhoneNum = '01945678598';
        $user->location = 'Dhaka';
        $user->role = 1;
        $user->password = Hash::make('Admin@123');
        $user->save();
    }
}
