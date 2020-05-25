@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 mt-3 mx-auto">
                <h2>Detalles Lote</h2>
                <div class="card shadow rounded">
                    <div class="card-header">
                        <span class="font-weight-bold">Código:</span> <span class="text-success font-weight-bold border rounded p-1 shadow">{{$lote->code}}</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 pr-0">
                                <span class="font-weight-bold">Cantidad Aves:</span>
                            </div>
                            <div class="col-2 px-0">
                                <span>{{$lote->quantity}}</span>
                            </div>
                            <div class="col-1 px-0">
                                <span class="font-weight-bold">Estado:</span>
                            </div>
                            <div class="col-1 px-0">
                                <span data-html="true" data-toggle="tooltip" data-placement="top" title="<div class='text-left'>
                                    <span>W: Esperando</span><br>
                                    <span>A: Activo</span><br>
                                    <span>F: Terminado</span>
                                </div>" class="p-2 border border-dark rounded-pill shadow font-weight-bold @if($lote->state == 'F') text-success  @else text-danger  @endif">{{$lote->state}}</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div>
                                    <table id="table" class="table table-sm table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th rowspan="2" scope="col" data-field="date" data-align="center">Fecha</th>
                                                <th scope="col" colspan="3" data-align="center">Alimentos</th>
                                                <th scope="col" colspan="3" data-align="center">Mortalidad</th>
                                                <th rowspan="2" scope="col" data-align="center">SALDO DE AVES</th>
                                                <th rowspan="2" scope="col" data-align="center">Peso Gramos</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" data-align="center">Cant. Fund.</th>
                                                <th scope="col" data-align="center">Consumo Día.</th>
                                                <th scope="col" data-align="center">Acumulado</th>
                                                <th scope="col" data-align="center">Diaria</th>
                                                <th scope="col" data-align="center">Acumulado</th>
                                                <th scope="col" data-align="center">%</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/lote/production/reports.js') }}"></script>
@endsection