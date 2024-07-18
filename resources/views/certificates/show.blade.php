@extends('dashboard')
@section('content')

<div class="container pt-3">
  <head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.10.0/jspdf.umd.min.js"></script>
</head>
  </head>
<form  method="post" action="/certificates/{{$certificate->id}}"  id="contenido-vista">
{{csrf_field()}}
      <div class="dat">
    <label for ="Cnumber">Numero de Certificado: {{$certificate->Cnumber}}</label>
    </div>
  <div class="dat">
    <label for="date">Fecha: {{$certificate->date}}</label>
  </div>
    <h1><u>
        CERTIFICADO DESINFECCIÓN
        </u>
    </h1>
    <br>
    <p><strong>Quellon Service Spa. Certifica que los Procedimientos aplicados, están en el cumplimiento de las normativas exigidas por la Autoridad pertinente, habiendo prestado los Servicios a:</strong></p>
<br>
<table id="mi-tabla" class="table table-success table-bordered">
    <thead>
        <tr>
          <th>
            <label for="client_id" class="form-label">Señor(es):</label>
          </div>
          </th>
          <th>
            <label for="client_id" class="form-label">Rut:</label>
          </th>
          <th>
            <label for="contact" class="form-label">Contacto:</label>
          </th>
        </tr>
    </thead>
    <tbody>
<tr>
  <td>
  {{$certificate->client->name}}
  </td>
  <td>
  {{$certificate->client->rut}}
  </td>
  <td>
  {{$certificate->client->contact}}
  </td>
</tr>
    </tbody>
   </table>

    <div>
    <h2>Espacio Tratado</h2>
    <br>
    <label for="preventive">Preventiva:</label>
    <input type="checkbox" id="preventive" name="preventive" value="1" {{$certificate->preventive ? 'checked' : '' }}>
    <label for="correctiva">Correctiva:</label>
    <input type="checkbox" id="corrective" name="corrective" value="1" {{$certificate->corrective ? 'checked' : '' }}>
    </div>
    
    <table id="mi-tabla" class="table table-success table-bordered">
      <thead>
         <tr>
          <th>Espacio</th>
          <th>Detalle</th>
          <th>Matricula</th>
         </tr>
      </thead>
      <tbody>
          <tr>
            <td>
              <label for="maritime">Maritimo:
              <input type="checkbox" name="maritime" id="maritime" value="1" {{$certificate->maritime ? 'checked' : '' }}>
            </label></td>
            <td>
                <label for="boat" class="form-label">{{$certificate->boat->boatname}}</label>
            </div>
            </td>
            <td>
                <label for="boat" class="form-label">{{$certificate->boat->matricule}}</label>
            </div>
            </td>
          </tr>
      </tbody>
    </table>
    <br>
    <div>
    <h2>Tratamiento</h2>
    </div>
    <br>
    <table id="mi-tabla" class="table table-success table-bordered">
      <thead>
         <tr>
          <th>Tratamiento</th>
          <th>Producto Utilizado</th>
          <th>Dilución/Concentración</th>
         </tr>
      </thead>
      <tbody>
          <tr>
            
            <td><label for="clean">Limpieza/Lavado:
              <input type="checkbox" name="clean"id="clean" value="1" {{$certificate->clean ? 'checked' : '' }}>
            </label>
            </td>   
            <td>
                <label for="productclean" >{{$certificate->productclean->name}}</label>
            </div>
            </td>
            <td>
                <label for="productclean" >{{$certificate->productclean->desolution}}</label>
            </div>
            </td>

            <tr>
            <td>
            <label for="desinfection">Desinfección:
              <input type="checkbox" name="desinfection" id="desinfection" value="1" {{$certificate->desinfection ? 'checked' : '' }}>
            </label>
            </td>
            <td>
                <label for="productdesinfection" >{{$certificate->productdesinfection->name}}</label>
            </div>
            </td>
            <td>
                <label for="productdesinfection">{{$certificate->productdesinfection->desolution}}</label>
            </div>
            </td>
            </tr>
          </tr>
      </tbody>
    </table>
    <div>
    <h2>Supervisión</h2>
    </div>
    <br>
    <table id="mi-tabla" class="table table-success table-bordered">
      <thead>
         <tr>
          <th>Operador Aplicador:</th>
          <th>                 
 
                <label for="User">{{$certificate->user->name}}</label>
            </div>
          </th>
     
         </tr>
      </thead>
      <thead>
          <tr>
            <th>
              Lugar Desinfección:
            </th>   
             <th>

                <label for="place" >{{$certificate->place->placename}}</label>
            </div>
             </th> 
          </tr>
    </thead>
    <thead>
      <tr>
        <th>
          <label for="entrytime">Hora inicio: {{$certificate->entrytime}}</label>
        </th>
        <th>
          <label for="finishtime">Hora Termino: {{$certificate->finishtime}}</label>
        </th>
      </tr>
    </thead>
    </table>
    <div>
      <label for="formGroupExampleInput" class="form-label">Observaciones: {{$certificate->observations}}</label>
    </div>
    <br>
    <div>
      <label for="origen">Origen: {{$certificate->origen}}</label>

    </div>
    <br>
    <div>
      <label for="destiny">Destino: {{$certificate->destiny}}</label>

    </div>
    <br>
    <div>
    <p ><strong>Se extiende el presente Certificado, para los fines que estime conveniente el interesado. Agradecimiendo por su preferencia.</strong></p>
    </div>
    <div>
    <canvas id="signatureCanvas" width="400" height="200"></canvas>
    <button id="saveButton">Guardar firma</button>

    </div>
    </div>
    <br>
    <div style="text-align:center">
    <a href="/certificates/index" class="btn btn-primary" tabindex="5">Volver</a>
    <button id="pdfButton" class="btn btn-warning">PDF</button>
    <a href="/certificates/{{$certificate->id}}/show/ticket" class="btn btn-success">Generar</a>
    </div>
    </form>
