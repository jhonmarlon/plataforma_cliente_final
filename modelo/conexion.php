<?php

class conexion {

    public $conexion;
    private $server = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $db = "cel_comunicaciones_db";
    public $pdo_conn;

    public function __construct() {
        $this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->db);
//PRUEBA PULL
        if ($this->conexion->connect_errno) {

            die("Fallo al tratar de conectar con MySQL: (" . $this->conexion->connect_errno . ")");
        }
        $this->conexion->query("SET NAMES 'utf8'");
        $this->pdo_conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->usuario, $this->pass);
    }

    public function cerrar() {
        $this->conexion->close();
    }

    public function login($email, $passLogin) {

        $query = "SELECT * FROM clientes WHERE correo='$email'"
                . "AND clave='$passLogin' LIMIT 1";


        $res = $this->conexion->query($query);
        $num = mysqli_num_rows($res);

        //si encuentra registros
        //
        
        if ($num != 0) {

            $campos = mysqli_fetch_assoc($res);

            $id_usuario = $campos["id"];
            $cedula = $campos["cedula"];
            $usuario = $campos["nombre"] . " " . $campos["apellido"];
            $nick_name = $campos["usuario"];
            $email = $campos["correo"];
            $password = $campos["clave"];
            $direccion = $campos["direccion"];
            $telefono = $campos["telefono"];
            $celular = $campos["celular"];
            $id_tarifa = $campos["id_tarifa"];
            $fecha_registro = $campos["fecha_registro"];
            $estado = $campos["estado"];

            setlocale(LC_TIME, 'es_ES.utf8', 'esp');
            date_default_timezone_set('America/Bogota');
            $fecha_actual = strftime("%Y-%m-%d");
            if ($estado == 'P') {
                echo "<label style='text-align: center;color: red;'><b>Para poder iniciar sesión con su cuenta , es necesaria la aprobación del distribuidor "
                . "asociado al código con el que se ha registrado. </b></label>";
                return;
            } elseif ($estado == "N") {
                echo "<label style='text-align: center;color: red;'><b>Su soliitud fué negada por el administrador,<br> "
                . "para mayor información , pongase en contacto con el mismo. </b></label>";
            } else {
                session_start();
                $_SESSION["authenticated"] = 1;
                $_SESSION["id_usuario_reg"] = $id_usuario;
                $_SESSION["cedula_usuario_reg"] = $cedula;
                $_SESSION["nombre_usuario_reg"] = $usuario;
                $_SESSION["nickname_usuario_reg"] = $nick_name;
                $_SESSION["email_usuario_reg"] = $email;
                $_SESSION["direccion_usuario_reg"] = $direccion;
                $_SESSION["telefono_usuario_reg"] = $telefono;
                $_SESSION["celular_usuario_registrado"] = $celular;
                $_SESSION["id_tarifa_usuario_reg"] = $id_tarifa;
                $_SESSION["fecha_registro"] = $fecha_registro;



                echo "<script>location.href ='pages/index.php'</script>";
            }




            //validamos si el usuario es activo
            /*  if ($this->isActivo($id_usuario_reg)) {
              //validamos el password
              //si el password concuerda

              if (password_verify($pass_usuario, $password)) {
              session_start();
              $_SESSION["authenticated"] = 1;
              $_SESSION["id_usuario_reg"] = $id_usuario_reg;
              $_SESSION["usuario"] = $usuario;
              $_SESSION["email"] = $email;

              echo "<script>location.href ='../login.php'</script>";
              } else {
              echo "Usuario o Contraseña Incorrect@";
              }
              } else {
              echo "La cuenta a la que trata de acceder no esta activada, por favor, "
              . "actívala antes de iniciar sesión.";
              } */
        } else {

            echo "El usuario con el que trata de iniciar sesión no existe o ha ingresado erroneamente las credenciales!";
        }
    }

    public function registraUsuario($nombre, $apellido, $usuario, $cedula, $telefono, $celular, $direccion, $hash_pass, $email, $activo, $token, $codigoEncrip, $fecha_registro, $estado) {
        $query = ("INSERT INTO usuarios_registrados(nombre,apellido,usuario,cedula,telefono,celular,direccion,clave,email,activacion,token,codigo_acceso,fecha_registro,estado)"
                . "values('$nombre','$apellido','$usuario','$cedula','$telefono','$celular','$direccion','$hash_pass','$email','$activo','$token','$codigoEncrip','$fecha_registro','$estado')");
        $this->conexion->query($query);
    }

    public function creaRegistroError($id_usuario_reg, $fecha_reporte, $detalle, $radicado) {
        $query = ("INSERT INTO reporte_error_cuenta_netflix (radicado,id_usuario_registrado,fecha_reporte,"
                . "detalle,estado) VALUES ('$radicado','$id_usuario_reg','$fecha_reporte','$detalle','P')");
        $this->conexion->query($query);
    }

    public function registraImagenesError($ruta_imagen, $id_reporte_error) {
        $query = "INSERT INTO imagenes_error (ruta_imagen,id_reporte_error_cuenta_netflix) VALUES "
                . "('$ruta_imagen','$id_reporte_error')";
        $this->conexion->query($query);
    }

    public function creaRegistroErrorCuenta($id_cuenta_netflix_mod, $usuario_netflix, $clave, $id_reporte_error) {
        $query = "INSERT INTO cuenta_netflix_reportada (id_cuenta_netflix_act,usuario_cuenta_netflix,"
                . "clave_cuenta_netflix,id_reporte_error_cuenta_netflix) VALUES ('$id_cuenta_netflix_mod',"
                . "'$usuario_netflix','$clave','$id_reporte_error')";
        $this->conexion->query($query);
    }

    public function validaExisteCuentaByEmail($usuario) {
        $query = ("SELECT * FROM cuenta_netflix_act WHERE usuario='$usuario' AND (estado=1 OR estado=2)");
        $res = $this->conexion->query($query);

        return $res;
    }

    /* public function validaCodigoAcceso($codigo_empresa, $codigo_usuario, $codigo_tarifa) {

      //limpiamos los string
      $codigo_empresa = $this->limpiar_cadena($codigo_empresa);
      $codigo_usuario = $this->limpiar_cadena($codigo_usuario);
      $codigo_tarifa = $this->limpiar_cadena($codigo_tarifa);

      //encriptamos los datos para verificar en la bd
      $codigo_empresa = $this->encryption($codigo_empresa);
      $codigo_usuario = $this->encryption($codigo_usuario);
      $codigo_tarifa = $this->encryption($codigo_tarifa);

      //validamos el codigo de la empresa
      $empresa = $this->validaCodigoEmpresa($codigo_empresa);

      //validamos codigo de usuario
      $usuario = $this->validaCodigotblUsuario($codigo_usuario);
      $super_usuario = $this->validaCodigotblSuperUsuario($codigo_usuario);


      //validamos codigo de tarifa
      $tarifa_estandar = $this->validaTarifaEstandar($codigo_tarifa);
      $tarifa_personalizada = $this->validaTarifaPersonalizada($codigo_tarifa);



      if (mysqli_num_rows($empresa) == 0) {
      return false;
      } elseif (mysqli_num_rows($usuario) == 0 && mysqli_num_rows($super_usuario) == 0) {
      return false;
      } elseif (mysqli_num_rows($tarifa_estandar) == 0 && mysqli_num_rows($tarifa_personalizada) == 0) {
      return false;
      } else {
      return true;
      }
      } */

    public function ejecutar_consulta_simple($consulta) {
        $res = $this->conexion->query($consulta);
        return $res;
    }

    public function validaCodigoAcceso($codigo) {

        $query = "SELECT id FROM usuarios WHERE codigo='$codigo'";
        $res = $this->conexion->query($query);
        return $res;
    }

    public function creaUsuarioCliente($cedula_cliente, $nombre_cliente, $apellido_cliente, $usuario, $correo_cliente, $clave, $direccion_cliente, $telefono_cliente, $celular_cliente, $id_tarifa, $fecha_registro, $estado) {
        $query = "INSERT INTO clienteS (cedula,nombre,apellido,usuario,correo,clave,direccion,"
                . "telefono,celular,id_tarifa,fecha_registro,estado) "
                . "values ('$cedula_cliente','$nombre_cliente','$apellido_cliente','$usuario',"
                . "'$correo_cliente','$clave','$direccion_cliente',"
                . "'$telefono_cliente','$celular_cliente','$id_tarifa','$fecha_registro','$estado')";
        $this->conexion->query($query);
    }

    public function asignaClienteUsuario($id_usuario, $ultimo_cliente) {
        $query = "INSERT INTO usuario_clientes (id_usuario,id_cliente) "
                . "VALUES ('$id_usuario','$ultimo_cliente')";
        $this->conexion->query($query);
    }

    public function asignaDistribuidorUsuario($id_usuario_responsable, $ultimo_id_distribuidor) {
        $query = "INSERT INTO usuario_distribuidores (id_usuario,id_distribuidor) "
                . "VALUES ('$id_usuario_responsable','$ultimo_id_distribuidor')";
        $this->conexion->query($query);
    }

    //funcion para limpiar cadenas de texto
    public function limpiar_cadena($cadena) {
        //quitamos espacios en blanco
        $cadena = trim($cadena);
        //quitamos barras invertidas de la cadena
        $cadena = stripslashes($cadena);
        //Reemplazamos caracteres que no queramos en los input
        $cadena = str_ireplace("<script>", "", $cadena);
        $cadena = str_ireplace("</script>", "", $cadena);
        $cadena = str_ireplace("<script src", "", $cadena);
        $cadena = str_ireplace("</script type=", "", $cadena);
        $cadena = str_ireplace("SELECT * FROM", "", $cadena);
        $cadena = str_ireplace("DELETE FROM", "", $cadena);
        $cadena = str_ireplace("INSERT INTO", "", $cadena);
        $cadena = str_ireplace("--", "", $cadena);
        $cadena = str_ireplace("^", "", $cadena);
        $cadena = str_ireplace("[", "", $cadena);
        $cadena = str_ireplace("]", "", $cadena);
        $cadena = str_ireplace("==", "", $cadena);
        $cadena = str_ireplace(";", "", $cadena);

        return $cadena;
    }

    public function validaCodigoEmpresa($codigo_empresa) {
        $query = "SELECT id_empresa FROM empresa WHERE codigo='$codigo_empresa'";
        $res = $this->conexion->query($query);
        return $res;
    }

    public function generarCodigo() {
        $alpha = "123qwertyuiopa456sdfghjklzxcvbnm789";
        $code = "";
        $longitud = 5;
        for ($i = 0; $i < $longitud; $i++) {
            $code .= $alpha[rand(0, strlen($alpha) - 1)];
        }
        $code = strtoupper($code);
        return $code;
    }

    public function creaUsuario($cedula, $nombre, $apellido, $email, $contrasena, $telefono, $celular, $codigo, $id_empresa, $id_tarifa_estandar_distri, $fecha_registro) {
        $query = "INSERT INTO usuarios (id_rol,cedula,nombre,apellido,correo,clave,telefono,celular,codigo,"
                . "id_empresa,id_tarifa,fecha_registro,estado) VALUES ('3','$cedula','$nombre','$apellido','$email',"
                . "'$contrasena','$telefono','$celular','$codigo','$id_empresa','$id_tarifa_estandar_distri','$fecha_registro','P')";
        $this->conexion->query($query);
    }

    /* public function validaCodigotblSuperUsuario($codigo) {
      $query = "SELECT id,id_empresa FROM super_usuarios WHERE codigo='$codigo'";
      $res = $this->conexion->query($query);
      return $res;
      }

      public function validaCodigotblUsuario($codigo) {
      $query = "SELECT id_usuario,id_empresa FROM usuario WHERE codigo='$codigo'";
      $res = $this->conexion->query($query);
      return $res;
      }

      public function validaTarifaEstandar($codigo_tarifa) {
      $query = "SELECT id_tarifa_estandar,valor FROM tarifa_estandar WHERE codigo='$codigo_tarifa'";
      $res = $this->conexion->query($query);
      return $res;
      }

      public function validaTarifaPersonalizada($codigo_tarifa) {
      $query = "SELECT id_tarifa_usuario,valor FROM tarifa_usuario WHERE codigo='$codigo_tarifa'";
      $res = $this->conexion->query($query);
      return $res;
      } */

    //funcion para encriptar
    public function encryption($string) {
        $output = FALSE;
        $key = hash('sha256', '$CELLCOM@2019');
        $iv = substr(hash('sha256', "101712"), 0, 16);
        $output = openssl_encrypt($string, "AES-256-CBC", $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    //funcion para desencriptar
    public function decryption($string) {
        $key = hash('sha256', '$CELLCOM@2019');
        $iv = substr(hash('sha256', "101712"), 0, 16);
        $output = openssl_decrypt(base64_decode($string), "AES-256-CBC", $key, 0, $iv);
        return $output;
    }

    public function obtieneUltimoRegistroError() {
        $query = "SELECT id_reporte_error_cuenta_netflix,radicado FROM reporte_error_cuenta_netflix "
                . "ORDER BY id_reporte_error_cuenta_netflix DESC";
        $res = $this->conexion->query($query);

        return $res;
    }

    public function obtieneNumClientesPorDia() {
        $query = "SELECT cantidad_clientes FROM cantidad_cliente_dia";
        $res = $this->conexion->query($query);
        return $res;
    }

    /* public function obtieneCantClientesRegistradosAct($fecha_actual) {
      $query = "SELECT count(id_usuarios_registrados) FROM usuarios_registrados WHERE fecha_registro='$fecha_actual'";
      $res = $this->conexion->query($query);
      return $res;
      } */

    public function obtieneCantClientesRegistradosAct($fecha_actual) {
        $query = "SELECT count(id) FROM clientes WHERE fecha_registro='$fecha_actual'";
        $res = $this->conexion->query($query);
        return $res;
    }

    public function cuentaNetflixPendienteSoporte($id_cuenta_netflix) {
        $query = "SELECT COUNT(cnr.id_cuenta_netflix_reportada) as pendiente FROM "
                . "cuenta_netflix_reportada cnr INNER JOIN reporte_error_cuenta_netflix "
                . "recn on cnr.id_reporte_error_cuenta_netflix=recn.id_reporte_error_cuenta_netflix "
                . "WHERE cnr.id_cuenta_netflix_act='$id_cuenta_netflix' AND recn.estado='P'";
        $res = $this->conexion->query($query);

        $resultado = mysqli_fetch_assoc($res);

        if ($resultado["pendiente"] != 0) {
            return true;
        } else {
            return false;
        }
    }

    /* public function obtieneUltimoIdUsuarioRegistrado() {
      $query = "SELECT id_usuarios_registrados FROM usuarios_registrados AS id ORDER BY id_usuarios_registrados
      DESC LIMIT 1 ";
      $id_usuario_reg = $this->conexion->query($query);

      return $id_usuario_reg;
      } */

    public function obtieneUltimoIdDistribuidorRegistrado() {
        $query = "SELECT id FROM usuarios ORDER BY id
         DESC LIMIT 1 ";
        $id_distribuidor_reg = $this->conexion->query($query);

        return $id_distribuidor_reg;
    }

    public function creaCreditoUsuario($ultimo_id_distribuidor, $monto_solicitado) {
        $query = "INSERT INTO credito_usuario (id_usuario,valor_credito,monto_usado,monto_restante,"
                . "dias_lapso_venta,dias_lapso_pago,estado) VALUES ('$ultimo_id_distribuidor',"
                . "'$monto_solicitado','0','$monto_solicitado','0','0','P')";
        $this->conexion->query($query);
    }

    public function obtieneUltimoIdClienteRegistrado() {
        $query = "SELECT id FROM clientes ORDER BY id
         DESC LIMIT 1 ";
        $id_cliente_reg = $this->conexion->query($query);

        return $id_cliente_reg;
    }

    public function validaUsuario($usuario) {
        //$query = "SELECT usuario FROM usuarios_registrados WHERE usuario = '$usuario'";
        $query = "SELECT usuario FROM clientes WHERE usuario = '$usuario'";
        $res = $this->conexion->query($query);
        return $res;
    }

    public function validaEmail($email) {
        //$query = "SELECT email FROM usuarios_registrados WHERE email = '$email'";
        $query = "SELECT correo FROM clientes WHERE correo = '$email'";
        $res = $this->conexion->query($query);
        return $res;
    }

    function validaActivacionCuenta($id_usuario, $token) {
        $select_activacion = "SELECT activacion FROM usuarios_registrados "
                . "WHERE id_usuarios_registrados='$id_usuario' AND "
                . "token='$token' LIMIT 1";
        $res = $this->conexion->query($select_activacion);
        return $res;
    }

    function activaCuenta($id_usuario, $token) {
        $update = "UPDATE usuarios_registrados SET activacion=1  "
                . "WHERE id_usuarios_registrados='$id_usuario' AND token='$token'";
        $this->conexion->query($update);
    }

    function isActivo($id_usuario_reg) {
        //validamos si el usuario ya esta previamente activado
        $activado = "SELECT activacion FROM usuarios_registrados WHERE "
                . "id_usuarios_registrados='$id_usuario_reg'";

        $act = $this->conexion->query($activado);
        $active = mysqli_fetch_assoc($act);

        if ($active["activacion"] != 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
     //funcion para mostrar alertas
    public function sweet_alert($datos) {
        if ($datos['Alerta'] == "simple") {
            $alerta = "
                 <script>
                    swal(
                    '" . $datos['Titulo'] . "',
                    '" . $datos['Texto'] . "',
                    '" . $datos['Tipo'] . "'
                     );
                 </script>
               ";
        } elseif ($datos['Alerta'] == "recargar") {
            $alerta = "
                 <script>
                  swal({
                        title: '" . $datos['Titulo'] . "',
                        text: '" . $datos['Texto'] . "',
                        type: '" . $datos['Tipo'] . "',
                        confirmButtonText: 'Aceptar'
                      }).then((result) => {
                         location.reload();
                      });
                 </script>
               ";
        } elseif ($datos['Alerta'] == "limpiar") {
            $alerta = "
                 <script>
                  swal({
                        title: '" . $datos['Titulo'] . "',
                        text: '" . $datos['Texto'] . "',
                        type: '" . $datos['Tipo'] . "',
                        confirmButtonText: 'Aceptar'
                      }).then((result) => {
                          $('.FormularioAjax')[0].reset();
                       });
                 </script>
               ";
        } elseif ($datos['Alerta'] == "input") {
            $alerta = "
               <script>
                swal({
                      input: '$datos[field]',
                      title: '" . $datos['Titulo'] . "',
                      text: '" . $datos['Texto'] . "',
                      type: '" . $datos['Tipo'] . "',
                      showCancelButton: 'Cancelar',
                      confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        oe(JSON.stringify(result));
                     });
               </script>
             ";
        }
        return $alerta;
    }


}
