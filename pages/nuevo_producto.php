<!--DOCTYPE html-->
<?php
include '../modelo/conexion.php';

$conn = new conexion();

$categorias = $conn->ejecutar_consulta_simple("SELECT * FROM categorias_producto WHERE estado='A'");
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <title>Crear Producto</title>
        <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>
    </head>
</html>

<body>    

    <div class="row"><!--row-->
        <div class="col-lg-12"><!--col-lg-12-->            
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>Tablero de Control / Crear Producto
                </li>
            </ol>
        </div><!--fin col lg 12-->
    </div><!--fin row-->

    <div class="row"><!--row-->
        <div class="col-lg-12"><!--col-lg-12-->            
            <div class="panel panel-default"><!--panel default-->
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i>Insertar Producto
                    </h3>
                </div>
            </div><!--fin panel default-->

            <div class="panel-body">
                <form method="post" id="form_nuevo_producto" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label">Nombre de Producto</label>
                        <div class="col-md-6">
                            <input name="product_tittle" id="product_tittle" type="text" class="form-control" >
                        </div>
                    </div><!--fin form group-->

                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label">Categoría</label>
                        <div class="col-md-6">
                            <select name="product_cat" id="product_cat" class="form-control"><!--select categoria-->
                                <option selected disabled>Seleccione Categoría</option>
                                <?php while ($cat = $categorias->fetch_assoc()) { ?>
                                    <option value="<?php echo $cat["id"] ?>"><?php echo $cat["nombre"] ?></option>
                                <?php }
                                ?>
                            </select><!--fin select categoria-->
                        </div>
                    </div><!--fin form group-->

                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label">Sub Categoría</label>
                        <div class="col-md-6">
                            <select name="product_sub_cat" id="product_sub_cat" class="form-control"><!--select categoria-->
                                <option>Seleccione Subcategoría</option>
                            </select><!--fin select categoria-->
                        </div>
                    </div><!--fin form group-->

                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label">Imagen de Producto N°1</label>
                        <div class="col-md-6">
                            <input name="product_img1" id="product_img1" type="file" class="form-control" >
                        </div>
                    </div><!--fin form group-->
                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label">Imagen de Producto N°2</label>
                        <div class="col-md-6">
                            <input name="product_img2" id="product_img2" type="file" class="form-control" >
                        </div>
                    </div><!--fin form group-->
                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label">Imagen de Producto N°3</label>
                        <div class="col-md-6">
                            <input name="product_img3" id="product_img3" type="file" class="form-control" >
                        </div>
                    </div><!--fin form group-->

                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label">Precio</label>
                        <div class="col-md-6">
                            <input name="product_price" id="product_price" type="text" class="form-control" >
                        </div>
                    </div><!--fin form group-->


                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label">Palabra Clave</label>
                        <div class="col-md-6">
                            <input name="product_keyword" id="product_keyword" type="text" class="form-control" >
                        </div>
                    </div><!--fin form group-->

                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label">Descripción</label>
                        <div class="col-md-6">
                            <textarea name="product_desc" id="product_desc" cols="19" rows="6" class="form-control" id="mytextarea"></textarea>
                        </div>
                    </div><!--fin form group-->

                    <div class="form-group"><!--form group-->
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input name="submit" value="Crear Producto" type="submit" class="btn btn-primary form-control">
                        </div>
                    </div><!--fin form group-->


                </form>
            </div>

        </div><!--fin col lg 12-->
    </div><!--fin row-->
</body>        
<!--tinymce-->
<script src="../plugins/jQuery/jquery-3.3.1.min.js"></script>
<script>
            $("#product_cat").change(function () {
                //tomamos el valor del elemento seleccionado
                var id_categoria_crea_sub = ($(this).val());

                $.ajax({
                    data: {id_categoria_crea_sub: id_categoria_crea_sub},
                    url: '../funciones/ajax_generales.php',
                    type: 'post',
                    success: function (response) {
                        $("#product_sub_cat").html(response);


                    }
                });
            });


            $("#form_nuevo_producto").submit(function (e) {
                e.preventDefault();
                //tomamos todos los datos del formulario
                var nombre_producto = $("#product_tittle").val();
                var categoria_producto = $("#product_cat").val();
                var sub_categoria_producto = $("#product_sub_cat").val();
                var imagen1 = $("#product_img1").val();
                var imagen2 = $("#product_img2").val();
                var imagen3 = $("#product_img3").val();
                var precio = $("#product_price").val();
                var descripcion = $("#product_desc").val();
                var palabra_clave = $("#product_keyword").val();
                var id_usuario = $("#product_tittle").val();

            });



</script>

<?php
if (isset($_POST["submit"])) {
    
}
?>