@extends("plantilla")
@section("contenido")
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
@endsection
