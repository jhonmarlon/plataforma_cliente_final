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
                    MI CUENTA
                </li>
            </ul>            
        </div><!--fin col-md-12-->


        <div class="col-md-3"><!--col-md-3-->
        <div class="panel panel-default sidebar-menu">
<div class="panel-heading"><!--panel heading-->
    <center><!--center-->
       <img class="img-responsive" src="../img/dummy_perfil.jpg" alt="cel_comunicaciones profile">
    </center><!--fin center-->

    <br>

    <h3 align="center" class="panel-tittle"><!--pannel tittle-->
     Name: Admin
    </h3><!--fin pannel tittle-->

</div><!--fin panel heading-->

    <div class="panel-body">
        
        <ul class="nav-pills nav-stacked nav"><!--ul-->
       <li class="<?php if(isset($_GET["mis_ordenes"])){echo "active";}?>">
           <a href="mi_cuenta.php?mis_ordenes">
               <i class="fa fa-list"></i> Mis Ordenes
           </a>
       </li>

       <li class="<?php if(isset($_GET["pagar_fuera_linea"])){echo "active";}?>">
           <a href="mi_cuenta.php?pagar_fuera_linea">
               <i class="fa fa-bolt"></i> Pagar Fuera de Linea
           </a>
       </li>

       <li class="<?php if(isset($_GET["editar_cuenta"])){echo "active";}?>">
           <a href="mi_cuenta.php?editar_cuenta">
               <i class="fa fa-pencil"></i> Editar Cuenta
           </a>
       </li>

       <li class="<?php if(isset($_GET["cambiar_clave"])){echo "active";}?>">
           <a href="mi_cuenta.php?cambiar_clave">
               <i class="fa fa-user"></i> Cambiar Clave
           </a>
       </li>

       <li class="<?php if(isset($_GET["eliminar_cuenta"])){echo "active";}?>">
           <a href="mi_cuenta.php?eliminar_cuenta">
               <i class="fa fa-trash-o"></i> Eliminar Cuenta
           </a>
       </li>

       <li>
           <a href="../seguridad/salir.php">
               <i class="fa fa-sign-out"></i> Cerrar Sesión
           </a>
       </li>

</ul><!--fin ul-->

    </div>

      </div>
        </div><!--fin col-md-3-->



<div class="col-md-9"><!--col md 9-->
<div class="box"><!--box-->
  <?php 
   if(isset($_GET["mis_ordenes"])){
       include("cliente/mis_ordenes.php");
   }
   
  
  ?>
</div><!--fin box-->
</div><!--fin col md 9-->



    </div><!--fin container-->
</div><!--fin content-->
<?php
endblock()?>