@extends('dashboard')
@section('content')
<div class="container pt-3">

    <form id="formulario" method="post" action="{{url('certificates/create/store')}}" id="form">
    {{csrf_field()}}
    <div class="dat">
    <label for ="Cnumber">Certificado:</label>
    <input type="number" style="text-align:center" id="Cnumber" name="Cnumber">
  </div>
  <div class="dat">
    <label for="date">Fecha:</label>
    <input type="date" name="date" id="date" required>
  </div>
    <h1><u>
        CERTIFICADO DESINFECCIÓN
        </u>
    </h1>
    <br>
    <p><strong>Quellon Service Spa. Certifica que los Procedimientos aplicados, están en el cumplimiento de las normativas exigidas por la Autoridad pertinente, habiendo prestado los Servicios a:</strong></p>
   <table class="table table-success table-bordered">
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
  <select name="client_id" id="nameSelect" data-live-search="true">
      @foreach($clients as $client)
        <option  value="{{$client->id}}">{{$client->name}}</option>
      @endforeach
  </selec>
  </td>
 
  <td>
  <select name="client_id" id="rutSelect">
      @foreach($clients as $client)
      <option value="{{$client->id}}" data-name="{{$client->name}}" data-contact="{{$client->contact}}">{{$client->rut}}</option>
            
      @endforeach
  </selec>
  </td>
  <td>
  <select name="client_id" id="contactSelect">
      @foreach($clients as $client)
        <option  value="{{$client->id}}">{{$client->contact}}</option>
      @endforeach
  </selec>
  </td>
