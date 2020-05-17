<div>
    <h1 class="font-weight-bold" >Datos Usuario</h1>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input autocomplete="off"  type="text" wire:model.lazy="name" class="form-control" name="name" id="name" autofocus>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input autocomplete="off" type="text" wire:model.lazy="username" class="form-control" name="username" id="username">
                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input autocomplete="off" type="password" wire:model.lazy="password" class="form-control" name="password" id="password">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="password_confirmation">Confirmar:</label>
                <input autocomplete="off" wire:model.lazy="password_confirmation" type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="role">Rol:</label>
                <select @if (!Auth::user()->hasRole('superadmin'))
                    disabled
                @endif name="role" wire:model="role" id="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{$role->name}}">{{$role->description}}</option> 
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-4 mx-auto">
            @if($exist)
                <button type="button" wire:click="updateUser" class="btn btn-success btn-block shadow">ACTUALIZAR</button>
            @else    
                <button type="button" wire:click="saveUser" class="btn btn-success btn-block shadow">GUARDAR</button>
            @endif
        </div>
    </div>

</div>
