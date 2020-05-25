@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form method="POST" class="bg-white border rounded shadow p-2" action="{{ route('users.store') }}">
                    @csrf
                    @livewire("user-form",['user'=>null])
            </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        @if(session()->has('user_created'))
            Swal.fire({
                icon: 'success',
                title: "{{session('user_created')}}" ,
                timer: 2000
            })
        @endif
    </script>
@endpush

