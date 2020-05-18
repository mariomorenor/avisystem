@extends('index')
@section('titulo')
Control

@endsection
@section('content')


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Monitoreo y Control de Lotes</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">

		</ul>
		<span id="fechaNav" class="navbar-brand"></span>
	</div>
</nav>
<div class="container">
	<div class="row mt-5">
		<div class="col-5">
			<div id="graficoAlimentacion" class="border-dark mx-auto">
				<div id="silo" class="silo-progressbar"></div>
					
			</div>
			<div id="graficoTemperatura" class="border-dark mx-auto" hidden>
				<div id="termo" class="silo-progressbar"></div>
			</div>
			<div class="row mt-2" >
				<div class="d-flex mx-auto ">
					<button id="btnGraficoAlimentacion" disabled class="btn btnGrafico btn-success">Alimentación</button>
					<button id="btnGraficoTemp" class="btn btnGrafico btn-success ml-2">Temperatura</button>
				</div>
			</div>
		</div>
		<div class="col-7">
			<div id="controlesAlimentacion">
				<div class="row">
					<h2 class="text-muted text-center my-auto">Panel de Control</h2>
					<div @empty($lote) hidden @endempty style="width: 50px;" class="ml-auto">
						<a class="" data-backdrop="static" data-keyboard="false" data-toggle="modal"
							data-target="#configLote"> <img id="btnOpcion"
								onclick="elegirFila(); obtenerConfiguracionLote();"
								src="{{ asset('img/alimentacion/btnOpcion.png') }}" alt="opciones"
								style="width: 100%"></a>
					</div>
				</div>
				<div class="row mt-3">
					<div style="width: 100%;">
						<div class="card">
							<div class="card-body">
								<h5 class="text-muted font-weight-bold border-bottom my-auto">Lote en Proceso</h5>
								<div class="row mt-4 mb-2">
									<div class="col">
										<div>
											<label class="font-weight-bold">Código de Lote: </label>
											<label class=" @if($lote == null) text-danger	@endif"> @if ($lote != null)
												{{$lote->codigo}} @else Ningún Lote Asignado @endif</label>
										</div>
									</div>								
									<div class="col">
										<button class="btn @if ($lote != null) btn-primary  @else  btn-warning @endif"
											data-toggle="modal" data-target="#modalControlPanel" data-backdrop="static"
											data-keyboard="false">@if ($lote != null) Cambiar Lote @else Asignar Un Lote
											@endif</button>
									</div>
								</div>
								<h5 class="text-muted font-weight-bold border-bottom my-auto">Datos</h5>
								<div class="row mt-2">
									<div class="col-3">
										<label class="font-weight-bold">Cantidad Pollos:</label>
										<label class="font-weight-bold">Cantidad Machos:</label>
										<label class="font-weight-bold">Cantidad Hembras:</label>
									</div>
									<div class="col-1 px-0">
										<label>@if (isset($lote)) {{$lote->cantidadFinal}} @else --- @endif</label> <br>
										<label>@isset($lote) {{$lote->machosFinal}} @endisset @empty($lote) ---
											@endempty</label><br>
										<label>@isset($lote) {{$lote->hembrasFinal}} @endisset @empty($lote) ---
											@endempty</label>
									</div>
									<div class="col-4">
										<label class="font-weight-bold">Fecha Ingreso:</label>
										<label class="font-weight-bold">Unidades Perdidas:</label>
										<label class="font-weight-bold">Unidades Perdidas:</label>
									</div>
									<div class="col-1">
										<label>@isset($lote) {{$lote->fecha_ingreso}} @endisset @empty($lote) ---
											@endempty</label><br>
										<label class="text-center">@isset($lote) {{$lote->machosPerdidos}} @endisset
											@empty($lote) --- @endempty</label> <br>
										<label class="text-center">@isset($lote) {{$lote->hembrasPerdidas}} @endisset
											@empty($lote) --- @endempty</label> <br>
									</div>


								</div>
								<h5 class="text-muted font-weight-bold border-bottom my-auto">Alimentación</h5>
								<div class="row mt-2">
									<div class="col-3">
										<label class="font-weight-bold ">Alimento Actual: </label>
										<label class="font-weight-bold ">Incremento Diario: </label>
									</div>
									<div class="col-2">
										<label class=""> @if ($lote != null) {{$lote->alimentoActual}} @else --- @endif
										</label><br>
										<label class=""> @if ($lote != null) {{$lote->incrementoAlimento}} @else ---
											@endif </label>
									</div>
									<div class="col-3">
										<label class="font-weight-bold ">Cantidad Máxima: </label>
										{{-- <label class="font-weight-bold ">Horario Comidas: </label> --}}
									</div>
									<div class="col-2">
										<label class=""> @if ($lote != null) {{$lote->alimentoTotal}} @else --- @endif
										</label><br>
										<label class=""> @if ($lote != null) Falta @else --- @endif </label>
									</div>
								</div>
								<h5 class="text-muted font-weight-bold border-bottom my-auto">Temperatura</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- Modal Seleccion Lote-->
