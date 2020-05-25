<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserForm extends Component
{
    public $name;
    public $username;
    public $password;
    public $password_confirmation;
    public $roles;
    public $role;
    public $identifier;
    public $exist = false;
    public $user;
    

    public function mount( $user)
    {   
        // dd($user->Roles_u);
        $this->roles = Role::orderBy('name','desc')->get();
        $rol = $this->roles->first();
        $this->role = $rol->name;
        if($user != null){
            $this->user = $user;
            $this->name = $user->name;
            $this->username = $user->username;
            $this->password = $user->password;
            $this->password_confirmation = $user->password;
            $this->role = $user->Roles_u[0]->name;
            $this->exist = true;
            $this->identifier = $user->id;
        }
    }

    public function render()
    {
        return view('livewire.user-form');
    }
    
    public function updated($field)
    {
        if ($field == 'password_confirmation') {
            $this->validateOnly('password', [
                'password' => 'confirmed',
            ]);
        }else{
            $this->validateOnly($field, [
                'name' => 'required|min:3',
                'username' => 'required|min:3',
                'password' => 'required|confirmed',
                'role'=>'required'
            ]);
        }
  
     
    }

    public function saveUser()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:3',
            'password' => 'required|confirmed',
            'role'=>'required'
        ]);
    
        $user = User::create($validatedData);
        $user->assignRole($validatedData['role']);
        session()->flash('user_created', 'Usuario Creado Correctamente!');


        return redirect()->to("/users/$this->identifier'/edit");
    }

    public function updateUser()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'username' => 'required|min:3',
            'password' => 'required|confirmed',
            'role'=>'required'
        ]);
    
        $this->user->removeRole($this->user->Roles_u[0]->name);
        $this->user->update([
            'name'=>$validatedData['name'],
            'username'=>$validatedData['username'],
            'password'=>Hash::make($validatedData['password']),
        ]);
        $this->user->assignRole($validatedData['role']);
        session()->flash('user_updated', 'Usuario Actualizado Correctamente!');


        return redirect()->to("/users/$this->identifier'/edit");
    }


}
