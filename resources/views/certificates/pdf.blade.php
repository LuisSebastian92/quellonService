@extends('dashboard')
@section('content')
<form class="col-10 pl-2" method="post" action="/certificates/{{$certificate->id}}" id="form">
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
   
    <div class="form-group">
      <label for="client" class="form-label">Señor(es):</label>
      <select name="client_id" id="client_id" value="{{$certificate->client->name}}">
      @foreach($clients as $client)
        <option  value="{{$client->id}}" {{$certificate->client_id == $client->id ? 'selected' : '' }}>{{$client->name }}</option>
      @endforeach
      </select>
    <div class="form-group">
      <label for="client" class="form-label">Rut:</label>
      <select name="client_id" id="client_id" value="{{$certificate->client->rut}}">
        @foreach($clients as $client)
      <option value="{{$client->id}}" {{$certificate->client_id == $client->id ? 'selected' : ''}}>{{$client->rut}}</option>
      @endforeach
      </select>   
    </div>
    <div class="form-group">
      <label for="client" class="form-label">Contacto:</label>
      <select name="client_id" id="client_id" value="{{$certificate->client->contact}}">
    @foreach($clients as $client)
      <option value="{{$client->id}}" {{$certificate->client_id == $client->id ? 'selected' : ''}}>{{$client->contact}}</option>
      
      @endforeach
    </select>
    </div>

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
                 <select name="product_id" id="product_id" value="{{$certificate->product->productname}}">
                    @foreach($products as $product)
                       <option  value="{{$product->id}}" {{$certificate->product_id == $product->id ? 'selected' : ''}}>{{$product->productname}}</option>
                          @endforeach
                  </select>

            </td>
            <td>
                 <select name="product_id" id="product_id" value="{{$certificate->product->desolution}}">
                    @foreach($products as $product)
                       <option  value="{{$product->id}}" {{$certificate->product_id == $product->id ? 'selected' : ''}}>{{$product->desolution}}</option>
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
                 <select name="product_id" id="product_id" value="{{$certificate->product->productname}}">
                    @foreach($products as $product)
                       <option  value="{{$product->id}}" {{$certificate->product_id == $product->id ? 'selected' : ''}}>{{$product->productname}}</option>
                          @endforeach
                  </select>

            </td>
            <td>
                 <select name="product_id" id="product_id" value="{{$certificate->product->desolution}}">
                    @foreach($products as $product)
                       <option  value="{{$product->id}}" {{$certificate->product_id == $product->id ? 'selected' : ''}} >{{$product->desolution}}</option>
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
          <input type="time" name="entrytime" id="entrytime" value="{{$certificate->entrytime}}" require></label>
        </th>
        <th>
          <label for="entrytime">Hora Termino: 
          <input type="time" name="finishtime" id="finishtime" value="{{$certificate->finishtime}}" require></label>
        </th>
      </tr>
    </thead>
    </table>
    <div>
      <label for="formGroupExampleInput" class="form-label">Observaciones:</label>
     
      <input type="text" name="observations" id="observations" value="{{$certificate->observations}}" class="form-control" require>
    
    </div>
    <br>
    <div>
      <label for="origen">Origen:</label>
      <input type="text" id="origen" name="origen" value="{{$certificate->origen}}" require>
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
    @endsection