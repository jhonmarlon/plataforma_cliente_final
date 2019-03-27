<?php
include '../modelo/conexion.php';
include '../funciones/funciones.php';


$conn = new conexion();


$nombre = mysql_real_escape_string($_POST['nombre']);
$apellido = mysql_real_escape_string($_POST['apellido']);
$usuario = mysql_real_escape_string($_POST['usuario']);
$cedula = mysql_real_escape_string($_POST["cedula"]);
$email = mysql_real_escape_string($_POST['email']);
$contrasena = $conn->encryption($_POST['contrasena']);
$repcontrasena = $conn->encryption($_POST['repcontrasena']);
$telefono = mysql_real_escape_string($_POST['telefono']);
$celular = mysql_real_escape_string($_POST['celular']);
$estado = 0;

setlocale(LC_TIME, 'es_ES.utf8', 'esp');
date_default_timezone_set('America/Bogota');
$fecha_registro = strftime("%Y-%m-%d");

if (isset($_POST["direccion"])) {
    $direccion = mysql_real_escape_string($_POST['direccion']);
}
$codigo = $conn->encryption($_POST['codigo']);
//separamos el codigo como array
//$cod = explode("-", $codigo);
//$codigoEncrip = $conn->encryption($codigo);

$errors = array();
$activo = 0;


//realizamos las validaciones de los datos 
$compruebaUsuario = $conn->validaUsuario($usuario);
$compruebaUser = mysqli_num_rows($compruebaUsuario);

$comprobaremail = $conn->validaEmail($email);
$comprobarCorreo = mysqli_num_rows($comprobaremail);


//validamos el codigo ingresado 
//$comprobar_codigo = $conn->validaCodigoAcceso($cod[0], $cod[1], $cod[2]);
$comprobar_codigo = $conn->validaCodigoAcceso($codigo);
//$num=mysqli_num_rows($comprobar_codigo);
//echo ($num);


