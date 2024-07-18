@extends('dashboard')
@section('content')
<div class="container pt-3">
<form id="formulario"  method="post" action="/certificates/{{$certificate->id}}" id="form">
{{csrf_field()}}
    <div class="dat">
    <label for ="Cnumber">Certificado:</label>
    <input type="number" style="text-align:center" id="Cnumber" name="Cnumber" value="{{$certificate->Cnumber}}">
  </div>
  <div class="dat">
    <label for="date">Fecha:</label>
    <input type="date" name="date" id="date" value="{{$certificate->date}}">
  </div>
    <h1><u>
        CERTIFICADO DESINFECCIÓN
        </u>
    </h1>
    <br>
    <p><strong>Quellon Service Spa. Certifica que los Procedimientos aplicados, están en el cumplimiento de las normativas exigidas por la Autoridad pertinente, habiendo prestado los Servicios a:</strong></p>
<br>   
    <table class="table table-success table-bordered">
    <thead>
        <tr>
          <th>
          <label for="client" class="form-label">Señor(es):</label>
          </th>
          <th>
          <label for="client" class="form-label">Rut:</label>
          </th>
          <th>
          <label for="client" class="form-label">Contacto:</label>
          </th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <select name="client_id" id="nameSelect" data-live-search="true" value="{{$certificate->client->name}}">
              @foreach($clients as $client)
                <option  value="{{$client->id}}" {{$certificate->client_id == $client->id ? 'selected' : '' }}>{{$client->name }}</option>
              @endforeach
            </select>
        </td>
        <td>
           <select name="client_id" id="rutSelect" value="{{$certificate->client->rut}}">
            @foreach($clients as $client)
            <option value="{{$client->id}}" {{$certificate->client_id == $client->id ? 'selected' : ''}}>{{$client->rut}}</option>
            @endforeach
          </select> 
        </td>
        <td>
        <select name="client_id" id="contactSelect" value="{{$certificate->client->contact}}">
    @foreach($clients as $client)
      <option value="{{$client->id}}" {{$certificate->client_id == $client->id ? 'selected' : ''}}>{{$client->contact}}</option>
      
      @endforeach
    </select>
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
    <input type="checkbox" id="corrective" name="corrective" value="1"{{$certificate->corrective ? 'checked' : '' }}>
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
              <input type="checkbox" name="maritime" id="maritime" value="1" {{$certificate->maritime ? 'checked' : '' }}>
            </label></td>
            <td>
                 <select name="boat_id" id="boat_id" value="{{$certificate->boat->boatname}}">
                    @foreach($boats as $boat)
                       <option  value="{{$boat->id}}" {{$certificate->boat_id == $boat->id ? 'selected' : ''}}>{{$boat->boatname}}</option>
                          @endforeach
                  </select>
            </td>
            <td>
                 <select name="boat_id" id="boat_id" value="{{$certificate->boat->matricule}}">
                    @foreach($boats as $boat)
                       <option  value="{{$boat->id}}" {{$certificate->boat_id == $boat->id ? 'selected' : ''}}>{{$boat->matricule}}</option>
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
              <input type="checkbox" name="clean"id="clean" value="1" {{$certificate->clean ? 'checked' : '' }}>
            </label>
            </td>   
            <td>
                 <select name="productclean_id" id="product_id" value="{{$certificate->productclean->name}}">
                    @foreach($productcleans as $productclean)
                       <option  value="{{$productclean->id}}" {{$certificate->productclean_id == $productclean->id ? 'selected' : ''}}>{{$productclean->name}}</option>
                          @endforeach
                  </select>

            </td>
            <td>
                 <select name="productclean_id" id="product_id" value="{{$certificate->productclean->desolution}}">
                    @foreach($productcleans as $productclean)
                       <option  value="{{$productclean->id}}" {{$certificate->productclean_id == $productclean->id ? 'selected' : ''}}>{{$productclean->desolution}}</option>
                          @endforeach
                  </select>
            </td>

            <tr>
            <td>
            <label for="desinfection">Desinfección:
              <input type="checkbox" name="desinfection" id="desinfection" value="1" {{$certificate->desinfection ? 'checked' : '' }}>
            </label>
            </td>
            <td>
                 <select name="productdesinfection_id" id="product_id" value="{{$certificate->productdesinfection->name}}">
                    @foreach($productdesinfections as $productdesinfection)
                       <option  value="{{$productdesinfection->id}}" {{$certificate->productdesinfection_id == $productdesinfection->id ? 'selected' : ''}}>{{$productdesinfection->name}}</option>
                          @endforeach
                  </select>

            </td>
            <td>
                 <select name="productdesinfection_id" id="product_id" value="{{$certificate->productdesinfection->desolution}}">
                    @foreach($productdesinfections as $productdesinfection)
                       <option  value="{{$productdesinfection->id}}" {{$certificate->productdesinfection_id == $productdesinfection->id ? 'selected' : ''}} >{{$productdesinfection->desolution}}</option>
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
            <select name="user_id" id="user_id" value="{{$certificate->user->name}}">
                    @foreach($users as $user)
                       <option  value="{{$user->id}}" {{$certificate->user_id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
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
             <select name="place_id" id="place_id" value="{{$certificate->place->name}}">
                    @foreach($places as $place)
                       <option  value="{{$place->id}}" {{$certificate->place_id == $place->id ? 'selected' : ''}}>{{$place->placename}}</option>
                          @endforeach
                  </select>
             </th> 
          </tr>
    </thead>
    <thead>
      <tr>
        <th>
          <label for="entrytime">Hora inicio: 
          <input type="time" name="entrytime" id="entrytime" value="{{$certificate->entrytime}}" required></label>
        </th>
        <th>
          <label for="finishtime">Hora Termino: 
          <input type="time" name="finishtime" id="finishtime" value="{{$certificate->finishtime}}" ></label>
        </th>
      </tr>
    </thead>
    </table>
    <div>
      <label for="formGroupExampleInput" class="form-label">Observaciones:</label>
     
      <input type="text" name="observations" id="observations" value="{{$certificate->observations}}" class="form-control" >
    
    </div>
    <br>
    <div>
      <label for="origen">Origen:</label>
      <input type="text" id="origen" name="origen" value="{{$certificate->origen}}">
    </div>
    <br>
    <div>
      <label for="destiny">Destino:</label>
      <input type="text" id="destiny" name="destiny" value="{{$certificate->destiny}}">
    </div>
    <br>
    <div  class="form-group">
      <label for="status">Estado:</label>
      <select name="status" id="status">
        <option value="Pendiente" {{ $certificate->status == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option id="Cancelado" value="Cancelado" {{ $certificate->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
        <option id="Abonado" value="Abonado" {{ $certificate->status == 'Abonado' ? 'selected' : '' }}>Abonado</option>
        <option id="Anulado" value="Anulado" {{ $certificate->status == 'Anulado' ? 'selected' : '' }}>Anulado</option>
      </select>
    </div>
    <div class="form-group" id="paymentMethod" style="display: none;">
      <label for="pay">Pago:</label>
      <select name="pay" id="pay">
        <option value="Elige" {{ $certificate->pay == 'Elige' ? 'selected' : '' }}>Elige</option>
        <option value="Efectivo" {{ $certificate->pay == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
        <option value="Debito" {{ $certificate->pay == 'Debito' ? 'selected' : '' }}>Debito</option>
        <option value="Credito" {{ $certificate->pay == 'Credito' ? 'selected' : '' }}>Credito</option>
        <option value="Transferecia" {{ $certificate->pay == 'Transferecia' ? 'selected' : '' }}>Transferencia</option>
      </select>
    </div>
    <div class="form-group" id="cancelReason" style="display: none;">
      <label for="formGroupExampleInput" class="form-label" >Motivo:</label>
      <input type="text" id="motive" name="motive" class="form-control" value="{{$certificate->motive}}">
    </div>
    <div>
    <p ><strong>Se extiende el presente Certificado, para los fines que estime conveniente el interesado. Agradecimiendo por su preferencia.</strong></p>
    </div>
  
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-success" tabindex="4">Guardar</button>
    </div>
    </form>
</div>
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
 

  myMaritime.addEventListener('change', function() {
    if (this.checked) {
      myBoat.disabled = false;
      myMatricule.disabled = false;
    } else {
      myBoat.disabled = true;
      myMatricule.disabled = true;
    }
  });
</script>
<script>
  const myClean = document.querySelector('#clean');
  const myProduct1 = document.querySelector('#productname1');
  const myDesolution = document.querySelector('#desolution1');
  myClean.addEventListener('change',function(){
      if(this.checked){
        myProduct1.disabled = false;
        myDesolution.disabled = false;
      }else{
        myProduct1.disabled = true;
        myDesolution.disabled = true;
        
      }
  })
</script>
<script>
  const myDesinfection = document.querySelector('#desinfection');
  const myProduct2 = document.querySelector('#productname2');
  const myDesolution2 = document.querySelector('#desolution2');
  myDesinfection.addEventListener('change',function(){
    if(this.checked){
      myProduct2.disabled = false;
      myDesolution2.disabled = false;
    }else{
      myProduct2.disabled = true;
      myDesolution2.disabled = true;
    }
  })
</script>
<style>
      .formulario {
  border: 2px dotted #444;
  
}
</style>
    @endsection