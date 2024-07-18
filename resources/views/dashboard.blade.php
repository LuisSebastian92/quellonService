@extends('adminlte::page')

@section('title', 'Quellón Service')

@section('content_header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.10.0/jspdf.umd.min.js"></script>

<script src="js/app.js"></script>
 <style>
    table{
         text-align:center;
    }
    p{
        
        size:strong;
      
      }
      h1{
        text-align:center;
      }
      .dat{
        text-align:right;
      }
 </style>
 <style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>
@stop

@section('content')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>

    <script> console.log('Hi!'); </script>
@stop