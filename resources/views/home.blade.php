@extends('layouts.app')

@section('main')

@livewire('sidebar')
<div class="content" >
    <img src="{{ asset('img/main/menu.png') }}" onclick="hideSidebar()" id="btnMenuSideBar" class="menu-bar" style="width: 3%" alt="Menú">
        @yield('content')
        {{-- <div style="margin-left: 250px; margin-top: 55px;">
        </div> --}}
</div>

@endsection
