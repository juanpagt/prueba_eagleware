<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
</head>
<body>
  <h1>Datos de la API REST Local</h1>
  <ul id="data-list"></ul>
  <script src="script.js"></script>
  <table class="table ">
      <thead class="thead-dark ">
        <tr>
          
       
          <th>Numero Extension</th>
          <th>Nombre Usuario </th>
          <th>Id</th>
          <th>Fecha y Hora de Llamada</th>
          <th>Numero Marcado</th>
          <th>Duracion Llamada</th>
          <th>Costo Llamada</th>
          <th>Tipo Servicio</th>
          <th>Descripcion Servicio</th>
        </tr>
</thead>
        <?php
          $url_rest ="http://localhost:3000/api/registros";
          $curl= curl_init($url_rest);
          curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
          $respuesta = curl_exec($curl);


          if($respuesta===false){
            curl_close($curl);
            die("Error.....");
          }
          
           curl_close($curl);
          // echo $respuesta;
          $resp = json_decode($respuesta);
          $tam = count($resp);
          for($i=0; $i<$tam; $i++){
            $j= $resp[$i];
            
            $NumExt = $j -> NumeroExtension;
            $NomUsuario = $j -> NombreUsuario;
            $Id = $j -> Id;
            $FechaHora = $j -> FechaHoraLlamada;
            $NumMarc =$j -> NumeroMarcado;
            $DuracionLlamada =$j -> DuracionLlamada;
            $Costo =$j -> CostoLlamada;
            $TipoServ =$j -> TipoServicio;
            $DescripcionServ =$j -> DescripcionServicio;
            
            
            echo "<tr>
            
         
            <td> $NumExt</td>
            <td>$NomUsuario </td>
            <td> $Id</td>
            <td>$FechaHora</td>
            <td> $NumMarc</td>
            <td>  $DuracionLlamada</td>
            <td>  $Costo</td>
            <td> $TipoServ</td>
            <td>$DescripcionServ</td>
            
          </tr>";
          }
          
        ?>
        
      </table>

</body>
</html>
