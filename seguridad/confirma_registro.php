<?php

require("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("../vendor/phpmailer/phpmailer/src/SMTP.php");
require '../vendor/Constantes.php';
require './configGeneral.php';
//tomamos los valores del usuario
$email = $_POST["email"];
$usuario = $_POST["usuario"];
$registro = $_POST["registro"];
$token = $_POST["token"];

//generamos la url
//$url = SERVERURL.'registro.php?id='.$registro.'&val='.$token;

$url=SERVERURL.'index.php';

//$asunto = "Confirmación de Registro - Cel Comunicaciones";
$asunto="Cel Comunicaciones te da la bienvenida";
$asunto = utf8_decode($asunto);

/*$cuerpo = "<b>Estimado $usuario:</b> <br /><br />Para continuar con el proceso de registro en nuestra plataforma,"
        . "es indispensable de click en el siguiente enlace "
        . "<a href='$url'>Activar Cuenta</a>";*/

$cuerpo="<b>Bienvenid@ </b><p>Estimad@ $usuario bienvenid@ a nuestro portal web,<br> "
        . "Ahora eres parte de nuestra comunidad , <a href='$url'>Ingresa aquí!</a></p>";
//Convertimos asunto en UT( para que reconozca caracteres especiales
$Subject = "=?ISO-8859-1?B?" . base64_encode($asunto) . "=?=";

//instancio un objeto de la clase PHPMailer
$mail = new \PHPMailer\PHPMailer\PHPMailer(); // defaults to using php "mail()"
//CONFIGURACION PHPMAILER
$mail->isSMTP();
$mail->isHTML(true);
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "montoyamarlon14@gmail.com";
$mail->Password = EMAIL_PASSWORD;

$mail->SMTPSecure = 'tls';
$mail->Port = 587;

//CONFIGURACIÓN DEL CORREO A ENVIAR
$mail->setFrom("montoyamarlon14@gmail.com"); // REMITENTE
$mail->addAddress($email); // DESTINATARIO 
$mail->Subject = $asunto;
$mail->Body = $cuerpo;

//ENVIO DEL EMAIL
if (!$mail->send()) {
    echo "error al enviar el correo";
} else {
    echo "correo enviado correctamente";
}
