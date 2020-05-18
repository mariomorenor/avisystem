{{-- COMPONENTE DE SIDEBAR ESTE CODIGO SIRVE PARA CUALQUIER OTRO PROGRAMA ASEGURATE DE 
    AGREGAR yield("style") EN EL LAYOUT --}}

<div class="sidebar">
    <h2>Menú</h2>
    <ul>
        <li><a href="{{ route('lotes.index') }}">Control</a></li>
        <li><a href="#">Producción</a></li>
        <li><a href="#">Reportes</a></li>
        @if ( Auth::user()->hasRole('superadmin') | Auth::user()->hasRole('admin'))
            <li><a href="{{ route('users.index') }}">Usuarios</a></li>    
        @endif
    </ul>
</div>

@section('styles_sidebar')
<style>

    /* SIDEBAR COMPONENT LIVEWIRE */
    
    .sidebar {
        position: absolute;
        z-index: 2;
        width: 250px;
        height: 100%;
        background: #333;
        color: #fff;
        outline: 1px solid #2a2a2a;
    }

    .sidebar ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .sidebar a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
        display: block;
    }

    .sidebar h2 {
        text-align: center;
        margin-top: 20%;
        padding: 10px;
        margin-bottom: 1px;
        background: #2a2a2a;
    }

    .sidebar li {
        outline: 1px solid #2a2a2a;
        transition: all 0.1s;

    }

    .sidebar li:hover {
        background: #444;
        border-left: 5px solid #eee;
    }

</style>
@endsection