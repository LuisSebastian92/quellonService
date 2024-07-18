@extends('dashboard')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

@section('content')
<div  class="d-flex justify-content-between align-items-center">
            <h1>Lista de Embarcaciones</h1>
            <a  href="{{ url('/') }}/boats/create" class="btn btn-success">
            <i class="fas fa-plus"></i>
                Agregar Embarcación
            </a>
        </div>
<table id="example" class="display" style="width:100%">
  <thead>
      <tr>
          <th scope="col">id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Matricula</th>
          <th scope="col">Estado</th>
          <th scope="col">Acciones</th>
      </tr>
  </thead>
  <tbody>
       @foreach($boats as $boat)
       <tr>
           <td>{{$boat->id}}</td>
           <td>{{$boat->boatname}}</td>
           <td>{{$boat->matricule}}</td>
           <td>{{$boat->status}}</td>
           <td>
               <a href="/boats/{{$boat->id}}/edit" class="btn btn-info"><i class="fas fa-edit"></i></a>               
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