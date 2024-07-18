@extends('dashboard')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

@section('content')
<div  class="d-flex justify-content-between align-items-center">
            <h1>Lista de Productos de Limpieza</h1>
            <a  href="{{ url('/') }}/productcleans/create" class="btn btn-success">
            <i class="fas fa-plus"></i>
                Agregar Producto
            </a>
        </div>
<table id="example" class="display" style="width:100%">
  <thead>
      <tr>
          <th scope="col">id</th>
          <th scope="col">Producto</th>
          <th scope="col">Disolución</th>
          <th scope="col">Estado</th>
          <th scope="col">Acciones</th>
      </tr>
  </thead>
  <tbody>
       @foreach($productcleans as $productclean)
       <tr>
           <td>{{$productclean->id}}</td>
           <td>{{$productclean->name}}</td>
           <td>{{$productclean->desolution}}</td>
            <td>{{$productclean->status}}</td>
           <td>
               <a href="/productcleans/{{$productclean->id}}/edit" class="btn btn-info"><i class="fas fa-edit"></i></a>               
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