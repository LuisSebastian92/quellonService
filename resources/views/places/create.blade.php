@extends('dashboard')
@section('content')
<div class="container pt-3">
    <h1>
        Agregar Lugar de desinfección
    </h1>
    <form method="post" action="{{url('places/create/store')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Nombre del Lugar</label>
      <input type="text" class="form-control"  name="placename" id="placename" required>
    </div>
    <div class="form-group">
    <label for="status">Estado
    <input type="checkbox" class="form-control" id="status" name="status" value="1">
    </label>
    </div>
    <div>
    <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
    <a href="/places/index" class="btn btn-primary" tabindex="5">Volver</a>
    </div>

    </form>
  </div>
@stop