<?php
error_reporting(E_ALL ^ E_NOTICE);


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$motivo = $_POST['motivo'];
$mensaje = $_POST['mensaje'];

$destino = "laurivero007@gmail.com";
$asunto = "Mensaje enviado desde www.lalala.com";
$cuerpo = "Nombre: ".$nombre."\r\n"."Apellido: ".$apellido."\r\n"."Email: ".$email."\r\n"."Tel: ".$tel."\r\n"."Motivo: ".$motivo."\r\n"."Mensaje: ".$mensaje;
$remitente = "From: $nombre $apellido <$email>";

mail($destino, $asunto, $cuerpo, $remitente);


$datos_bd = mysqli_connect("localhost", "root", "", "progweb");

mysqli_query($datos_bd, "INSERT INTO datos_usuario VALUES (DEFAULT, '$nombre', '$apellido','$email','$tel','$mensaje','$motivo')");


header("Location: mensaje_enviado.php?nombre=$nombre&motivo=$motivo#contacto");


?>