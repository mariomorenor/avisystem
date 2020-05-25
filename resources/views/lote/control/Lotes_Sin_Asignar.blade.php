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
                        <div class="alert alert-warning">
                            <span class="text-dark">
                                No se está controlando ningún lote por favor, seleccione uno de los lotes disponibles o ingrese uno nuevo, para ingresar un nuevo lote, <button data-backdrop="static"  data-toggle="modal" data-target="#add_new_lote" class="btn btn-primary">presione aquí</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-7 mx-auto">
                <h2>Lotes Disponibles</h2>
                @isset($lotes)
                    @foreach ($lotes as $lote)
                        <div class="list-group mt-2">
                            <div class="d-flex">
                                <div class="card rounded shadow">
                                    <div class="card-body  py-3 d-flex">
                                        <span class="my-auto mr-2">
                                            Código Lote: {{$lote->code}} - Cantidad de Pollos: {{$lote->quantity}}
                                        </span>
                                        
                                        <form action="{{ route('select_lote', ['lote'=>$lote]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Seleccionar Lote">
                                                <i class="fas fa-check-circle fa-lg"></i>
                                            </button>
                                        </form>
                                        <div class="my-auto ml-2">
                                            <form action="{{ route('delete_lote', ['lote'=>$lote]) }}" id="form_delete_lote_{{$lote->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="button" onclick="delete_available_lote({{$lote->id}})" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Eliminar Lote">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                   
                            </div>
                       
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger">
                        <span>No Existen Lotes Disponibles</span>
                    </div>
                @endisset
            </div>
        </div>
    </div>

  
  <!-- Modal -->
  <div class="modal fade" id="add_new_lote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Lote</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form_store_lote" action="{{ route('store_lote') }}" method="post">
              @csrf
              <div class="container">
                  <div class="row">
                      <div class="col-8 mx-auto">
                          <div class="form-group">
                                <label for="user">Usuario:</label>
                                <input type="text" readonly value="{{Auth::user()->username}}" class="form-control">
                                <input type="text" hidden value="{{Auth::user()->id}}" name="user_id" class="form-control">
                          </div>
                          <div class="form-group">
                                <label for="date">Fecha:</label>
                                <input type="text" readonly id="date" class="form-control">
                                <input type="date" value="{{date('Y-m-d')}}" name="date_in" hidden >
                          </div>
                          <div class="form-group">
                              <label for="quantity">Ingrese la Cantidad Inicial:</label>
                              <input type="number" placeholder="Número de Pollos" name="quantity" required class="form-control" min="1">
                          </div>
                          <div class="form-group">
                              <label for="observation">Observación:</label>
                              <textarea placeholder="Observaciones sobre el lote..." class="form-control" name="observation" id="observation" cols="30" rows="3"></textarea>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" form="form_store_lote" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
    <script>
            $("#date").val(moment().format('LL'));
            function delete_available_lote(id) {
                Swal.fire({
                    icon: 'question',
                    title: 'Eliminar Lote Disponible?',
                    text: 'Está seguro de eliminar el Lote Disponible?',
                    showCancelButton: true,
                    allowOutsideClick: false
                }).then((result)=>{
                    if (result.value) {
                        $('#form_delete_lote_'+id).submit();
                    }
                });
            }
    </script>
@endsection