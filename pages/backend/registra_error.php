<?php
session_start();


if ($_SESSION["authenticated"] == 1) {


    include '../../modelo/conexion.php';
    include '../../funciones/funciones.php';

    $conn = new conexion();


    $cuenta_netflix = $_POST["email"];
    $detalle_error = $_POST["detalle_error"];


    //id usuario registrado
    $id_usuario_reg = $_SESSION["id_usuario_reg"];
    //tomamos la fecha actual para tener la fecha de compra
    setlocale(LC_TIME, 'es_ES.utf8', 'esp');
    date_default_timezone_set('America/Bogota');
    $fecha_actual = strftime("%Y-%m-%d %H:%M:%S");

    //quitamos caracteres
    $cuenta_netflix = str_replace('"', "", $cuenta_netflix);
    $cuenta_netflix = str_replace("[", "", $cuenta_netflix);
    $cuenta_netflix = str_replace("]", "", $cuenta_netflix);


    $correo = explode(",", $cuenta_netflix);
    //cuentas no existantes
    $no_existenten = array();
    $pendientes = array();
    $enviadas = array();


    //validamos que de las cuentas , almenos 1 exista en bd
    $aux_no_existe = 0;
    for ($i = 0; $i < count($correo); $i++) {
        //buscamos en base de datos
        $cuenta = $conn->validaExisteCuentaByEmail($correo[$i]);

        if (mysqli_num_rows($cuenta) == 0) {
            $aux_no_existe ++;
            array_push($no_existenten, $correo[$i]);
        } else {
            //Si existe , entonces validamos que no este en estado pendiente
            $info_cuenta = mysqli_fetch_assoc($cuenta);
            if ($conn->cuentaNetflixPendienteSoporte($info_cuenta["id_cuenta_netflix_act"])) {
                //si esta en estado pendiente
                array_push($pendientes, $correo[$i]);
            } else {
                // la cuenta existe y no esta en estado pendiente por soporte
                array_push($enviadas, $correo[$i]);
            }
        }
    }
    // si noe xiste ninguna de las cuentas diligenciadas
    if ($aux_no_existe == count($correo)) {
        echo "<b><h5><font color='red'><label> La(s) cuenta(s) diligenciada(s) , no existen.</label></font></h5></b>";
        return;
    }

    if (count($enviadas) != 0) {
        //generamos el numerod e radicado
        /* $radicado = '';
          $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
          $max = strlen($pattern) - 1;
          for ($i = 0; $i < 10; $i++)
          $radicado .= $pattern{mt_rand(0, $max)}; */
        //numero de radicado
        //buscamos en base de datos y verificamos si hay consecutivos
        $ultimo_consecutivo = $conn->obtieneUltimoRegistroError();
        //verificamos si hay datos
        if (mysqli_num_rows($ultimo_consecutivo) == 0) {
            $empezar = 1;
        } else {
            $ult_conse = mysqli_fetch_assoc($ultimo_consecutivo);
            $rad = $ult_conse["radicado"];
            //recorremos la cadena y verificamos en que indice esta el numero diferente de cero
            for ($i = 0; $i < count($rad); $i++) {
                if ($rad[$i] != 0) {
                    $pos = $i;
                    break;
                }
            }
            //tomamos el numero encontrado en la cadena y le sumamos 1 para continuar con el consecutivo
            $empezar = (substr($rad, $pos)) + 1;
        }


        //cantidad de radicados a generar
        $cant = 1;
        //el número de dígitos de los números generados deben ser
        $dígitos = 10;
        //llamamos a la funcion que genera el consecutivo
        $radicado = generate_numbers($empezar, $cant, $dígitos);

        //creamos el registro del error
        $conn->creaRegistroError($id_usuario_reg, $fecha_actual, $detalle_error, $radicado[0]);
        $lastId = $conn->obtieneUltimoRegistroError();
        $last_id = mysqli_fetch_array($lastId);

        foreach ($enviadas as $email_netflix) {

            //quitamos los espacios en blanco de la cuenta
            $email_netflix = trim($email_netflix);
            //buscamos la cuenta en la base de datos
            $cuenta = $conn->validaExisteCuentaByEmail($email_netflix);
            $info_cuenta = mysqli_fetch_assoc($cuenta);

            //creamos el registro de cada cuenta en la tabla cuenta_netflix_reportada
            $conn->creaRegistroErrorCuenta($info_cuenta["id_cuenta_netflix_act"], $info_cuenta["usuario"], $info_cuenta["clave"], $last_id[0]);
        }

        //Creamos el registro para las imagenes
        if (isset($_FILES["img_error"])) {

            $reporte = null;
            echo "<h6><b>Imágenes adjuntas: </b></h6>";
            for ($x = 0; $x < count($_FILES["img_error"]["name"]); $x++) {
                $file = $_FILES["img_error"];
                $nombre = $file["name"][$x];
                $tipo = $file["type"][$x];
                $ruta_provisional = $file["tmp_name"][$x];
                $size = $file["size"][$x];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones[0];
                $height = $dimensiones[1];
                $carpeta = "../../img/img_errores/";

                if ($tipo != "image/jpg" && $tipo != "image/jpeg" && $tipo != "image/png" && $tipo != "image/gif") {
                    $reporte .= "<p style='color: red'>Error, el archivo " + $nombre + " no es una "
                            . "imagen</p>";
                } elseif ($size > 1024 * 1024) {
                    $reporte .= "<p style='color: red'>Error, el tamaña máximo permitido es 1MB</p>";
                } /* elseif ($width > 500 || $height > 500) {
                  $reporte .= "<p style='color: red'>Error, la anchura y altura máxima permitida es de 500px";
                  } elseif ($width < 60 || $height > 60) {
                  $reporte .= "<p style='color: red'>Error, la anchura y altura mínima permitida es de 60px";
                  } */ else {
                    //encriptamos con el fin de que si un usuario ingresa una imagen con el
                    //mismo nombre , no se vayan a reemplazar
                    $nom_encriptado = md5($nombre) . ".jpg";
                    $src = $carpeta . $nom_encriptado;
                    move_uploaded_file($ruta_provisional, $src);
                    echo "La imagen $nombre ha sido cargada exitosamente<br>";

                    $conn->registraImagenesError($nom_encriptado, $last_id[0]);
                }
            }

            echo $reporte;
        }
    }


    if (count($no_existenten) != 0) {

        echo "<h6><b>Las siguientes cuentas, no existen en la base de datos:</b></h6>";
        foreach ($no_existenten as $no_exist) {
            echo "* " . $no_exist . "<br>";
        }
        echo "<br><label>por favor verifique que haya ingresado la(s)
            cuenta(s) correctamente antes de reportarla(s)</label><br>";
    }

    if (count($pendientes) != 0) {
        echo "<h6><b>Las siguientes cuentas aún están pendientes por el soporte:</b></h6>";
        foreach ($pendientes as $cuenta_pendiente) {
            echo "* " . $cuenta_pendiente . "<br>";
        }
    }


    if (count($enviadas) != 0) {
        echo "<h6><b>Las siguientes cuentas, se han enviado correctamente:</b></h6>";
        foreach ($enviadas as $cuenta_enviada) {
            echo "√ " . $cuenta_enviada . "<br>";
        }
        //echo "<script>setTimeout('location.reload()', 5000);</script>";
        ?>
        </div>



        <?php
    }
} else {
    echo "<script>location.href ='index.php'</script>";
}

        