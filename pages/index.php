<?php
include '../librerias/ti.php';
include '../plantilla/base_principal.php';
?>
<?php startblock("content") ?>
<!--<div class="slider_bg"><!-- start slider -->
<!---<div class="container">
    <div id="da-slider" class="da-slider text-center">
        <div class="da-slide">
            <h2>Bienvenid@</h2>
            <p>Este es nuestro nuevo portal web , aquí podrás conocer todos y cada uno de los servicios que tenemos a tu disposición
                <span class="hide_text"> así como las novedades, nuevas implementaciones y calidad de trabajo de nuestro equipo.</span></p>
            <h3 class="da-link"><a href="single-page.php" class="fa-btn btn-1 btn-1e">Ver Mas</a></h3>
        </div>
        <div class="da-slide">
            <h2>Otras Tecnologías</h2>
            <p>Disfruta lo mejor de la tecnología, de mano de los mejores precios, calidad y garantía en tus artículos. 
                <span class="hide_text">Aquí encontrarás celulares, computadores de escritorio, portátiles y todo en uno, además de televisores.</span></p>
            <h3 class="da-link"><a href="single-page.php" class="fa-btn btn-1 btn-1e">view more</a></h3>
        </div>
        <div class="da-slide">
            <h2>education portal</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span class="hide_text"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>
            <h3 class="da-link"><a href="single-page.php" class="fa-btn btn-1 btn-1e">view more</a></h3>
        </div>
        <div class="da-slide">
            <h2>online educations</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<span class="hide_text"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>
            <h3 class="da-link"><a href="single-page.php" class="fa-btn btn-1 btn-1e">view more</a></h3>
        </div>
    </div>
</div>
</div><!-- end slider -->

<div class="container" id="slider"><!--slider-->
    <div class="col-md-12"><!--col-md-12-->
        <div class="carousel slide" id="myCarousel" data-ride="carousel"><!--carousel slide-->
            <ol class="carousel-indicators"><!--carousel indicators-->
                <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol><!--fin carousel indocators-->

            <div class="carousel-inner"><!--carousel inner-->
                <div class="item active">
                    <img src="../img/area_admin/slider_img/dummy_1.png" alt="Slider image 1">
                </div>
                <div class="item">
                    <img src="../img/area_admin/slider_img/dummy_1.png" alt="Slider image 2">
                </div>
                <div class="item">
                    <img src="../img/area_admin/slider_img/dummy_1.png" alt="Slider image 3">
                </div>
                <div class="item">
                    <img src="../img/area_admin/slider_img/dummy_1.png" alt="Slider image 4">
                </div>
            </div><!--fin carousel inner-->
            <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!--left carousel control-->
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Anterior</span>
            </a><!--finish right carousel control-->
            <a href="#myCarousel" class="right carousel-control" data-slide="next"><!--left carousel control-->
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Siguiente</span>
            </a><!--finish right carousel control-->
        </div><!--fin carousel slide-->
    </div><!---fin col-md-12-->
</div><!--fin slider-->

<!--Vnetajas-->
<div id="ventajas">
    <!--contenedor ventajas-->
    <div class="container">
        <div class="some-height-row">
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">Mejores Ofertas</a></h3>
                    <p>Sabemos dar el mejor servicio posible</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-tag"></i>
                    </div>
                    <h3><a href="#">Mejores Precios</a></h3>
                    <p>Comparanos con otras tiendas.¿Quien tiene el mejor precio?</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                    <h3><a href="#">100% Calidad</a></h3>
                    <p>Solo te ofrecemos los mejores y originales</p>
                </div>
            </div>
        </div>
    </div>
    <!--fin contenedor ventajas-->
</div>
<!--fin ventajas-->
<div id="hot"><!--hot-->
    <div class="box"><!---box-->
        <div class="container  ultimos_productos"><!--container-->
            <div class="col-md-12"><!--col-md-12-->
                <h2>
                    Nuestros últimos productos.
                </h2>
            </div><!--fin col-md,12-->
        </div><!--fin container-->
    </div><!--fin box-->
