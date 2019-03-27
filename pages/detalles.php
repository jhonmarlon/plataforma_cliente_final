<?php
include '../librerias/ti.php';
include '../plantilla/base_principal.php';
?>
<?php startblock("content") ?>

<div id="content"><!--content-->
    <div class="container"><!--container-->
        <div class="col-md-12"><!--col-md-12-->
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">INICIO</a>
                </li>
                <li>
                    TIENDA
                </li>
            </ul>            
        </div><!--fin col-md-12-->


        <div class="col-md-3"><!--col-md-3-->
            <?php include '../plantilla/side_bar_principal.php'; ?>
        </div><!--fin col-md-3-->

        <div class="col-md-9"><!--col-md-9-->
            <div class="row" id="productMain"><!--product main-->
                <div class="col-sm-6"><!--col-sm-6-->
                    <div id="mainImage"><!--main image-->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel"><!--carousel slide-->
                            <ol class="carousel-indicators"><!--carousel indicators-->
                                <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol><!--fin carousel indicators-->

                            <div class="carousel-inner">
                                <div class="item active">
                                    <center>
                                        <img class="img-responsive" src="../img/area_admin/producto_img/iphone_9.jpg" alt="Product 2-a">
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        <img class="img-responsive" src="../img/area_admin/producto_img/iphone_9.jpg" alt="Product 2-b">
                                    </center>
                                </div>
                                <div class="item">
                                    <center>
                                        <img class="img-responsive" src="../img/area_admin/producto_img/moto_g_6c.jpg" alt="Product 2-c">
                                    </center>
                                </div>
                            </div>

                            <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>

                        </div><!--fin carousel slide-->
                    </div><!--fin main image-->
                </div><!--fin col-sm-6-->

                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center">Moto G6</h1>
                        <form class="detalles.php" class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="" class="col-md-5 control-label">Cantidad</label>
                                <div class="col-md-7"><!--col md 7-->
                                    <select name="product-qty" id="" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div><!--fin col md 7-->
                            </div><br>

                            <div class="form-group"><!--form group-->
                                <label class="col-md-5 control-label">Tamaño</label>
                                <div class="col-md-7">
                                    <select name="product-size" class="form-control">
                                        <option>Seleccione un tamaño</option>
                                        <option>Pequeño</option>
                                        <option>Medio</option>
                                        <option>Grande</option>
                                    </select>
                                </div>
                            </div><!--fin form group-->

                            <p class="price">$630000</p>
                            <p class="text-center buttons">
                                <button class="btn btn-primary i fa fa-shopping-cart"> Añadir al carrito</button>
                            </p>

                        </form>
                    </div>

                    <div class="row" id="thumbs"><!--row thumbs-->
                        <div class="col-xs-4"><!--col xs 4-->
                            <a data-target="#myCarousel" data-slide-to="0"  href="" class="thumb">
                                <img src="../img/area_admin/producto_img/iphone_9.jpg" alt="producto 1" class="img-responsive">
                            </a>
                        </div><!--fin col xs 4-->
                        <div class="col-xs-4"><!--col xs 4-->
                            <a data-target="#myCarousel" data-slide-to="1"  href="" class="thumb">
                                <img src="../img/area_admin/producto_img/iphone_9.jpg" alt="producto 2" class="img-responsive">
                            </a>
                        </div><!--fin col xs 4-->
                        <div class="col-xs-4"><!--col xs 4-->
                            <a data-target="#myCarousel" data-slide-to="2"  href="" class="thumb">
                                <img src="../img/area_admin/producto_img//moto_g_6c.jpg" alt="producto 3" class="img-responsive">
                            </a>
                        </div><!--fin col xs 4-->

                    </div><!--fin row thumbs-->
                </div>


            </div><!--fin product main-->

            <div class="box" id="details"><!--box-->

                <h4>Detalles</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipiscing elit quam nostra eleifend, cum commodo volutpat ligula vehicula mollis integer magna potenti hendrerit dui, netus in parturient litora montes viverra felis praesent enim. 
                </p>

                <h4>Tamaño</h4>
                <ul>
                    <li>Pequeño</li>
                    <li>Mediano</li>
                    <li>Grande</li>
                </ul>
                
                <hr>
                
            </div><!--fin box-->
            
            
            <div id="row same-heigh-row"><!--same heigh row-->
                
                <div class="col-md-3 col-sm-6"><!---col md 6-->
                    <div class="box same-height headline">
                        <h3 class="text-center">Productos que quizá te gusten</h3>
                    </div>
                </div><!--fin col md 3-->
                
                <div class="col-md-3 col-sm-6 center-responsive"><!--col md 6-->
                    <div class="product same-height">
                        <a href="detalles.php"><img class="img-responsive" src="../img/area_admin/producto_img/iphone_9.jpg" alt="product 6"></a>
                    </div>
                    <div class="text"><!--text-->
                        <h3><a href="detalles.php">Iphone 9</a></h3>
                        <p class="price">$230000</p>
                    </div><!--fin text-->
                </div><!--fin col md 6-->
                
            </div><!--fin same heigh row-->
            
            
        </div><!--fin col-md-9-->


    </div><!--fin container-->
</div><!--fin content-->
<?php
endblock()?>