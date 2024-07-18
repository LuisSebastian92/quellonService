@extends('dashboard')
@section('content')
<div class="container">
    <div class="header">
      <h1>Boleta</h1>
    </div>
    <div class="details">
     <div>
        <h5>Datos de la empresa</h5>
     </div>
     <div>
        <p>Certificado de Desinfección: {{$certificate->Cnumber}}</p>
     </div>
     <div>
        <p>{{$certificate->client->name}}</p>
        <p>{{$certificate->client->rut}}</p>
        <p>{{$certificate->client->contact}}</p>
     </div>
     <div>
        <p>Espacio: {{$certificate->place->placename}}</p>
     </div>
     <div>
        <p>Tratamiento:</p>
        <p>Limpieza: {{$certificate->productclean->name}} || {{$certificate->productclean->desolution}}</p>
        <p>Desinfección: {{$certificate->productdesinfection->name}} || {{$certificate->productdesinfection->desolution}}</p>
     </div>
    </div>
  
    </div>
    <a onclick="printPag()" class="btnc"><i class="fas fa-print"></i></a>
  </div>

  <style>
    .btnc{
        text-align:center;
        
    }
    .btnc{
        margin: 0 auto;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 200px;
      margin: 0 auto;
      padding: 10px;
      border: 1px solid #ccc;
    }

    h1, h2, p {
      margin: 0;
    }

    .header {
      text-align: center;
    }

    .details {
      margin-top: 20px;
    }

    .details table {
      width: 100%;
      border-collapse: collapse;
    }

    .details th, .details td {
      padding: 5px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    .total {
      margin-top: 20px;
      text-align: right;
    }
  </style>
  <script>
    function printPag() {
      window.print();
    }
  </script>  
@endsection