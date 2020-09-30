@extends("plantilla")
@section("contenido")
<div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <button class='btn btn-warning' data-toggle='modal' data-target='#formNuevo' ><i class='fa fa-user-plus'></i> nuevo registro</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table-bordered">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha nacimiento</th>
                    <th>Direccion</th>
                </thead>
                <tbody>
                    @if($datos)
                        @foreach($datos as $val)
                        <tr>
                            <td>{{$val->nombre}}</td>
                            <td>{{$val->apellido}}</td>
                            <td>{{$val->nacimiento}}</td>
                            <td>{{$val->direccion}}</td>
                        </tr>
  
                        @endforeach
                    @endif
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--modal-->
 <div class="modal fade" id="formNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{route('home.store')}}">     
                  @csrf
            <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input required type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-users"></i></span>
                            </div>
                            <input required type="text" class="form-control" placeholder="Apellidos" id="apellido" name="apellido">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-birthday-cake"></i></span>
                            </div>
                            <input required type="date" class="form-control" placeholder="Fecha" id="edad" name="edad">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-building"></i></span>
                            </div>
                            <textarea required id="dom" name="dom" class="form-control" rows="1" placeholder="Domicilio"></textarea>
                        </div>
                    </div>
                </div>
              <div class="row">
                  <div class="col-md-4 offset-md-4">
                      <button type="submit" class="btn btn-success" id="eguardar" ><i class="fa fa-save"></i> Guardar</button>
                  </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrar">Cerrar</button>
          </div>
        </div>
      </div>
     
    </div>

@endsection
