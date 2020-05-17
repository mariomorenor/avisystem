@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form method="POST" class="bg-white border rounded shadow mt-3 p-2" action="{{ route('users.update',['user'=>$user]) }}">
                    @csrf
                    @method('PUT')
                    @livewire("user-form",['user'=>$user])
            </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        @if(session()->has('user_updated'))
            Swal.fire({
                icon: 'success',
                title: "{{session('user_updated')}}" ,
                timer: 2000
            })
        @endif
    </script>
@endsection

0