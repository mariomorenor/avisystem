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
                                <th data-field="date_in">Fecha Ingreso</th>
                                <th data-field="date_out" data-formatter="date_outFormatter">Fecha Salida</th>
                                <th data-field="operate" data-align="center" data-formatter="operateFormatter"></th>
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
<<<<<<< HEAD
@endpush
=======
    
@endsection
>>>>>>> af9c08d5a452e95d06d892294fb68d057702b455
