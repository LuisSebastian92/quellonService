@extends('dashboard')
@section('content')
<div class="container pt-3">
    <h1>
        Agregar Embarcación
    </h1>
    <form method="post" action="{{url('boats/create/store')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Nombre</label>
      <input type="text" class="form-control"  name="boatname" id="boatname" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Matricula</label>
      <input type="text" class="form-control" name="matricule" id="matricule" required>
    </div>
    <div class="form-group">
    <label for="status">Estado
    <input type="checkbox" class="form-control" id="status" name="status" value="1">
    </label>
    </div>
    <div>
    <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
    </div>

    </div>
    
    </form>
  </div>
@stop