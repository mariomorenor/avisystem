@extends('layouts.app')

@section('main')

    @livewire('sidebar')
    <div class="content">
        <div style="margin-left: 250px; margin-top: 55px;">
            @yield('content')
        </div>
    </div>

@endsection