</tr>
    </tbody>
   </table>
    <div >
     
    
    </div>
    <div >
   
     
    </div>

    <div>
    <h2>Espacio Tratado</h2>
    <br>
    <label for="preventive">Preventiva:</label>
    <input type="checkbox" id="preventive" name="preventive" value="1" >
    <label for="correctiva">Correctiva:</label>
    <input type="checkbox" id="corrective" name="corrective" value="1">
    </div>
    
    <table class="table table-success table-bordered">
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
              <input type="checkbox" name="maritime" id="maritime" value="1">
            </label></td>
            <td>
                 <select  value="0" name="boat_id" id="boat_id" disabled>
                    @foreach($boats as $boat)
                       <option  value="{{$boat->id}}">{{$boat->boatname}}</option>
                          @endforeach
                  </select>
            </td>
            <td>
                 <select value="0" name="matricule" id="matricule" disabled>
                    @foreach($boats as $boat)
                       <option  value="{{$boat->id}}">{{$boat->matricule}}</option>
                          @endforeach
                  </select>
            </td>
          </tr>
      </tbody>
    </table>
    <br>
    <div>
    <h2>Tratamiento</h2>
    </div>
    <br>
    <table class="table table-success table-bordered">
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
              <input type="checkbox" name="clean"id="clean" value="1">
            </label>
            </td>   
            <td>
                 <select value="0" name="productclean_id" id="productname1" disabled>
                    @foreach($productcleans as $productclean)
                       <option  value="{{$productclean->id}}">{{$productclean->name}}</option>
                          @endforeach
                  </select>

            </td>
            <td>
                 <select value="0" name="productclean_id" id="desolution1" disabled>
                    @foreach($productcleans as $productclean)
                       <option  value="{{$productclean->id}}">{{$productclean->desolution}}</option>
                          @endforeach
                  </select>
            </td>

            <tr>
            <td>
            <label for="certificate">Desinfección:
              <input type="checkbox" name="desinfection" id="desinfection" value="1">
            </label>
            </td>
            <td>
                 <select value="0" name="productdesinfection_id" id="productname2" disabled>
                    @foreach($productdesinfections as $productdesinfection)
                       <option  value="{{$productdesinfection->id}}">{{$productdesinfection->name}}</option>
                          @endforeach
                  </select>

            </td>
            <td>
                 <select value="0" name="productdesinfection_id" id="desolution2" disabled>
                    @foreach($productdesinfections as $productdesinfection)
                       <option  value="{{$productdesinfection->id}}">{{$productdesinfection->desolution}}</option>
                          @endforeach
                  </select>
            </td>
            </tr>
          </tr>
      </tbody>
    </table>
    <div>
    <h2>Supervisión</h2>
    </div>
    <br>
    <table class="table table-success table-bordered">
      <thead>
         <tr>
          <th>Operador Aplicador</th>
          <th>                 
            <select  name="user_id" id="user_id">
                    @foreach($users as $user)
                       <option  value="{{$user->id}}">{{$user->name}}</option>
                          @endforeach
            </select>
          </th>
     
         </tr>
      </thead>
      <thead>
          <tr>
            
            <th>
              Lugar Desinfección
            </th>   
             <th>
             <select name="place_id" id="place_id">
                    @foreach($places as $place)
                       <option  value="{{$place->id}}">{{$place->placename}}</option>
                          @endforeach
                  </select>
             </th> 
          </tr>
    </thead>
    <thead>
      <tr>
        <th>
          <label for="entrytime">Hora inicio: 
          <input type="time" name="entrytime" id="entrytime" required></label>
        </th>
        <th>
          <label for="entrytime">Hora Termino: 
          <input type="time" name="finishtime" id="finishtime" ></label>
        </th>
      </tr>
    </thead>
    </table>
    <div>
      <label for="formGroupExampleInput" class="form-label">Observaciones:</label>
     
      <input type="text" name="observations" id="observations" class="form-control">
    
    </div>
    <div>
      <label for="formGroupExampleInput" class="form-label">Origen:</label>
      <input type="text" id="origen" name="origen" class="form-control" required>
    </div>
    <div>
      <label for="formGroupExampleInput" class="form-label">Destino:</label>
      <input type="text" id="destiny" name="destiny" class="form-control">
    </div>
    <br>
    <div  class="form-group">
      <label for="status">Estado:</label>
      <select name="status" id="status">
        <option value="Pendiente">Pendiente</option>
        <option id="Cancelado" value="Cancelado">Cancelado</option>
        <option id="Abonado" value="Abonado">Abonado</option>
        <option id="Anulado" value="Anulado">Anulado</option>
      </select>
    </div>
    <div class="form-group" id="paymentMethod" style="display: none;">
      <label for="pay">Pago:</label>
      <select name="pay" id="pay">
        <option value="Elige">Elige</option>
        <option value="Efectivo">Efectivo</option>
        <option value="Debito">Debito</option>
        <option value="Credito">Credito</option>
        <option value="Transferecia">Transferencia</option>
      </select>
    </div>
    <div class="form-group" id="cancelReason" style="display: none;">
      <label for="formGroupExampleInput" class="form-label" >Motivo:</label>
      <input type="text" id="motive" name="motive" class="form-control">
    </div>
    <br>
    <div>
    <p ><strong>Se extiende el presente Certificado, para los fines que estime conveniente el interesado. Agradecimiendo por su preferencia.</strong></p>
    </div>
  
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
          // Capturar el evento de cambio del select de nombre
    document.getElementById('nameSelect').addEventListener('change', function () {
        var selectedIndex = this.selectedIndex;
        document.getElementById('rutSelect').selectedIndex = selectedIndex;
        document.getElementById('contactSelect').selectedIndex = selectedIndex;
    });
    document.getElementById('rutSelect').addEventListener('change', function () {
    var selectedIndex = this.selectedIndex;
    document.getElementById('nameSelect').selectedIndex = selectedIndex;
    document.getElementById('contactSelect').selectedIndex = selectedIndex;
});
    </script>
    <script>
  $(document).ready(function() {
    $('#selectpicker').change(function() {
      var clientId = $(this).val();
      $.ajax({
        url: '/clients/' + clientId,
        type: 'GET',
        success: function(response) {
          $('#rut').val(response.rut);
          $('#contact').val(response.contact);
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });
  });
</script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var statusSelect = document.getElementById('status');
        var paymentMethodDiv = document.getElementById('paymentMethod');
        var cancelReasonDiv = document.getElementById('cancelReason');

        statusSelect.addEventListener('change', function () {
            var selectedOption = statusSelect.options[statusSelect.selectedIndex].value;

            if (selectedOption === 'Cancelado' || selectedOption === 'Abonado') {
                paymentMethodDiv.style.display = 'block';
            } else {
                paymentMethodDiv.style.display = 'none';
            }

            if (selectedOption === 'Anulado') {
                cancelReasonDiv.style.display = 'block';
            } else {
                cancelReasonDiv.style.display = 'none';
            }
        });
    });
</script>

<script>
  const myMaritime = document.querySelector('#maritime');
  const myBoat = document.querySelector('#boat_id');
  const myMatricule = document.querySelector('#matricule');
  const myClean = document.querySelector('#clean');
  const myProduct1 = document.querySelector('#productname1');
  const myDesolution = document.querySelector('#desolution1');
  const myDesinfection = document.querySelector('#desinfection');
  const myProduct2 = document.querySelector('#productname2');
  const myDesolution2 = document.querySelector('#desolution2');
  myMaritime.addEventListener('change', function() {
    if (this.checked) {
      myBoat.disabled = false;
      myMatricule.disabled = false;
    } else {
      myBoat.disabled = true;
      myMatricule.disabled = true;
    }
  });
  myClean.addEventListener('change',function(){
      if(this.checked){
        myProduct1.disabled = false;
        myDesolution.disabled = false;
      }else{
        myProduct1.disabled = true;
        myDesolution.disabled = true;
        
      }
  });
  myDesinfection.addEventListener('change',function(){
    if(this.checked){
      myProduct2.disabled = false;
      myDesolution2.disabled = false;
    }else{
      myProduct2.disabled = true;
      myDesolution2.disabled = true;
    }
  });

</script>


</script>

    <style>
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
 

    </style>
  </div>
@stop