<div class="modal fade" id="modalControlPanel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="max-width: none; width: 700px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Configuración de Panel de Control</h5>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="mx-auto"
							style="display: block; position: relative; overflow-y: auto; height: 400px; width: 500px;">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">Nº</th>
										<th scope="col">Código</th>
										<th scope="col">Fecha Ingreso</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									@php
									$cont = 0;
									@endphp
									@foreach ($disponibles as $lote_disponible)
									@php
									$cont++;
									@endphp
									@if ($lote != null)
									@if ($lote_disponible->id == $lote->id ) @php
									$cont--;
									@endphp @continue @endif
									@endif

									<tr id="loteSeleccionado_{{$lote_disponible->id}}" onclick="elegirFila(this)">
										<td>{{$cont}}</td>
										<td>{{$lote_disponible->codigo}}</td>
										<td>{{$lote_disponible->fecha_ingreso}}</td>
										<td><a class=""
												href="{{ route('Lote.show', ['Lote'=>$lote_disponible->id ]) }}"> ver
												detalles</a> </td>
										<form method="POST" id="form_{{$lote_disponible->id}}"
											action="{{ route('Control.update', ['Control'=>$lote_disponible->id])}}">
											@csrf
											@method('PUT')
											<input type="number" name="lote" hidden value="{{$lote_disponible->id}}">
										</form>
									</tr>

									@endforeach

								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" onclick="elegirFila()"
					data-dismiss="modal">Cancelar</button>
				<button type="button" id="btnAsignarLote" class="btn btn-success">Guardar</button>
			</div>
		</div>
	</div>
</div>
{{-- Fin Seleccion Lote --}}


