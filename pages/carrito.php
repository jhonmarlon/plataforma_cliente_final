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
                  CARRITO DE COMPRAS
                </li>
            </ul>            
        </div><!--fin col-md-12-->

    <div id="cart" class="col-md-9"><!--col md 9-->
       <div class="box"><!--box-->
       <form action="carrito.php" method="post" enctype="multipart/form-data"><!--form-->
         <h1>Carrito de compras</h1>
         <p class="text-muted">Actualmente tienes 2 Items en tu carrito</p>
          <div class="table-responsive"><!--table responsive-->
           <table class="table"><!--table-->
             <thead><!--thead-->
               <tr>
                <th colspan="2">Producto</th>
                <th>Cantidad</th>
                <th>Valor Unitario</th>
                <th>Tamaño</th>
                <th colspan="1">Eliminar</th>
                <th colspan="2">Sub Total</th>
               </tr>
             </thead><!--fin thead-->
             <tbody><!--tbody-->
                <tr>
                 <td>
                    <img class="img-responsive" src="../img/area_admin/producto_img/iphone_9.jpg" alt="Product 2-a">
                 </td>
                 <td>
                 <a href="#">Moto G6</a>
                 </td>
                 <td>
                 2
                 </td>
                 <td>
                    $630000
                 </td>
                 <td>
                    Grande
                 </td>
                 <td>
                    <input type="checkbox" name="remove[]">
                 </td>
                 <td>
                    $1800000
                 </td>
                </tr>
             </tbody><!--fin tbody-->

             <tbody><!--tbody-->
                <tr>
                 <td>
                    <img class="img-responsive" src="../img/area_admin/producto_img/moto_g_6.jpg" alt="Product 2-a">
                 </td>
                 <td>
                 <a href="#">Iphone 9</a>
                 </td>
                 <td>
                 1
                 </td>
                 <td>
                    $2200000
                 </td>
                 <td>
                    Grande
                 </td>
                 <td>
                    <input type="checkbox" name="remove[]">
                 </td>
                 <td>
                 $2200000
                 </td>
                </tr>
             </tbody><!--fin tbody-->
                 <tfoot>
                  <tr>
                    <th colspan="5">Total</th>
                    <th colspan="2">$4000000</th>
                  </tr>
                 </tfoot>
           
           </table><!--fin table-->
          </div><!--fin table responsive-->

          <div class="box-footer"><!--box footer-->

            <div class="pull-left"><!--pull left-->
              <a href="index.php" class="btn btn-default">
                <i class="fa fa-chevron-left"></i> Continuar Comprando
              </a>
            </div><!--fin pull left-->

            <div class="pull-right"><!--pull right-->
              <button type="submit" name="update" value="Actualizar Carrito" class="btn btn-default">
                <i class="fa fa-refresh"></i> Actualizar Carrito
              </button>

            <a href="realizar_pago.php" class="btn btn-primary">
                Realizar Pago<i class="fa fa-chevron-right"></i>
            </a>

            </div><!--fin pull right-->

          </div><!--fin box footer-->

       </form><!--fin form-->
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
                        <p class="price">$2200000</p>
                    </div><!--fin text-->
                </div><!--fin col md 6-->
                
            </div><!--fin same heigh row-->

    </div><!--fin col md 9-->


      <div class="col-md-3"><!--col md 3-->
      <div id="order-summary" class="box"><!--box-->
        <div class="box-header">
        <h3>Detalles</h3>
        </div>
        <p class="text-muted">
los gastos de envío y adicionales se calculan en función del valor que haya introducido.
        </p>
        <div class="table-responsive"><!--table responsive-->
        <table class="table"><!--table-->
          <tbody>
            <tr>
               <td>Sub-Total de la orden</td>
               <td>$4000000</td>
            </tr>
            
            <tr>
              <td>Envío</td>
              <td>$0</td>
            </tr>

            <tr>
              <td>Inpuesto</td>
              <td>$0</td>
            </tr>

            <tr class="total">
              <td>Total</td>
              <td>$4000000</td>
            </tr>
          
          <tbody>
        </table><!--fin table-->
        </div><!--fin table responsive-->
      </div><!--fin box-->
      </div><!--fin col md 3-->

    </div>
</div>

    <?php endblock() ?>

