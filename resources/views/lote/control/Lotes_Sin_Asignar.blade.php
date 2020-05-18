@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7 mt-3 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <label>Sin Asignar</label>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger">
                            <span class="text-dark">
                                No se está controlando ningún lote, para asignar uno, <a href="#">presione aquí</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection