<?php
session_start();

if (!isset($_SESSION["authenticated"])) {
    //cerramos la sesion
    session_destroy();
    echo "<script>location.href ='../index.php'</script>";
    ?>

<?php } else { 
    
    //creamos el objeto del usuario autenticado

    ?>



<head>
    <title>CEL COMUNICACIONES</title>
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!--FONT AWESOME-->
    <link href="../bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <!-- <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script> -->

    <!--<link href="../dist/principal/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="../dist/principal/css/bootstrap.css" rel='stylesheet' type='text/css' />-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
    <link href="../dist/principal/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- start plugins -->
    <script type="text/javascript" src="../dist/principal/js/jquery.min.js"></script>
    <script type="text/javascript" src="../dist/principal/js/bootstrap.js"></script>
    <!-- start slider -->
    <link href="../dist/principal/css/slider.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="../dist/principal/js/modernizr.custom.28468.js"></script>
    <script type="text/javascript" src="../dist/principal/js/jquery.cslider.js"></script>
    <!--Notifications TOASTR -->
    <script src="../plugins/toastMessages/toastr.min.js"></script>
    <link rel="stylesheet" href="../plugins/toastMessages/toastr.min.css">
    <!--Estilo galeria-->
    <link rel="stylesheet" href="../dist/principal/css/gallery_common_errors.css">
    <!--Estilo componentes-->
    <link rel="stylesheet" href="../dist/css/components.css">
    
    <!--Estilo de carrito de compras-->
    <link href="../dist/css/carro_compras.css" rel="stylesheet">
</head>


<script type="text/javascript">
    $(function () {

        $('#da-slider').cslider({
            autoplay: true,
            bgincrement: 600
        });

    });
</script>
<!-- Owl Carousel Assets -->
<link href="../dist/principal/css/owl.carousel.css" rel="stylesheet">
<script src="../dist/principal/js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({
            items: 4,
            lazyLoad: true,
            autoPlay: true,
            navigation: true,
            navigationText: ["", ""],
            rewindNav: false,
            scrollPerPage: false,
            pagination: false,
            paginationNumbers: false,
        });

    });
</script>
<!-- //Owl Carousel Assets -->
<!----font-Awesome----->
<link rel="stylesheet" href="../dist/principal/fonts/css/font-awesome.min.css">
<!----font-Awesome----->
</head>
<?php 
include '../modelo/conexion.php';
include '../seguridad/userinfo.class.php';


$conn=new conexion();


//creamos el objeto usuario
$id_usuario=$_SESSION["id_usuario_reg"];
$cedula=$_SESSION["cedula_usuario_reg"];
$nombre=$_SESSION["nombre_usuario_reg"];
$nick_name=$_SESSION["nickname_usuario_reg"];
$email=$_SESSION["email_usuario_reg"];
$direccion=$_SESSION["direccion_usuario_reg"];
$telefono=$_SESSION["telefono_usuario_reg"];
$celular=$_SESSION["celular_usuario_registrado"];
$id_tarifa=$_SESSION["id_tarifa_usuario_reg"];
$fecha_registro=$_SESSION["fecha_registro"];

$infoUsuario= new UserInfo();

$infoUsuario->id_usuario=$id_usuario;
$infoUsuario->cedula=$cedula;
$infoUsuario->nombre=$nombre;
$infoUsuario->nick_name=$nick_name;
$infoUsuario->email=$email;
$infoUsuario->direccion=$direccion;
$infoUsuario->telefono=$telefono;
$infoUsuario->celular=$celular;
$infoUsuario->id_tarifa=$id_tarifa;
$infoUsuario->fecha_registro=$fecha_registro;
        
echo $infoUsuario->nick_name;
?>

<body>
    <div class="header_bg">
        <div class="container">
            <div class="row header">
                <div class="logo navbar-left">
                    <a href="index.php">    
                        <img src="../img/logo_cel_comunicaciones.png" style="width: 300px;    max-width: 100%;">
                    </a>		</div>
                <div class="h_search navbar-right">
                    <form>
                        <input type="text" class="text" value="Enter text here" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Enter text here';
                                }">
                        <input type="submit" value="search">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row h_menu">
            <nav class="navbar navbar-default navbar-left" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Inicio</a></li>
                       <!-- <li><a href="soporte.php">Soporte</a></li>-->
                       <li><a href="tienda.php">Tienda</a></li>
                       <li><a href="cuenta_usuario.php">Mi Cuenta</a></li>
                       <li><a href="carro.php">Carrito de Compras</a></li>
           
                        <li><a href="contact.php">Contacto</a></li>
                        <li><a href="../seguridad/salir.php">Salir</a></li>

                    </ul>
                    
         <!--   <a href="carro.php" class="btn navbar-btn btn-primary right">
                <i class="fa fa-shopping-cart"></i>
                <spam>4 Items en tu carrito</spam>
            </a>

            <div class="navbar-collapse collapse right"> 
                <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <div class="collapse clearfix" id="search">
                <form method="get" action="results.php" class="navbar-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" name="user_query" required>
                        <span class="input-group-btn">
                            <button type="submit" name="search" value="Buscar" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>-->
                </div><!-- /.navbar-collapse -->
                <!-- start soc_icons -->
            </nav>
            <div class="soc_icons navbar-right">
                <ul class="list-unstyled text-center">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li style="    margin-right: 14px;"><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>	
            </div>
        </div>
    </div>
    <?php startblock('content') ?>

    <?php endblock() ?>   
</body>


<?php  
include '../plantilla/footer_base_principal.php';
?>
</body>


<?php } ?>

<script>
 $("input[data-type='currency']").on({
        keyup: function () {
            formatCurrency($(this));
        },
        blur: function () {
            formatCurrency($(this), "blur");
        }
    });




    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.

        // get input value
        var input_val = input.val();

        // don't validate empty input
        if (input_val === "") {
            return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position 
        var caret_pos = input.prop("selectionStart");

        // check for decimal
        if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") {
                right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            input_val = left_side + "." + right_side;

        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = input_val;

            // final formatting
            if (blur === "blur") {
                input_val += ".00";
            }
        }

        // send updated string to input
        input.val(input_val);

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
</script>