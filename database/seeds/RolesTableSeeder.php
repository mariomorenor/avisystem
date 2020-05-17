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
       $permissions[] = Permission::create(['name'=>'create user']);
       $permissions[] = Permission::create(['name'=>'read user']);
       $permissions[] = Permission::create(['name'=>'update user']);
       $permissions[] = Permission::create(['name'=>'delete user']);
        
        // Permission::create(['name'=>'create registry']);
        // Permission::create(['name'=>'read registry']);
        // Permission::create(['name'=>'update registry']);
        // Permission::create(['name'=>'delete registry']);
       
        $role = Role::create([
            'name'=>'superadmin',
            'description'=>'Master'
        ]);

        $role->givePermissionTo($permissions);

        $role = Role::create([
            'name'=>'user',
            'description'=>'Usuario'
        ]);

        $role = Role::create([
            'name'=>'admin',
            'description'=>'Administrador'
        ]);

        $role->givePermissionTo([$permissions[1],$permissions[2]]);

    }
}
