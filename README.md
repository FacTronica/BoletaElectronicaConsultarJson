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
<pre>
<code>
<?php
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
</code>
</pre>
<br>
<hr>
<h3>Proceso 2: Enviar el objeto json a la Api de Boletas</h3>
<br>Este proceso Consiste en enviar el objeto json a la api del servidor de boletas, de acuerdo al siguiente ejemplo.
<br>
<code>
<?php
#
sss
sss
?>
</code>
</pre>
<br>