if ($compruebaUser >= 1) {
    ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        El usuario ya se encuentra en uso, por favor escoja otro
    </div>

<?php } else if ($comprobarCorreo >= 1) {
    ?>

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        El email está en uso, por favor escoja otro
    </div>

    <?php
} else if ($contrasena != $repcontrasena) {
    ?>

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Las contraseñas no coinciden
    </div>

    <?php
} else if (mysqli_num_rows($comprobar_codigo) == 0) {
    ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Código de acceso incorrecto.
    </div> 
    <?php
} else {

    //generamos el toquen para el usuario que se registrara
    //$token = generateToken();
    //
    //antes de registrar al usuario verificamos que el numero de clientes por dia no haya sido superado
    $num_clientes_dia = $conn->obtieneNumClientesPorDia();
    $num_clientes_dia = $num_clientes_dia->fetch_array();

    //tomamos el numero de clientes registrados en el dia actual
    $num_clientes_dia_actual = $conn->obtieneCantClientesRegistradosAct($fecha_registro);
    $num_clientes_dia_actual = $num_clientes_dia_actual->fetch_array();

    if ($num_clientes_dia_actual[0] + 1 > $num_clientes_dia[0]) {
        $estado = "P";
    } else {
        $estado = "A";
    }
    //tomamos el valor de la tarifa
    //$code=$conn->limpiar_cadena($cod[2]);

    $codigo_estandar_clientes = $conn->encryption("STDCL");

    //tomamos el id_del suuario al que pertenece el codigo ingresado por el usuario
    $id_usuario = $conn->ejecutar_consulta_simple("SELECT id FROM usuarios WHERE CODIGO='$codigo'");
    $id_usuario = $id_usuario->fetch_assoc();
    $id_usuario = $id_usuario["id"];



    //tomamos la tarifa estandar para clientes finales del nucleo principal
    $tarifa_estandar = $conn->ejecutar_consulta_simple("SELECT id FROM perfil_tarifa_empresa WHERE "
            . "codigo='$codigo_estandar_clientes' AND id_usuario_crea='$id_usuario' AND estado='A'");
    $tarifa_estandar = $tarifa_estandar->fetch_assoc();
    $tarifa_estandar = $tarifa_estandar["id"];

    //$tarifa_encriptada = $conn->encryption($cod[2]);
    //tomamos el valor del codigo de tarifa    
    //$valor_cuenta_estandar = $conn->validaTarifaEstandar($tarifa_encriptada);
    //$valor_cuenta_estandar = $valor_cuenta_estandar->fetch_assoc();
    //$valor_cuenta_personal = $conn->validaTarifaPersonalizada($tarifa_encriptada);
    //$valor_cuenta_personal = $valor_cuenta_personal->fetch_assoc();
    //validamos cual de los tipos de tarifa tiene el valor correspondiente al codigo de tarifa 
    /* if ($valor_cuenta_estandar["valor"] != "") {
      $valor_tarifa = $valor_cuenta_estandar["valor"];
      } else {
      $valor_tarifa = $valor_cuenta_personal["valor"];
      } */

    //$valor_cuenta_estandar = $valor_cuenta_estandar->fetch_assoc();
    //$valor_cuenta_personal = $conn->validaTarifaPersonalizada($cod[2]);
    //$valor_personal = $valor_cuenta_personal->fetch_assoc();
    //Llamamos a la funcion que registra al cliente
    //$conn->registraUsuario($nombre, $apellido, $usuario, $cedula, $telefono, $celular, $direccion, $contrasena, $email, $activo, $token, $codigoEncrip, $fecha_registro, $estado);




    $conn->creaUsuarioCliente($cedula, $nombre, $apellido, $usuario, $email, $contrasena, $direccion, $telefono, $celular, $tarifa_estandar, $fecha_registro, $estado);

    //tomamos el ultimo id del cliente ingresado
    //$ultimo_id = $conn->obtieneUltimoIdUsuarioRegistrado();
    $ultimo_cliente = $conn->obtieneUltimoIdClienteRegistrado();
    $ultimo_cliente = $ultimo_cliente->fetch_array();
    $ultimo_cliente = $ultimo_cliente[0];
    
  
    //validamos el codigo de usuario para ver a quien pertenece
    //$codigo_usuario_ecriptado = $conn->encryption($cod[1]);
    //$datos_super_usuario = $conn->validaCodigotblSuperUsuario($codigo_usuario_ecriptado);
    //$datos_super_usuario = $datos_super_usuario->fetch_assoc();
    //$datos_usuario = $conn->validaCodigotblUsuario($codigo_usuario_ecriptado);
    //$datos_usuario = $datos_usuario->fetch_assoc();
    //validamos codigo de empresa
    //$codigo_empresa_encriptado = $conn->encryption($cod[0]);
    //$id_empresa = $conn->validaCodigoEmpresa($codigo_empresa_encriptado);
    //$id_empresa = $id_empresa->fetch_array();

    /* if ($datos_super_usuario["id"] != "") {
      $tipo_usuario = "super_usuario";
      $id_usuario = $datos_super_usuario["id"];
      } else {
      $tipo_usuario = "usuario";
      $id_usuario = $datos_usuario["id_usuario"];
      } */

    //creamos el registro
    //$conn->asignaClienteUsuario($id_usuario, $tipo_usuario, $ult_id[0], $id_empresa[0]);

    $conn->asignaClienteUsuario($id_usuario, $ultimo_cliente);



    if ($ultimo_cliente > 0) {
        ?>
        <script>
            function FormSubmit() {

                var registro = "<?php echo $ult_id[0]; ?>";
                var token = "<?php echo $token ?>";
                var email = "<?php echo $email ?>";
                var usuario = "<?php echo $nombre . " " . $apellido ?>";

                var parametros = {
                    "email": email,
                    "usuario": usuario,
                    "registro": registro,
                    "token": token,
                };

                //Enviamos los datos por medio de AJAX
                $.ajax({
                    data: parametros,
                    url: "seguridad/confirma_registro.php",
                    type: 'POST',
                    success: function (data) {
                        $("#response").html(data);
                    }
                });
            }
            FormSubmit();
            //Limpiamos campos
            $("#nombre").val("");
            $("#apellido").val("");
            $("#cedula").val("");
            $("#email").val("");
            $("#contrasena").val("");
            $("#repcontrasena").val("");
            $("#telefono").val("");
            $("#celular").val("");
            $("#direccion").val("");
            $("#codigo").val("");
            //desabilitamos boon de registro
            $("#registro").attr('disabled', 'disabled');
            $("#terminos_condiciones").attr('disabled', 'disabled');

        </script>

        <!--<div id="div_reg_exitoso" class="alert alert-success alert-dismissible" style="text-align: center;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Se ha enviado un correo electrónico a la cuenta diligenciada</b> , ingrese allí
        y siga las instrucciones para continuar con el registro.

        </div>-->
        <div id="div_reg_exitoso" class="alert alert-success alert-dismissible" style="text-align: center;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Se ha registrado exitosamente en nuestro sistema, Bienveni@ !</b> 
        </div>

        <?php
    } else {
        ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Error al registrar al usuario                                    </div>
        <?php
        return;
    }
}





