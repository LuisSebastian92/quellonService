@extends('dashboard')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

@section('content')
<div class="d-flex justify-content-between align-items-center">
            <h1>Lista de Certificados</h1>
            <a  href="{{ url('/') }}/certificates/create" class="btn btn-success">
            <i class="fas fa-plus"></i>
                Agregar Certificado
            </a>
        </div>
<table id="example" class="display" style="width:100%">
  <thead>
      <tr>
          <th scope="col">id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Contacto</th>
          <th scope="col">Supervision</th>
          <th scope="col">Numero de Guia</th>
          <th scope="col">Fecha</th>
          <th scope="col">Estado</th>
          <th scope="col">Pago</th>
          <th scope="col">Acciones</th>
      </tr>
  </thead>
  <tbody>
       @foreach($certificates as $certificate)
       <tr>
           <td>{{$certificate->id}}</td>
           <td>{{$certificate->client->name}}</td>
           <td>{{$certificate->client->contact}}</td>
           <td>{{$certificate->user->name}}</td>
           <td>{{$certificate->Cnumber}}</td>
           <td>{{$certificate->date}}</td>
           <td>{{$certificate->status}}</td>
           <td>{{$certificate->pay}}</td>
           <td>
               <a href="/certificates/{{$certificate->id}}/edit" class="btn btn-info"><i class="fas fa-edit"></i></a>
               <a href="/certificates/{{$certificate->id}}/show" class="btn btn-warning"><i class="fas fa-info"></i></a>
               <a href="/certificates/{{$certificate->id}}/destroy" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>               
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