</div><!--fin hot-->
<div id="content" class="container"><!--container-->
    <div class="row"><!--row-->

        <div class="col-sm-4 col-sm-6 single"><!--col-sm-4-->
            <div class="product"><!--producto-->
                <a href="detalle.php">
                    <img class="img-responsive" src="../img/area_admin/producto_img/moto_g_6.jpg" alt="Producto 1">
                </a>
                <div class="text"><!--text-->
                    <h3>
                        <a href="detalle.php">
                            MotoG-6
                        </a>
                    </h3>
                    <p class="price">$630000</p>
                    <p class="button">
                        <a href="detalle.php" class="btn btn-default">Ver detalles</a>
                        <a href="detalle.php" class="btn btn-primary">
                            <i class="fa fa-shopping-cart">
                                Agregar al carrito
                            </i>
                        </a>
                    </p>
                </div><!--fin text-->
            </div><!---fin producto-->
        </div><!--fin col-sm-4-->

        <div class="col-sm-4 col-sm-6 single"><!--col-sm-4-->
            <div class="product"><!--producto-->
                <a href="detalle.php">
                    <img class="img-responsive" src="../img/area_admin/producto_img/samsung_galaxy_s9.jpg" alt="Producto 1">
                </a>
                <div class="text"><!--text-->
                    <h3>
                        <a href="detalle.php">
                            Samdung Galaxy S9
                        </a>
                    </h3>
                    <p class="price">$630000</p>
                    <p class="button">
                        <a href="detalle.php" class="btn btn-default">Ver detalles</a>
                        <a href="detalle.php" class="btn btn-primary">
                            <i class="fa fa-shopping-cart">
                                Agregar al carrito
                            </i>
                        </a>
                    </p>
                </div><!--fin text-->
            </div><!---fin producto-->
        </div><!--fin col-sm-4-->

        <div class="col-sm-4 col-sm-6 single"><!--col-sm-4-->
            <div class="product"><!--producto-->
                <a href="detalle.php">
                    <img class="img-responsive" src="../img/area_admin/producto_img/iphone_9.jpg" alt="Producto 1">
                </a>
                <div class="text"><!--text-->
                    <h3>
                        <a href="detalle.php">
                            Samdung Galaxy S9
                        </a>
                    </h3>
                    <p class="price">$630000</p>
                    <p class="button">
                        <a href="detalle.php" class="btn btn-default">Ver detalles</a>
                        <a href="detalle.php" class="btn btn-primary">
                            <i class="fa fa-shopping-cart">
                                Agregar al carrito
                            </i>
                        </a>
                    </p>
                </div><!--fin text-->
            </div><!---fin producto-->
        </div><!--fin col-sm-4-->

    </div><!--fin row-->
</div><!--fin container-->
<!--<div class="main_bg"><!-- start main -->
<!-- <div class="container">
     <h2>Nuestros servicios:</h2>
     <div class="main row">
         <div class="col-md-3 images_1_of_4 text-center">
             <img style="width: 100%;" src="../img/netflix_simbolo.png">
             <h4><a href="menu_netflix.php">Netflix</a></h4>
             <p class="para">Puedes adquirir tu cuenta Netflix Premium UHD 4k para 4 pantallas ahora, por solo $15,000 mensuales.</p>
             <a href="menu_netflix.php" class="fa-btn btn-1 btn-1e">Ver mas</a>
         </div>
         <div class="col-md-3 images_1_of_4 bg1 text-center">
             <img style="width: 47%;" src="../img/claro_simbolo.png">
             <h4><a href="#">Planes Claro</a></h4>
             <p class="para">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
             <a href="single-page.php" class="fa-btn btn-1 btn-1e">Ver mas</a>
         </div>
         <div class="col-md-3 images_1_of_4 bg1 text-center">
             <span class="bg"><i class="fa fa-cog"></i></span>
             <h4><a href="#">Sed Porta Dolor</a></h4>
             <p class="para">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32  by H. Rackham.</p>
             <a href="single-page.php" class="fa-btn btn-1 btn-1e">read more</a>
         </div>		
         <div class="col-md-3 images_1_of_4 bg1 text-center">
             <span class="bg"><i class="fa fa-shield"></i> </span>
             <h4><a href="#">Contrary  belief</a></h4>
             <p class="para">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
             <a href="single-page.php" class="fa-btn btn-1 btn-1e">read more</a>
         </div>	
     </div>
 </div>
</div> --><!-- end main -->

<?php endblock() ?>

