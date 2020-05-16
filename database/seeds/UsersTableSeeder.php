<?php

use App\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name'=> 'Administrador',
            'username'=> 'Admin',
            'password'=> Hash::make('123')
        ]);
        User::create([
            'name'=> 'Stalin Pinos',
            'username'=> 'sjpinos',
            'password'=> Hash::make('123')
        ]);
        User::create([
            'name'=> 'Jonathan Moreno',
            'username'=> 'jmmorenor',
            'password'=> Hash::make('123')
        ]);
        User::create([
            'name'=> 'Fidel Mendoza',
            'username'=> 'famendoza',
            'password'=> Hash::make('123')
        ]);
    }
}
