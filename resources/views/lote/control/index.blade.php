@extends('home')

@section('content')
<div id="control">
    <div class="container">
<<<<<<< HEAD
        <div class="" >
            <graficos-component></graficos-component>
=======
        <div class="" style="margin-top: 6%">
            <maincontrol-component></maincontrol-component>
>>>>>>> af9c08d5a452e95d06d892294fb68d057702b455
        </div>
    </div>
</div>
@endsection

<<<<<<< HEAD

@push('scripts')
=======
@section('scripts')
>>>>>>> af9c08d5a452e95d06d892294fb68d057702b455
{{-- <script src="{{ asset('js/lote/control/control.js') }}"></script> --}}
<script src="{{ asset('js/lote/control/silo-progressbar.js') }}"></script>
<script src="{{ asset('js/lote/control/termometro.js') }}"></script>

<script type="text/javascript">

	var miSilo = new Silo("silo", "{{ asset('img/silo/silo.png') }}", {height:454, width:300}, {bottom:73, height:337});
		miSilo.value(78)
	
	var miTermometro = new Termometro("termo", "{{ asset('img/termometro/termometro.png') }}", {height:1200, width:300}, {bottom:40, height:1080},0.4);
		miTermometro.value(20)
</script>

<<<<<<< HEAD
          socket.on('responseTemp',(msg)=> {
                miTermometro.value(msg);
          })
</script>
@endpush
=======
@endsection
>>>>>>> af9c08d5a452e95d06d892294fb68d057702b455

