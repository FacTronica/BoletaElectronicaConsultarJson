<?php
#########################################
# CONFIGURACIÓN
######################################### 
#
# CONTROL DE ERRORES
error_reporting(E_ERROR|E_WARNING);
ini_set('display_errors', '1');
#
# 443 o 80
$puerto=80;
#
# URL DE DESTINO DEL SERVIDOR 
$url="http://200.200.200.200/api/factronica_consultarenviodte/index.php";  


#########################################
# DATOS 
######################################### 
#
$arregloJson = array(
"TOKEN" => "qwerty1", // TOKEN DE ACCESO A LA API
"ACCION" => "CONSULTARTRACKID", // ACCION A REALIZAR (METODO)
"RutCompania"=>"11111111", // RUT EMISOR SIN DIGITO VERIFICADOR
"DvCompania"=>"1", // DIGITO VERIFICADOR DEL EMISOR
"TrackId"=>"332233444", // TRACKID DEL DTE
"RESPUESTASII"=>"RUT781952605_TIPO61_FOLIO758_RESPUESTAENVIODTE.xml", // NOMBRE DEL ARCHIVO CON LA RESPUESTA DEL SII
"BUZONRESPUESTAS"=>"temp", // DIRECTORIO DONDE SE ALMACENARÁN LOS ARCHIVOS CON LAS RESPUESTAS DEL SII

#########################################
# CERTIFICADO DIGITAL
#########################################

# MODULO
"Modulus"=>"1cqhYtIoH1Ecd+kglJtDIguP5vRhC09y0zQMx9dUVprWLPHCA95x+kjmzYL9hxBj
EO+7hfE3rRFbJwlJVhDa22hFbKhW1PFejp+IHAi5s5E=",

# EXPONENTE
"Exponent"=>"AQAB",

# LLAVE PUBLICA
"X509Certificate"=>"MIIGQzCCBSugAwIBAgIKTy8J4QAAABJFBjANBgkqhkiG9w0BAQUFADCB0jELMAkG
4MxpgF7YC0YyPjaaze6jbNfGVbrJS8MD1uzAvIo6E2Vo1J4jdYJeUnOw4fQBFnoD
SQThgpn5uoVgia2NUpqAQRJ4BArT0Bc=",

# LLAVE PRIVADA
"PrivKey"=>"-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQDVyqFi0igfURx36SCUm0MiC4/m9GELT3LTNAzH11RWmtYs8cID
wCg9V1Xba89Lrn4hexUCQDSM76rTE+w4JqDFNKBgEvmUhbR7UwgS5CuzQhm75MGk
4vnsMueBXzOjZjYgRxa8i4ijDOeF9jFmqZpVxD6G3OQ=
-----END RSA PRIVATE KEY-----
"
);
 

 
#########################################
# METODO PARA ENVIAR EL JSON A LA API
#########################################
function JsonEnviar($arregloJson,$url,$puerto){
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
    return $json_response; 
}


#########################################
# ENVIAR JSON Y RECUPERAR RESPUESTA
#########################################
$retorno=JsonEnviar($arregloJson,$url);


#########################################
# DECODIFICAR LA RESPUESTA CREANDO ARRAY
#########################################
$jsonArray  = json_decode($retorno,true);


#########################################
# MOSTRAR LA RESPUESTA
#########################################
echo "<pre>".var_dump($jsonArray)."</pre>";
 
 

?>
