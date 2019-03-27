
<?php

include '../modelo/conexion.php';

$conn = new conexion();
//tomamos la svariables  las validamos
$email = mysql_real_escape_string($_POST['email']);
$contrasena = $conn->encryption($_POST['contrasena']);

//enviamos los datos a la funcion de login
$conn->login($email, $contrasena);
