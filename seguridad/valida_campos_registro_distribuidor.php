<?php

include '../modelo/conexion.php';

$conn = new conexion();

//recibimos lo datos del uevo vendedor

$nombre = $_POST["nombre_prop"];
$apellido = $_POST["apellido_prop"];
$cedula = $_POST["cedula_prop"];
$email = $_POST["email_prop"];
$contrasena = $_POST["contrasena_prop"];
$repcontrasena = $_POST["repcontrasena_prop"];
$telefono = $_POST["telefono_prop"];
$celular = $_POST["celular_prop"];
$codigo_distribuidor = $_POST["codigo_distribuidor"];

if (isset($_POST["monto_solicitado_prop"])) {
    $monto_solicitado = $_POST["monto_solicitado_prop"];
}

echo $nombre . "<br>";
echo $apellido . "<br>";
echo $cedula . "<br>";
echo $email . "<br>";
echo $contrasena . "<br>";
echo $repcontrasena . "<br>";
echo $telefono . "<br>";
echo $celular . "<br>";
echo $codigo_distribuidor . "<br>";

//VALIDAMOS QUE LAS CONTRASEÑAS COINCIDAN Y SEAN IGUALES
if ($contrasena != $repcontrasena) {
    echo "Las contraseñas no coinciden , por favor intentalo de nuevo.";
    return;
}
//VALIDAMOS EL CODIGO DE ACCESO
$codigo_encriptado = $conn->encryption($codigo_distribuidor);
$codigo_existe = $conn->ejecutar_consulta_simple("SELECT id,id_empresa FROM usuarios WHERE codigo='" . $codigo_encriptado . "' AND estado='A'");

if (mysqli_num_rows($codigo_existe) == 0) {
    echo "El código de acceso no existe o ha sido ingresado incorrectamente";
    return;
}

//ENCRIPTAMOS LA CONTRASEÑA
$contrasena_encriptada = $conn->encryption($contrasena);
//GENERAMOS EL CODIGO ALEATORIO DEL USUARIO
$codigo = $conn->encryption($conn->generarCodigo());
echo $codigo . " codigo generado";
//TOMAMOS EL ID DE LA EMPRESA A LA QUE PERTENECE EL USUARIO DEL CODIGO QUE LLEGA
$codigo_existe = $codigo_existe->fetch_assoc();
$id_empresa = $codigo_existe["id_empresa"];
//TOMAMOS LA TARIFA ESTANDAR PARA DISTRIBUIDORES QUE TIENE LA EMPRESA
$codigo_tarifa_estandar_distri = $conn->encryption("STDDI");

$id_tarifa_estandar_distri = $conn->ejecutar_consulta_simple("SELECT id FROM perfil_tarifa_empresa WHERE id_empresa='" . $id_empresa . "' "
        . "AND codigo='$codigo_tarifa_estandar_distri' AND estado='A'");
$id_tarifa_estandar_distri = $id_tarifa_estandar_distri->fetch_assoc();
$id_tarifa_estandar_distri = $id_tarifa_estandar_distri["id"];

echo "<br>" . $id_tarifa_estandar_distri . " id_tarifa";
//TOMAMOS LA FECHA ACTUAL
setlocale(LC_TIME, 'es_ES.utf8', 'esp');
date_default_timezone_set('America/Bogota');
$fecha_registro = strftime("%Y-%m-%d");


//CREAMOS AL USUARIO Y LO DEJAMOS CON EL ESTADO PENDIENTE
$conn->creaUsuario($cedula, $nombre, $apellido, $email, $contrasena_encriptada, 
        $telefono, $celular, $codigo, $id_empresa, $id_tarifa_estandar_distri, $fecha_registro);

//SI ENVIO LA SOLICITUD CON CREDITO
//TOMAMOS EL ID DEL ULTIMO USUARIO REGISTRADO
$ultimo_id_distribuidor = $conn->obtieneUltimoIdDistribuidorRegistrado();
$ultimo_id_distribuidor = $ultimo_id_distribuidor->fetch_assoc();
$ultimo_id_distribuidor = $ultimo_id_distribuidor["id"];

//TOMAMOS EL ID DEL USUARIO RESPONSABLE
$id_usuario_responsable = $codigo_existe["id"];

//ASIGNAMOS EL USUARIO AL DISTRIBUIDOR DEL CODIGO EN LA TABLA
$conn->asignaDistribuidorUsuario($id_usuario_responsable, $ultimo_id_distribuidor);


//si existe credito en la solicitud
//CREAMOS EL REGISTRO EN LA TABLA CREDITO USUARIO
if ($monto_solicitado != "") {
$conn->creaCreditoUsuario($ultimo_id_distribuidor,$monto_solicitado);
}

//se pone alerta de que la solicitud esta pendiente de aprobacion
