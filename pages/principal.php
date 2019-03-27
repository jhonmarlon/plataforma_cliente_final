<?php
include '../librerias/ti.php';
include '../plantilla/base_principal.php';
?>

<?php startblock("content") ?>
<style>
    body{
    font-size: 14px;
    line-height: 1.42857143;
    color: #333333;
    background: #f0f0f0;
    overflow-x: hidden;
}

/* estilo top */
#top{
    background-color: #555555;
    padding: 10px 0;
}

#top .offer{
   color: #ffffff;
   
}

#top .offen .btn{
    text-transform: uppercase;
}


@media(max-width: 991px){
    #top .offer{
        margin-bottom: 10px;
    }
}

@media(max-width: 991px){
    #top{
        font-size: 12px;
        text-align: center;
    }
}

#top a{
    color: #ffffff;
}


#top ul.menu{
    padding-top: 5px;
    margin: 0px;
    text-align: right;
    font-size: 12px;
    list-style: none;
}

@media(max-width: 991px){
    #top ul.menu{
        text-align: center;
    }
}

#top ul.menu > li{
    display: inline-block;
}
</style>
<div id="top"><!--Top Begin-->
    
    <div class="container"><!---container begin-->
       
        <div class="col-md-6 offer">
            <a href="#" class="btn btn-success btn-sm">Bienvenido</a>
            <a href="">4 Items in your Cart</a>
        </div>
        
        <div class="col-md-6">
            
            <ul class="menu">
                <li>
                    <a href="">Registrarme</a>
                </li>
                <li
                    <a href="cuenta_cliente.php">Mi Cuenta</a>
                </li>
                <li>
                    <a href="carrito.php">Ir a Carrito de Compras</a>
                </li>
                <li>
                    <a href="carrito.php">Login</a>
                </li>
            </ul>
            
        </div>
        
    </div><!---container finish-->
    
</div><!--Top Finish-->

<?php endblock() ?>