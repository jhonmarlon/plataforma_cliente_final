<?php

include '../librerias/ti.php';
include '../plantilla/base_principal.php';
?>

<?php startblock("content") ?>
<script>


    $(document).ready(function () {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();




        $(window).resize(function () {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                } else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            } else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }


    });

</script>
<style>
    .MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
    .MultiCarousel .MultiCarousel-inner .item { float: left;}
    .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:10px; background:#f1f1f1; color:#666;}
    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
    .MultiCarousel .leftLst { left:0; }
    .MultiCarousel .rightLst { right:0; }
    .item img, .item a, .item p {
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
        width: 100%;
    }

    .MultiCarousel .MultiCarousel-inner .item > div {
        text-align: center;
        padding: 5px;
        margin: 10px;
        background: #f1f1f1;
        color: #666;
        height: 200px;
    }
    .item img, .item a, .item p {
        height: 100px;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
        width: 100%;
    }

    .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }

    .imagenes

</style>


<script src="../plugins/multiple-emails/multiple-emails.js"></script>
<link rel="stylesheet" href="../plugins/multiple-emails/multiple-emails.css">

<div class="container">
    <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div style="text-align: center"><h3>Errores más comunes</h3><br>
                <label>Selecciona el error que presentas según sea tu caso, de lo contrario selecciona la opción "Otros"</label>
            </div>

            <div class="MultiCarousel-inner">
                <div class="item">
                    <div class="pad15">
                        <p class="lead"><img id="1" src="../dist/principal/images/renovar_membresia.png" style=""></p>
                        <p>
                            <label  style="color: #666">Renovar Membresía</label>
                            <button onclick="detalle_error('1')"   class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-forward"></span>Ver Detalles</button>    
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead"><img id="2" src="../dist/principal/images/error_transmision.jpg" style=""></p>
                        <p>
                            <label style="color: #666">Error de Conexión</label>
                            <button onclick="detalle_error('2')" class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-forward"></span>Ver Detalles</button>    
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead"><img id="3" src="../dist/principal/images/cuenta_desconocida.png" style=""></p>
                        <p>
                            <label style="color: #666">Cuenta Desconocida</label>
                            <button onclick="detalle_error('3')" class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-forward"></span>Ver Detalles</button>    
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead"><img id="4" src="../dist/principal/images/error_1011.png" style=""></p>
                        <p>
                            <label style="color: #666">Error 1011 (Móbiles)</label>
                            <button onclick="detalle_error('4')" class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-forward"></span>Ver Detalles</button>    
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead"><img id="5" src="../dist/principal/images/error_1012.jpg" style=""></p>
                        <p>
                            <label style="color: #666">Error 1012 (Móbiles)</label>
                            <button onclick="detalle_error('5')" class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-forward"></span>Ver Detalles</button>    
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Multi Item Carousel</p>
                        <p>₹ 1</p>
                        <p>₹ 6000</p>
                        <p>50% off</p>
                    </div>
                </div>

            </div>
            <button class="btn btn-primary leftLst"></button>
            <button class="btn btn-primary rightLst"></button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <hr/>
            <div class="read_more">
                <a  data-toggle="modal" data-target="#mdl_soporte_netflix" class="fa-btn btn-1 btn-1e">Otros</a>
            </div>
            <p><b>Importante</b></p>
            <p>Para generar un reporte , es necesario que diligencies correctamente la cuenta o cuentas a reportar</p>
            <p>La repuestas a tus reportes se almacenarán en la opción "Mis soluciones".</p>
        </div>
    </div>
</div>

<!-- Modal Soporte-->
<div id="mdl_soporte_netflix" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #3B3B3B;color: white" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Soporte Netflix</h4>
            </div>
            <form name="frm_error" id="frm_error" enctype="multipart/form-data" method="post" >
                <div class="modal-body" style="     margin-bottom: -20px;">

                    <label>Cuenta o cuentas a reportar <font color="red">*</font></label>
                    <input type="text" id="email" name="email"><br>

                    <label>Detalle de incidente <font color='red'>*</font></label>
                    <textarea name="detalle_error" id="detalle_error" style="float:left;width: 100%; 
                              height: 60px;resize: none;border-radius: 5px;" required></textarea><br><br><br><br><br><br>

                    <label>Adjuntar imagen de error <font color='red'>*</font></label>
                    <input type="file" id="img_error"  name="img_error[]" multiple required><br>

                    <div id="form_fotos"></div>
                </div><br>

                <div class="modal-footer" style="margin-top: -11px;">
                    <button type="button" title="Envía Reporte" onclick="envia_repor_netflix()" id="envia_reporte" class="btn " style="background-color: #FF5454;color: white">Enviar Reporte</button>
                    <button type="button" title="Cancelar" onclick="reload()" class="btn" style="background-color: #3B3B3B;color: white" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>

    </div>
</div>



