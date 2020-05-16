<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permission[] = Permission::create(['name'=>'create user']);
       $permission[] = Permission::create(['name'=>'read user']);
       $permission[] = Permission::create(['name'=>'update user']);
       $permission[] = Permission::create(['name'=>'delete user']);
        dd($permission);
        // Permission::create(['name'=>'create registry']);
        // Permission::create(['name'=>'read registry']);
        // Permission::create(['name'=>'update registry']);
        // Permission::create(['name'=>'delete registry']);
       
        // Role::create([
        //     'name'=>'superadmin',
        //     'description'=>'Administrador'
        // ])

        // // $role->givePermissionTo($permission);

        // Role::create([
        //     'name'=>'user',
        //     'description'=>'Usuario'
        // ])
       
        // Role::create([
        //     'name'=>'admin',
        //     'description'=>'Administrador'
        // ])


    }
}
