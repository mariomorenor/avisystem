@extends('home')

@section('content')
<div id="control">
    <div class="container">
        <div class="row">
            <div class="col-5 mt-3">
                <graficos-component></graficos-component>
                {{-- <div id="graficoAlimentacion" class="border-dark mx-auto">
                    <div id="silo" class="silo-progressbar"></div>
                </div>
                <div id="graficoTemperatura" class="border-dark mx-auto" hidden>
                    <div id="termo" class="silo-progressbar"></div>
                </div>
                <div class="row mt-2" >
                    <div class="d-flex mx-auto ">
                        <button :disabled="picture == 'feed'? true:false" class="btn btnGrafico btn-success">Alimentación</button>
                        <button :disabled="picture == 'temp'? true:false" class="btn btnGrafico btn-success ml-2">Temperatura</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
{{-- <script src="{{ asset('js/lote/control/control.js') }}"></script> --}}
<script src="{{ asset('js/lote/control/silo-progressbar.js') }}"></script>
<script src="{{ asset('js/lote/control/termometro.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script type="text/javascript">

	var miSilo = new Silo("silo", "{{ asset('img/silo/silo.png') }}", {height:454, width:300}, {bottom:73, height:337});
		miSilo.value(78)
	
	var miTermometro = new Termometro("termo", "{{ asset('img/termometro/termometro.png') }}", {height:1200, width:300}, {bottom:40, height:1080},0.4);
		miTermometro.value(20)
</script>
<script>
        var socket = io('http://avisystem.test:8081');
        
        $(function () {
            setTimeout(function(){
                socket.emit('temperatura');
            }, 2000)
          })

          socket.on('responseTemp',(msg)=> {
                miTermometro.value(msg);
          })
</script>
@endsection