<!--Modal detalles-->
<!-- Modal -->
<div id="mdl_detalle" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #3B3B3B;color: white" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Soporte Netflix - Detalles</h4>
            </div>
            <div class="modal-body">
                <h4>Nombre de error:</h4>

                <div style="margin-right: 15%; margin-left: 15%;">sd
                    <img style="width: 100%;" id="img_error_detalle" >
                </div>
                <p>Posible solución:</p>

                <section id="mensaje"></section>
            </div><br>
            <div class="modal-footer">
            </div>
        </div>

    </div>
</div>




<!--Modal detalles  de envio reporte-->
<!-- Modal -->
<div id="mdl_detalle_reporte" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #3B3B3B;color: white" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Soporte Netflix - Detalles envío reporte</h4>
            </div>
            <div class="modal-body" style="text-align: center;">
                <h5><b>Detalles de envío:</b></h5>
                <div id="result"></div>
            </div><br>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" title="Aceptar"  onclick="reload()"  class="btn " style="background-color: #FF5454;color: white">Aceptar</button>
            </div>
        </div>

    </div>
</div>



<!--Modal confirmacion-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirmacion">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="margin-top: 50px;">
            <div class="modal-header" style="background: #4b4242;color: white" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
            </div>
            <div class="modal-body"><label><b>Deseas enviar los datos diligenciados?</b></label></div>
            <div class="modal-footer" style="    margin-top: 0px;">
                <button type="button" class="btn btn-default" id="modal-btn-si">Si</button>
                <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
            </div>
        </div>
    </div>
</div>



<script>

    $(function () {
        $("#img_error").on("change", function () {
            //Limpiamos vista previa
            $("#form_fotos").html('');

            //capturamos todos los elementos del input file
            var archivos = document.getElementById("img_error").files;
            var navegador = window.URL || window.webkitURL;
            //Recogemos 1 a 1 los archivos
            for (x = 0; x < archivos.length; x++) {
                //validamos tamaño y tipo de archivo
                var size = archivos[x].size;
                var type = archivos[x].type;
                var name = archivos[x].name;

                if (size > 1024 * 1024) {
                    $("#form_fotos").append("<p style='color:red'>El achivo " + name + " supera el máximo permitido 1MB</p>");
                } else if (type != "image/jpeg" && type != "image/jpg" && type != "image/png" && type != "image/gif") {
                    $("#form_fotos").append("<p style='color:red'>El achivo " + name + " no es del tipo de imagen permitido</p>");
                } else {

                    var fileList = this.files;

                    var objeto_url = navegador.createObjectURL(archivos[x]);
                    //$("#form_fotos").append("<img style='vertical-align: middle;width: 20%;margin: 2px;' src=" + objeto_url + " width='250' height='250'>")
                    $("#form_fotos").append(
                            "<img style='vertical-align: middle;width: 20%;margin: 2px;' class='uploaded_foto' src='" + objeto_url + "'/>");
                    window.URL.revokeObjectURL(fileList[x]);
                }
            }

        });


        //Ajax 
        $("#envia_reporte").on("click", function () {

            var formData = new FormData($("#frm_error")[0]);
            //tomamos los valores del formulario
            var email = formData.get("email");
            var detalle_error = formData.get("detalle_error");
            var img_error = document.getElementById('img_error');

            //validamos los campos
            if (email == "" || email == "[]" || detalle_error == "" || img_error.value == "") {
                toastr.warning("Los campos marcados con un '*' son de carácter obligatorio!");
                return;
            }

            //mensaje de confirmación
            $("#confirmacion").modal('show');

            var modalConfirm = function (callback) {

                $("#modal-btn-si").on("click", function () {
                    callback(true);
                    $("#confirmacion").modal('hide');
                });

                $("#modal-btn-no").on("click", function () {
                    callback(false);
                    $("#confirmacion").modal('hide');
                });
            };

            modalConfirm(function (confirm) {
                if (confirm) {

                    //Acciones si el usuario confirma
                    var ruta = "backend/registra_error.php";
                    $.ajax({
                        url: ruta,
                        type: 'POST',
                        data: formData,
                        contentType: false, //necesarias para enviar archivo
                        processData: false,
                        success: function (datos) {
                            $("#mdl_soporte_netflix").modal("hide");
                            $("confirmacion").modal('hide');

                            $("#result").html(datos);
                            $("#mdl_detalle_reporte").modal("show");
                        }
                    });
                } else {
                    //Acciones si el usuario no confirma
                    $("#confirmacion").modal('hide');
                }
            });


        });



    });

  

    $('#email').multiple_emails();
    $('#current_emails').text($('#demo').val());
    $('#demo').change(function () {
        $('#current_emails').text($(this).val());
    });


    
    function reload() {
        location.reload();
    }

//modal que muetsra los errores mas comunes
    function detalle_error(val) {
        //tomamos el objeto img presionado
        var nodos = document.getElementById(val);
        //tomamos url de la imagen
        var atributo = nodos.attributes.getNamedItem("src").nodeValue;
        //tomamos el obgeto img del modal
        muestra_imagen = document.getElementById("img_error_detalle");
        //seteamos la url
        muestra_imagen.setAttribute("src", atributo);
        //mostramos modal
        $('#mdl_detalle').modal('show');
    }

</script>
<?php endblock() ?>






















