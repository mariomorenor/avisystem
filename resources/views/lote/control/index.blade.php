@extends('home')

@section('content')
    <div class="container mt-2">
    	<maincontrol-component :lote="{{$lote}}"></maincontrol-component>
	</div>
	
	<!-- Modal -->
<div class="modal fade" id="modal_lossesConfig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Configuración Diaria</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container">
				<div class="row">
					<div class="col-4 pr-0">
					   <div class="form-group">
						  <p class="pt-1">Fecha:</p>
					   </div>
					   <div class="form-group">
						  <p class="pt-1">Cantidad Actual:</p>
					   </div>
					   <div class="form-group my-auto">
						  <p class="pt-1">Cantidad Perdida:</p>
					   </div>
					  <div class="form-group my-auto">
						  <p class="pt-1">Perdidas Totales del Lote:</p>
					  </div>
					</div>
					<div class="col-8 pl-0">
						<input type="text" value="{{Carbon\Carbon::now()->toDateString()}}" disabled class="form-control mb-1">
						<input type="text" value="{{$lote->quantity - $lote->report->cumulative_deaths}}" disabled class="form-control mb-1">
						<input type="number" placeholder="Ingrese una Cantidad"  class="form-control mb-1">
						<input type="text" value="{{$lote->report->cumulative_deaths}}"  disabled class="form-control mb-1">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		  <button type="button" class="btn btn-primary">Guardar</button>
		</div>
	  </div>
	</div>
</div>
@endsection

@push('scripts')
{{-- <script src="{{ asset('js/lote/control/control.js') }}"></script> --}}
<script src="{{ asset('js/lote/control/silo-progressbar.js') }}"></script>
<script src="{{ asset('js/lote/control/termometro.js') }}"></script>

<script type="text/javascript">

	var miSilo = new Silo("silo", "{{ asset('img/silo/silo.png') }}", {height:454, width:300}, {bottom:73, height:337});
		miSilo.value(0)
	
	var miTermometro = new Termometro("termo", "{{ asset('img/termometro/termometro.png') }}", {height:1200, width:300}, {bottom:40, height:1080},0.4);
		miTermometro.value(0)

		function fecha() {
			return moment().format('LL');
		}
</script>

@endpush

