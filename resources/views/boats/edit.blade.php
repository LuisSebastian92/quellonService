@extends('dashboard')
@section('content')
<form class="col-10 pl-2" method="post" action="/boats/{{$boat->id}}" id="form">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $boat->id }}">


        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" class="form-control" id="boatname" name="boatname" value="{{$boat->boatname}}" >
        </div>
        <div class="form-group">
            <label>Matricula:</label>
            <input type="text" class="form-control" placeholder="" id="matricule" name="matricule" value="{{$boat->matricule}}">
        </div>
        <div class="form-group">
            <label for="status">Estado:
            <input type="checkbox" class="form-control" id="status" name="status" value="1" {{$boat->status ? 'checked' : '' }}>
            </label>
        </div>
         <div>
            <a href="/boats/index" class="btn btn-primary" tabindex="5">Volver</a>
            <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
         </div>


    </form>
    @endsection