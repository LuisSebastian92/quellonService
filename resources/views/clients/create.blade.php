@extends('dashboard')
@section('content')
<div class="container pt-3">
    <h1>
        Agregar Cliente
    </h1>
    <form method="post" action="{{url('clients/create/store')}}" id="form">
    {{csrf_field()}}

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Nombre</label>
      <input type="text" class="form-control"  name="name" id="name" required>
    </div>

    <div class="form-group">
      <label for="formGroupExampleInput" class="form-label">Rut</label>
      <input type="text" class="form-control" name="rut" id="rut" required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2" class="form-label">Contacto</label>
      <input type="text" class="form-control"  name="contact" id="contact" required>
    </div>
    <div class="form-group">
    <label for="status">Estado
    <input type="checkbox" class="form-control" id="status" name="status" value="1">
    </label>
    </div>
    <div>
    <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
    </div>

    </form>
  </div>
@stop