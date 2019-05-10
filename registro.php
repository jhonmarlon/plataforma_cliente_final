
<?php
session_start();
include './seguridad/configGeneral.php';
include 'modelo/conexion.php';
include './librerias/ti.php';
include './plantilla/base.php';
include './funciones/funciones.php';

include './pages/modales.php';


$conn = new conexion();
echo $conn->decryption("OERpTVMzc2RIR2F3NjNUNFVDUmh3QT09");
echo $conn->decryption("TFl3WUpEamdreFRpSWtKNFNNUmF1UT09");

        
                   ?>

<?php startblock('header') ?>

<?php include './plantilla/register_login_header.php'; ?>

<?php  endblock() ?>


<?php startblock('content') ?>

<div class="content">

    <div class="box-body" style="max-width: 500px; margin: 0 auto;">
        <div class="row" style="background: white; height: 100%">

            <!-- /.register-box -->
               <div id="register_box" >
                <div class="register-box-body" id="frm_registro">
                    <div class="register-logo">
                        <a href=""><h5><b>Regístrate y haz parte de nuestra comunidad.</b></h5></a>
                    </div>
                    <p class="login-box-msg"><label><b>Información de cuenta</b></label></p>
                    <div>
                        <form autocomplete="off" id="form_cuenta" class="form_cuenta" action="seguridad/valida_campos_registro.php" onsubmit="valida()" method="post">
                            <div class="form-group has-feedback">

                                <input onKeyUp="this.value = this.value.toUpperCase();" type="text" id="nombre_user" name="nombre" class="form-control" placeholder="Nombre"  required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>  
                            <div class="form-group has-feedback">
                                <input onKeyUp="this.value = this.value.toUpperCase();" type="text" id="apellido_user" name="apellido" class="form-control" placeholder="Apellido"  required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>  
                            <div class="form-group has-feedback">
                                <input type="email" id="email_user" name="email" class="form-control" placeholder="Email"  required>  
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">  
                                    <div class="form-group has-feedback">
                                        <input type="number" id="cedula_user" name="cedula" class="form-control" placeholder="Cédula"  required>
                                        <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                                    </div>  
                                </div>
                                <div class="col-md-6">  
                                    <div class="form-group has-feedback">
                                        <input type="text" onKeyUp="this.value = this.value.toUpperCase();" id="usuario_user" name="usuario" class="form-control" placeholder="Usuario"  required>  
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div> 
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">  
                                    <div class="form-group has-feedback">
                                        <input type="password" id="contrasena_user" name="contrasena" class="form-control" placeholder="Contraseña" required>
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">  
                                    <div class="form-group has-feedback">
                                        <input type="password" id="repcontrasena_user" name="repcontrasena" class="form-control" placeholder="Confirmar contraseña"  required>
                                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">  
                                    <div class="form-group has-feedback">
                                        <input type="number" id="telefono_user" name="telefono" class="form-control" placeholder="Teléfono" required>
                                        <span class="glyphicon glyphicon glyphicon-earphone form-control-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">  
                                    <div class="form-group has-feedback">
                                        <input type="number" id="celular_user" name="celular" class="form-control" placeholder="Celular"  required>
                                        <span class="glyphicon glyphicon glyphicon-phone form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <input onKeyUp="this.value = this.value.toUpperCase();" type="text" id="direccion_user" name="direccion" class="form-control" placeholder="Dirección" >
                                <span class="glyphicon glyphicon glyphicon-home form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input onKeyUp="this.value = this.value.toUpperCase();"  type="text" pattern="[A-Z0-9]{5}" placeholder="AABBC" id="codigo_user" name="codigo" class="form-control" placeholder="Código de acceso"  required>
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            </div>

                            <div class="row">

                                <div class="col-xs-10">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input style="margin-left: 0px" type="checkbox" id="terminos_condiciones" name="check" required><label>Acepto los <a href="#">términos y condiciones</a></label>
                                        </label>
                                    </div>
                                </div>

                                <!-- /.col -->
                                <div class="col-xs-12">
                                    <button id="registro" type="submit" name="registrar"  
                                            class="btn btn-primary btn-block btn-flat btn_send" style="background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3484fc), color-stop(1, #12306a) );
                                            ">Registrarme</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-6">  
                            <a  href="index.php" class="text-center">Tengo actualmente una cuenta</a>
                        </div>
                        <div class="col-md-6" style="text-align: right">  
                            <a  data-toggle="modal" href="#registro_proveedor" class="text-center">¿Quieres ser Distribuidor?</a>
                        </div>

                    </div>

                    <br><br><div id="result"></div>

                </div>


                <?php
                $conn = new conexion();

                if (isset($_GET["id"]) AND isset($_GET["val"])) {

                    //validamos si el usuario ya esta previamente activado
                    $id_usuario = $_GET["id"];
                    $token = $_GET["val"];

                    $estado_activacion = $conn->validaActivacionCuenta($id_usuario, $token);
                    $estado = $estado_activacion->fetch_array();

                    if ($estado[0] != 0) {

                        echo "<div class='alert alert-danger alert-dismissible' style='text-align: center;'>
                    <button type='button'  class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    La cuenta que intenta activar, ya fue activada anteriormente<br>
                    Inténtelo nuevamente.
                    </div>";
                        return;
                    }
                    //Si la cuenta no se ha activado previamente la activamos
                    $conn->activaCuenta($id_usuario, $token);

                    echo "  <div id='result_registro'>
                    <div id='div_reg_exitoso' class='alert alert-success alert-dismissible' style='text-align: center;'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        Cuenta activada correctamente!<br> Ahora puede iniciar sesión en nuestra plataforma.

                    </div>
                </div>";
                    ?>
                    <script>

                        $().toastmessage('showNoticeToast', 'some message here');


                        setTimeout("location.href='index.php'", 8000);

                    </script>

                    <?php
                }
                ?>


                <div id="result_registro" style="display: none">
                    <div id="div_reg_exitoso" class="alert alert-success alert-dismissible" style="text-align: center;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Cuanta activada correctamente!<br> Ahora puede iniciar sesión en nuestra plataforma.

                    </div>

                </div>


            </div>
            <!-- /.form-box -->

        </div>
    </div>
