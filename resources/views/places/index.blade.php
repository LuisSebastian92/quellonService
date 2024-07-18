@extends('dashboard')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

@section('content')
<div  class="d-flex justify-content-between align-items-center">
            <h1>Lista de Lugares de desinfección</h1>
            <a  href="{{ url('/') }}/places/create" class="btn btn-success">
            <i class="fas fa-plus"></i>
                Agregar Lugar
            </a>
        </div>
<table id="example" class="display" style="width:100%">
  <thead>
      <tr>
          <th scope="col">id</th>
          <th scope="col">Nombre del Lugar de desinfección</th>
          <th scope="col">Estado</th>
          <th scope="col">Acciones</th>
      </tr>
  </thead>
  <tbody>
       @foreach($places as $place)
       <tr>
           <td>{{$place->id}}</td>
           <td>{{$place->placename}}</td>
            <td>{{$place->status}}</td>
           <td>
               <a href="/places/{{$place->id}}/edit" class="btn btn-info"><i class="fas fa-edit"></i></a>               
           </td>
       </tr> 
       @endforeach
  </tbody>
</table>
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    $('#example').DataTable();
} );
    </script>
@endsection
@stop