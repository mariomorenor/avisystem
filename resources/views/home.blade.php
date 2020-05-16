@extends('layouts.app')

@section('main')

    @livewire('sidebar')
    <div class="content">
        @yield('content')
    </div>

@endsection
