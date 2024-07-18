@extends('dashboard')
@section('content')
<form class="col-10 pl-2" method="post" action="/clients/{{$client->id}}" id="form">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $client->id }}">


        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$client->name }}" required>
        </div>
        <div class="form-group">
            <label>Rut:</label>
            <input type="text" class="form-control" placeholder="" id="rut" name="rut" value="{{$client->rut}}" required>
        </div>
        <div class="form-group">
            <label>Contacto:</label>
            <input type="text" placeholder="" id="contact" name="contact" value="{{$client->contact}}" required>
        </div>
        <div class="form-group">
            <label for="status">Estado
            <input type="checkbox"  id="status" name="status" value="1" {{$client->status ? 'checked' : '' }}>
            </label>
        </div>
         <div>
         <a href="/clients/index" class="btn btn-danger" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
         </div>


    </form>
    @endsection