</div>
<?php endblock() ?>






<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
                    /*$(function () {
                     $('input').iCheck({
                     checkboxClass: 'icheckbox_square-blue',
                     radioClass: 'iradio_square-blue',
                     increaseArea: '20%' // optional
                     });
                     });*/




                    $(document).ready(function () {
                       
                 
                        $('#form_cuenta, #fat, .form_cuenta').submit(function () {
                            // Enviamos el formulario usando AJAX
                            $.ajax({
                                type: 'POST',
                                url: $(this).attr('action'),
                                data: $(this).serialize(),
                                // Mostramos un mensaje con la respuesta de PHP
                                success: function (data) {
                                    $('#result').html(data);
                                }
                            })
                            return false;
                        });
                    })


    $('#form_nuevo_distribuidor').submit(function (e) {
        e.preventDefault();
            alert("No redirecciono");
            
                 $.ajax({

                            type: 'POST',

                            url: 'seguridad/valida_campos_registro_distribuidor.php',

                            data: $("#form_nuevo_distribuidor").serialize(),

                            success: function (data)
                            {
                                $("#resultado_reg_distribuidor").html(data);

                            }
                        });

    });
    


                

                    $(document).ready(function () {
                        $("#solita_credito").click(function () {
                            //alert("Handler for .click() called.");
                            if ($('#solita_credito').is(':checked')) {
                                $("#monto_solicitado_prop").removeAttr("readonly");
                                //ponemos el campo requerido
                                $("#monto_solicitado_prop").prop('required',true);

                            } else {
                                $("#monto_solicitado_prop").val("");
                                $("#monto_solicitado_prop").attr("readonly", "readonly");


                            }

                        });
                    });





</script>



