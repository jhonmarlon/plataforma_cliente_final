<?php
include './seguridad/configGeneral.php';
include 'modelo/conexion.php';
include './librerias/ti.php';
include './plantilla/base.php';
include './funciones/funciones.php';

$conn = new conexion();
       $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Ocurrió un error inesperado",
                "Texto" => "El NIT que intenta ingresar ya se encuentra registrado.",
                "Tipo" => "error"
            ];
            
  echo ($conn->sweet_alert($alerta));
?>

<?php startblock('header') ?>
<?php include './plantilla/register_login_header.php'; ?>
<?php endblock() ?>

<?php startblock('content') ?>        
<div class="content">
    <a href="plantilla/base.php"></a>
    <div id="register_box">
        <div class="register-box-body" id="frm_registro">

            <div class="register-logo">
                <a href=""><h5><b>Inicia sesión en nuestra plataforma </b></h5></a>
            </div>
            <form autocomplete="off" id="form_login" action="seguridad/valida_campos_login.php" method="post">

                <div class="form-group has-feedback">
                    <input type="text" id="email_user" name="email" class="form-control" placeholder="Email"  required>  
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div> 
                <div class="form-group has-feedback">
                    <input type="password" id="contrasena_user" name="contrasena" class="form-control" placeholder="Contraseña"  required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button id="registro" type="submit" name="registrar" style=' background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3484fc), color-stop(1, #12306a) );' 
                                class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button><br>
                                <a href="">¿Haz olvidado tu contraseña?</a><br><br>                        
                        <a href="registro.php">Regístrate</a>

                    </div>
                    <!-- /.col -->
                </div>

            </form>
            <div id="result"></div>
        </div>
    </div>
</div>
<?php endblock() ?>


<script>
    $(document).ready(function () {
        $('#form, #fat, #form_login').submit(function () {
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
</script>
