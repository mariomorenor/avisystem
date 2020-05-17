<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);// el usuario con id 1 es el Administrador.

        $roles = Role::all(); //Se obtienen Todos los roles:
                              // 1. superadmin
                              // 2. user
                              // 3. admin
        
        $user->assignRole($roles[0]);

        $user = User::find(2); //El usuario con id 2 es Admin.
        $user->assignRole($roles[2]);

        $user = User::find([3,4]); //El resto de usuarios son usuarios normales.
        $user[0]->assignRole($roles[1]);
        $user[1]->assignRole($roles[1]);

    }
}
