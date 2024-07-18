@extends('dashboard')
@section('content')
<form class="col-10 pl-2" method="post" action="/productdesinfections/{{$productdesinfection->id}}" id="form">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $productdesinfection->id }}">


        <div class="form-group">
            <label>Nombre del Producto:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$productdesinfection->name}}" required>
        </div>
        <div class="form-group">
            <label>Disolución:</label>
            <input type="text" class="form-control" id="desolution" name="desolution" value="{{$productdesinfection->desolution}}" required>
        </div>
        <div class="form-group">
            <label for="status">Estado
            <input type="checkbox" class="form-control" id="status" name="status" value="1" {{$productdesinfection->status ? 'checked' : '' }}>
            </label>
        </div>
        <div>
         
        <a href="/places/index" class="btn btn-primary" tabindex="5">Volver</a>
        <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
        </div>
    </form>
    @endsection