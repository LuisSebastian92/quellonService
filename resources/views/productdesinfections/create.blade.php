@extends('dashboard')
@section('content')
<div class="container pt-3">
    <h1>
        Agregar Producto de Desinfección
    </h1>
    <form method="post" action="{{url('productdesinfections/create/store')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Nombre del Producto:</label>
      <input type="text" class="form-control"  name="name" id="name" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Disolución:</label>
      <input type="text" class="form-control"  name="desolution" id="desolution" required>
    </div>
    <div class="form-group">
    <label for="status">Estado
    <input type="checkbox" class="form-control" id="status" name="status" value="1">
    </label>
    </div>
    <div>
    <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
    <a href="/productdesinfections/index" class="btn btn-primary" tabindex="5">Volver</a>
    </div>

    </form>
  </div>
@stop