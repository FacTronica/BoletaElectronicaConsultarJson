# BoletaElectronicaConsultarJson
Método para consultar el trackid de un envío de boleta electrónica

<h3>Procesos a Realizar:</h3>
<br>1.-Crear un objeto Json.
<br>2.-Enviar el objeto json a la Api de Boletas.
<br>3.-Recuperar el resultado del Envío.
<br>4.-Actualizar el resultado en sistema propio.
<hr>
<h3>Proceso 1: Crear un objeto Json</h3>
<br>Este proceso Consiste en generar un array de datos como objeto json, de acuerdo al siguiente ejemplo
<br>
```php
$arregloJson = array(
"TOKEN" => "tokendeaccesoapi",
"ACCION" => "CONSULTARTRACKID",
"RutCompania"=>"11111111",
"DvCompania"=>"1",
"TrackId"=>"332233444",
"RESPUESTASII"=>"FOLIO758_TIPO39_RUT111111111_RESPUESTAENVIODTE.xml",
"BUZONRESPUESTAS"=>"temp",
"Modulus"=>"nnn",
"Exponent"=>"nnn",
"X509Certificate"=>"nnn",
"PrivKey"=>"nnn"
);
?>
```
<br>
<hr>
<h3>Proceso 2: Enviar el objeto json a la Api de Boletas</h3>
<br>Este proceso Consiste en enviar el objeto json a la api del servidor de boletas, de acuerdo al siguiente ejemplo.
<br> 
```php
<?php
#
function JsonEnviar($arregloJson,$url,$puerto){
    #
    $payload = json_encode($arregloJson);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_PORT,$puerto);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,$payload);
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    #
    return $json_response; 
}
#
# url de destino para enviar el json
$url="https://www.factronica.cl/api/factronica_consultarenviodte/index.php";
#
# puerto 443=https 80=http
$puerto=443;
#
# llamar a la función para enviar el json
$retorno=JsonEnviar($arregloJson,$url,$puerto);
?>

