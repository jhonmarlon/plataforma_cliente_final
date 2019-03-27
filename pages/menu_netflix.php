<?php

include '../librerias/ti.php';
include '../plantilla/base_principal.php';
include './modales.php';


//tomamos el valor del 
echo $infoUsuario->nick_name;
echo $infoUsuario->id_tarifa;
?>

<?php startblock('content')?>

<div class="main_bg"><!-- start main -->
    <div class="container">
        <div class="technology row">
            <h2><b>NETFLIX</b></h2><br>
            <div class="technology_list">
                <h4>1. Comprar cuentas</h4> 
                <div class="col-md-10 tech_para">
                  
                    <p class="para">Para realizar tus pagos puedes acercarte a 
                        nuestras oficinas o adjuntar tu
                        comprobante de pago una vez lo realizes para poder obtener tu cuenta o 
                        cuentas solicitadas.
                        Ahora puedes realizar 
                        tus pagos tambien online mediante la opcion PSE.<br>
                       
                    </p>
                </div>
                <div class="col-md-2 images_1_of_4 bg1">
                    <img class="img_netflix" title="Soporte Netflix" src="../dist/principal/images/carrito_compra.png" style="width: 300px;    max-width: 100%;">
                </div>
                <div class="clearfix"></div>
                <div class="read_more">
                    <a  data-toggle="modal" data-target="#mdl_comprar_cuenta_netflix" class="fa-btn btn-1 btn-1e" >COMPRAR CUENTAS</a>
                </div>
                

            </div>
            <div class="technology_list1">
                <h4>2. Soporte</h4>
                <div class="col-md-10 tech_para">
                    <p class="para">Si presentas inconformidades o algún inconveniente con respecto a tu cuenta Netflix,
                        éste es el espacio indicado para que puedas reportar tu cuenta o cuentas con su respectiva descripción.
                        <b><font color='red'>Antes de realizar tu reporte </font></b>, es recomendable que visualices cuales son los errores más comunes y 
                            verifiques si la solución esta a tu alcance, de lo contrario, envía tu reporte por medio de la opcion "Otros".</p>
                            <p class="para"><b><font color='red'>Importante:</font> Debes reportar con anticipación tu cuenta o cuentas Netflix en caso 
                                    de presentar algún inconveniente, de lo contrario , tu proveedor no se hará responsable.</b></p>
                </div>
                <div class="col-md-2 images_1_of_4 bg1">
                    <!--<span class="bg"><i class="fa fa-laptop"></i> </span>-->
                    <img class="img_netflix" title="Soporte Netflix" src="../dist/principal/images/soporte.png" style="width: 300px;    max-width: 100%;">

                </div>
                <div class="clearfix"></div>
                <div class="read_more">
                    <a href="errores_comunes.php" class="fa-btn btn-1 btn-1e">GENERAR REPORTE</a>
                </div>	
            </div>
            <div class="technology_list1">
                <h4>3. Reembolso</h4>
                <div class="col-md-10 tech_para">
                    <p class="para">
                        En caso de que hayas presentado alguna queja o reclamo afin a tu cuenta o cuentas adquiridas
                        y no hayas tenido respuesta alguna en un lapso máximo de tres días habiles, puedes generar tu solicitud de 
                        reembolso, mediante la cual se te reconocerá el efectivo o el tiempo en que no hayas podido disfrutar de 
                        nuestro servicio.
                        .</p>
                </div>
                <div class="col-md-2 images_1_of_4 bg1">
                   <!-- <span class="bg"><i class="fa fa-"></i></span>-->
                    <img class="img_netflix" title="Soporte Netflix" src="../dist/principal/images/dinero.png" style="width: 300px;    max-width: 100%;">

                </div>
                <div class="clearfix"></div>
                <div class="read_more">
                    <a href="single-page.php" class="fa-btn btn-1 btn-1e">read more</a>
                </div>	
            </div>
            <div class="technology_list1">
                <h4>4. There are many variations of passages of Lorem Ipsum available ?</h4>
                <div class="col-md-10 tech_para">
                    <p class="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="col-md-2 images_1_of_4 bg1">
                    <span class="bg"><i class="fa fa-files-o"></i> </span>
                </div>
                <div class="clearfix"></div>
                <div class="read_more">
                    <a href="single-page.php" class="fa-btn btn-1 btn-1e">read more</a>
                </div>	
            </div>
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Warning!</strong> Better check yourself, you're not looking too good.
            </div>
        </div>
    </div>
</div><!-- end main -->
<?php endblock() ?>