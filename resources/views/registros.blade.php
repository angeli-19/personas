@extends("plantilla")
@section("contenido")
<div class="row">
    <div class="col-md-4 offset-md-4">
        @if(Session::get('success'))
        <div class="alert alert-success">
            <i class="fa fa-check"></i>{{Session::get('success')}}
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-4 offset-md-4">
        @if($errors->any())
        <div class="alert alert-danger">
            <i class="fa fa-times"><b> Errores</b><br>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </i>
        </div>
        @endif
    </div>
</div>
<div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <button class='btn btn-info' data-toggle='modal' data-target='#formNuevo' ><i class='fa fa-user-plus'></i> nuevo registro</button>
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
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    @if($datos)
                        @foreach($datos as $val)
                        <tr>
                            <td>{{$val->nombre}}</td>
                            <td>{{$val->apellido}}</td>
                            <td>{{$val->nacimiento}}</td>
                            <td>{{$val->direccion}}</td>
                            <td><button class="btn-warning" data-toggle='modal' data-target='#formEditar'
                                        onclick="mostrarDatos(this);"
                                        data-id="{{$val->id}}" data-nombre="{{$val->nombre}}" 
                                        data-ap="{{$val->apellido}}" data-na="{{$val->nacimiento}}"
                                        data-dir="{{$val->direccion}}">
                                    
                                    <i class="fa fa-edit"></i>
                                    
                                </button>
                            </td>
                            <td>
                                <form method="POST" action="{{route('home.destroy',$val->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="validar(this);" >
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    
                                </form>
                            </td>
                            
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




<div class="modal fade" id="formEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form id='edita' method="POST" action="">     
                  @csrf 
                  @method('PATCH')
            <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input required type="text" class="form-control" placeholder="Nombre" id="enombre" name="enombre">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-users"></i></span>
                            </div>
                            <input required type="text" class="form-control" placeholder="Apellidos" id="eapellido" name="eapellido">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-birthday-cake"></i></span>
                            </div>
                            <input required type="date" class="form-control" placeholder="Fecha" id="eedad" name="eedad">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-building"></i></span>
                            </div>
                            <textarea required id="edom" name="edom" class="form-control" rows="1" placeholder="Domicilio"></textarea>
                        </div>
                    </div>
                </div>
              <div class="row">
                  <div class="col-md-4 offset-md-4">
                      <button type="submit" class="btn btn-success" id="eguardar" ><i class="fa fa-sync-alt"></i> EDITAR</button>
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


<script>
    function mostrarDatos(btn){
        var id =$(btn).attr("data-id");
        var nombre =$(btn).attr("data-nombre");
        var ap =$(btn).attr("data-ap");
        var na =$(btn).attr("data-na");
        var dir =$(btn).attr("data-dir");
        var url="{{route('home.update',0)}}";
        
        $("#enombre").val(nombre);
        $("#eapellido").val(ap);
        $("#eedad").val(na);
        $("#edom").val(dir);
        
        url= url.substr(0, url.length -1)+id;
        $("#edita").attr("action",url)
    }
    
   function validar(btn){
        event.preventDefault(); //Evitar envío de formulario
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: 'Estás seguro de eliminar?',
            text: "Este registro desaparecerá por completo",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
                $(btn).parent().submit();
            }
            else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Operación cancelada',
                'El registro se mantiene intacto',
                'error'
              )
            }
          });
    }

</script>
@endsection