</div>

<script>
  // Obtenemos el lienzo del canvas y el botón de guardar
var canvas = document.getElementById("signatureCanvas");
var saveButton = document.getElementById("saveButton");

// Obtenemos el contexto 2D del canvas
var context = canvas.getContext("2d");

// Variables para rastrear el estado del dibujo
var isDrawing = false;
var previousX = 0;
var previousY = 0;

// Evento de inicio del dibujo
canvas.addEventListener("mousedown", function (event) {
  isDrawing = true;
  previousX = event.clientX - canvas.offsetLeft;
  previousY = event.clientY - canvas.offsetTop;
});

// Evento de finalización del dibujo
canvas.addEventListener("mouseup", function () {
  isDrawing = false;
});

// Evento de dibujo
canvas.addEventListener("mousemove", function (event) {
  if (isDrawing) {
    var currentX = event.clientX - canvas.offsetLeft;
    var currentY = event.clientY - canvas.offsetTop;
    drawLine(previousX, previousY, currentX, currentY);
    previousX = currentX;
    previousY = currentY;
  }
});

// Función para dibujar una línea en el canvas
function drawLine(x1, y1, x2, y2) {
  context.beginPath();
  context.moveTo(x1, y1);
  context.lineTo(x2, y2);
  context.stroke();
  context.closePath();
}

// Evento de guardar firma
saveButton.addEventListener("click", function () {
  // Convertimos el contenido del canvas en una imagen base64
  var signatureData = canvas.toDataURL();
  
  // Puedes enviar la firma a tu servidor o guardarla en el almacenamiento local
  // Aquí puedes agregar el código para guardar o enviar la firma según tus necesidades
  
  // Ejemplo: Mostramos la imagen de la firma en una nueva ventana
  var signatureImage = new Image();
  signatureImage.src = signatureData;
  var newWindow = window.open();
  newWindow.document.write(signatureImage.outerHTML);
});

</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("pdfButton").addEventListener("click", function() {
    html2canvas(document.getElementById('contenido-vista')).then(function(canvas) {
      var imgData = canvas.toDataURL('image/png');
      var pdf = new jsPDF('p', 'mm', 'a4');
      var imgProps = pdf.getImageProperties(imgData);
      var pdfWidth = pdf.internal.pageSize.getWidth();
      var pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
      pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
      pdf.save('formulario.pdf');
    });
  });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


    <style>
      #mi-tabla {
          border-collapse: collapse;
          width: 100%;
        }

      #mi-tabla th,
      #mi-tabla td 
      {
          border: 1px solid black;
          padding: 8px;
        }

        .formulario {
       border: 2px dotted #444;
  
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
      .center{
        text-align:center;
      }
 
    </style>
    </div>

    @endsection