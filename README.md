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
</code>
</pre>
<br>
<hr>
<h3>Proceso 2: Enviar el objeto json a la Api de Boletas</h3>
<br>Este proceso Consiste en enviar el objeto json a la api del servidor de boletas.
<br>
<hr>
<h3>Proceso 3: Recuperar el resultado del Envío</h3>
<br>Este proceso se debe recuperar la respuesta de la api.
<br>Para poder determinar el estado del trackid.
<hr>
<h3>Proceso 4: Actualizar el resultado en sistema propio</h3>
<br>De acuerdo a la respuesta recibida, se debe aplicar la actualización correspondiente.
<br>El TrackId puede tener 3 estado; Aceptado, Rechazado o Aceptado con Reparos.
<br>
<b>EJEMPLO:</b>
https://github.com/FacTronica/BoletaElectronicaConsultarJson/blob/main/envia_json_consultartrackid.php
