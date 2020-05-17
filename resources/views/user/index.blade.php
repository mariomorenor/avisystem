@extends('home')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-8 mt-3 mx-auto" style=" max-height: max-content" >
                <div>
                    <div id="toolbar">
                       @if (Auth::user()->hasRole('superadmin'))
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Agregar</a>
                       @endif 
                    </div>
                    <table id="usersTable" class="table table-hover table-stripped">
                        <thead>
                            <th data-field="name">Nombres</th>
                            <th data-field="username">Usuario</th>
                            <th data-field="roles_u" data-formatter="rolesFormatter">Rol</th>
                            <th data-field="operate" data-width="100" data-formatter="operateFormatter">Acciones</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/users.js') }}"></script>
    <script>
        
        function operateFormatter(value,row) {
            
            let buttons = `<a href="/users/`+row.id+`/edit" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>`;
                        
            @if (Auth::user()->hasRole('admin')) 
               if(row.roles_u[0].name == 'admin')
                  buttons = ''; 
            @endif

        @if(Auth::user()->hasRole('superadmin'))
        buttons +=  `<button onclick="delete_User('`+row.name+`','`+row.id+`')" class="ml-1 btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>`;
        @endif
        return buttons;
}
    </script>
@endsection