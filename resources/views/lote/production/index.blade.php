@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9 mx-auto">
                <div class="">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th data-field="code">Código</th>
                                <th data-field="in_date">Fecha Ingreso</th>
                                <th data-field="out_date">Fecha Salida</th>
                                <th data-field="operate">Fecha Salida</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/lote/production/production.js') }}"></script>
@endpush