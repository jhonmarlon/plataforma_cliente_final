<?php
include '../librerias/ti.php';
include '../plantilla/base_principal.php';
?>

<?php startblock("content") ?>
<div class="main_bg"><!-- start main -->
    <div class="container">
        <div class="main row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.423083460532!2d-75.54741818598336!3d6.339209795412506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442f9989c466c1%3A0x3db6b72d583f2775!2sAv.+38+%2351-183%2C+Bello%2C+Antioquia!5e0!3m2!1ses-419!2sco!4v1542233841149" width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        <br><small><a href="https://www.google.com/maps/place/Av.+38+%2351-183,+Bello,+Antioquia/@6.3392098,-75.5474182,17z/data=!3m1!4b1!4m5!3m4!1s0x8e442f9989c466c1:0x3db6b72d583f2775!8m2!3d6.3392098!4d-75.5452295" style="font-family: 'Open Sans', sans-serif;color:#555555;text-shadow:0 1px 0 #ffffff; text-align:left;font-size:12px;padding: 5px;">Ver Mapa Completo</a></small>
        </div>
    </div>
</div><!-- end main -->
<div class="main_btm"><!-- start main_btm -->
    <div class="container">
        <div class="main row">
            <div class="col-md-4 company_ad">
                <h2>Datos de contacto :</h2>
                <address>
                    <p>Cel Comunicaciones,</p>
                    <p>Avenida 38 # 51 183, Medellín - Bello,</p>
                    <p>Colombia</p>
                    <p>Línea directa:(57) 310-4616869</p>
                    <p>Email: <a href="mailto:info@mycompany.com">ventas@celcomunicaciones.com</a></p>
                    <p>Síguenos en: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
                </address>
            </div>
            <div class="col-md-8">
                <div class="contact-form">
                    <h2>Contáctanos</h2>
                    <form method="post" action="contact-post.html">
                        <div>
                            <span>Nombre</span>
                            <span><input type="username" class="form-control" id="userName"></span>
                        </div>
                        <div>
                            <span>e-mail</span>
                            <span><input type="email" class="form-control" id="inputEmail3"></span>
                        </div>
                        <div>
                            <span>Asunto</span>
                            <span><textarea name="userMsg"> </textarea></span>
                        </div>
                        <div>
                            <label class="fa-btn btn-1 btn-1e"><input type="submit" value="Enviar Email"></label>
                        </div>
                    </form>
                </div>
            </div>		
            <div class="clearfix"></div>		
        </div> 
    </div>
</div>
<?php endblock() ?>