<!-- Modal Configuracion Lote-->
<div class="modal fade" id="configLote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="max-width: 700px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Panel de Opciones</h5>

			</div>
			<div class="modal-body">
				@if ($lote != null) <form id="formDatosOpciones" hidden
					action="{{ route('Control.show', ['Control'=>$lote]) }}"></form> @endif
				<form id="formEnviarDatos" @if ($lote !=null )
					action="{{ route('Control.update', ['Control'=>$lote]) }}" @endif method="POST">
					@csrf
					@method('PUT')
					<div class="container">
						<h5 class="text-muted font-weight-bold border-bottom my-auto">Datos</h5>
						<div class="row mt-2">
							<div class="col-3">
								<div style="height: 37.0333px;" class="d-flex align-content-center">
									<label class="font-weight-bold my-auto">Cantidad Machos:</label>
								</div>
								<div style="height: 37.0333px;" class="d-flex align-content-center">
									<label class="font-weight-bold my-auto">Cantidad Hembras:</label>
								</div>
							</div>
							<div class="col-4" style="margin-left: -35px;">
								<div class="d-flex">
									<input type="text" name="cantMachos" id="cantMachos"
										class="form-control ml-3 mb-1 noKeyboard" style="width: 80px; ">
									<img id="btnAddMachos" class="btnAddMinus ml-2"
										src="{{ asset('img/control/plus.png') }}" alt="">
									<img id="btnMinusMachos" class="btnAddMinus ml-1"
										src="{{ asset('img/control/minus.png') }}" alt="">
								</div>
								<div class="d-flex">
									<input type="text" id="cantHembras" name="cantHembras"
										class="form-control ml-3 noKeyboard" style="width: 80px; ">
									<img id="btnAddHembras" class="btnAddMinus ml-2"
										src="{{ asset('img/control/plus.png') }}" alt="">
									<img id="btnMinusHembras" class="btnAddMinus ml-1"
										src="{{ asset('img/control/minus.png') }}" alt="">
								</div>
							</div>
							<div class="col ml-3">
								<label class="font-weight-bold">Cantidad Total: <label id="unidades"
										class="font-weight-normal ml-2"></label></label>
							</div>
						</div>
						<h5 class="text-muted font-weight-bold border-bottom my-auto">Alimentación</h5>
						<div class="row mt-2">
							<div class="container">
								<div class="row">
									<div class="col-6">
										<h6 class="text-muted ml-3 font-weight-bold my-auto">Silo:</h6>
									</div>
									<div class="col-6">
										<h6 class="text-muted font-weight-bold my-auto">Comedero:</h6>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-6">
										<div class="form-group d-flex">
											<label class="font-weight-bold my-auto">Cantidad Alerta:</label>
											<input type="text" id="cantAlertaSilo" name="cantidadAlertaSilo"
												class="form-control ml-3 noKeyboard" style="width: 80px; ">
											<label class="my-auto ml-1"> Kg</label>
										</div>
									</div>

									<div class="col-6">
										<div class="form-group d-flex">
											<label class="font-weight-bold my-auto">Cantidad Mínima:</label>
											<input type="text" id="cantMinimaComedero" name="cantMinimaComedero"
												class="form-control ml-3 noKeyboard" style="width: 80px; ">
											<label class="my-auto ml-1"> Gramos</label>
										</div>
									</div>

								</div>
							</div>

						</div>
						<h5 class="text-muted font-weight-bold border-bottom my-auto">Temperatura</h5>
						<div class="row mt-2">
							<div class="col-4">
								<div style="height: 37.0333px;" class="d-flex align-content-center">
									<label class="font-weight-bold my-auto">Temperatura Mínima:</label>
								</div>
								<div style="height: 37.0333px;" class="d-flex align-content-center">
									<label class="font-weight-bold my-auto">Temperatura Máxima:</label>
								</div>
							</div>
							<div class="col-4 px-0" style="margin-left: -35px;">
								<div class="d-flex">
									<input type="text" name="tempMinima" id="tempMinima"
										class="form-control ml-3 mb-1 noKeyboard" style="width: 80px; ">
									<img id="btnAddMachos" class="btnAddMinus ml-2"
										src="{{ asset('img/control/plus.png') }}" alt="">
									<img id="btnMinusMachos" class="btnAddMinus ml-1"
										src="{{ asset('img/control/minus.png') }}" alt="">
								</div>
								<div class="d-flex">
									<input type="text" name="tempMaxima" id="tempMaxima"
										class="form-control ml-3 noKeyboard" style="width: 80px; ">
									<img id="btnAddHembras" class="btnAddMinus ml-2"
										src="{{ asset('img/control/plus.png') }}" alt="">
									<img id="btnMinusHembras" class="btnAddMinus ml-1"
										src="{{ asset('img/control/minus.png') }}" alt="">
								</div>
							</div>
							<div class="col-3">
								<label class="font-weight-bold" style="margin-left: -40px;">Temperatura Actual: <label
										id="tempActual" class="font-weight-normal ml-2">---</label></label>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" onclick="obtenerConfiguracionLote();"
					data-dismiss="modal">Cancelar</button>
				<button type="submit" id="btnGuardarOpciones" form="formDatosOpciones" class="btn btn-success">Guardar
					Cambios</button>
			</div>
		</div>
	</div>
</div>

{{-- Fin Configuracion Lote --}}


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script> --}}
<script>
	// var socket = io('http://avi-system.test:3000');
</script>

@section('scripts')
<script src="{{ asset('js/Control.js') }}"></script>
<script src="{{ asset('js/silo-progressbar.js') }}"></script>
<script src="{{ asset('js/termometro.js') }}"></script>
<script type="text/javascript">

	var miSilo = new Silo("silo", "{{ asset('img/silo/silo.png') }}", {height:454, width:300}, {bottom:73, height:337});
		miSilo.value(79)
	
	var miTermometro = new Termometro("termo", "{{ asset('img/termometro/termometro.png') }}", {height:1200, width:300}, {bottom:40, height:1080},0.4);
		miTermometro.value(37)
</script>
@endsection


@endsection