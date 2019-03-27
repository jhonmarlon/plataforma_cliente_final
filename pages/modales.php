<?php
$conn = new conexion();
?>
<!--Modal registro proveedor-->
<div class="modal fade" id="registro_proveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i>
                            Formulario de Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"   data-toggle="modal"   href="#terminos_condiciones_proveedor" role="tab"><i class="fa fa-file-text mr-1"></i>
                            Terminos y Condiciones</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body mb-1">
                            <h4 style="text-align: center">Formulario de registro nuevo Distribuidor / Propietario</h4><br>

                            <form id="form_nuevo_distribuidor" method="post">
                                <div class="form-group has-feedback">
                                    <input onKeyUp="this.value = this.value.toUpperCase();" type="text" name="nombre_prop"  class="form-control" placeholder="Nombre de Distribuidor"  required>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>  
                                <div class="form-group has-feedback">
                                    <input onKeyUp="this.value = this.value.toUpperCase();" type="text"  name="apellido_prop" class="form-control" placeholder="Apellido de Distribuidor"  required>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>  

                                <div class="row">
                                    <div class="col-md-6">  
                                        <div class="form-group has-feedback">
                                            <input  type="number" name="cedula_prop" class="form-control" placeholder="Cédula de Distribuidor"  required>
                                            <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                                        </div>  
                                    </div>

                                    <div class="col-md-6">  
                                        <div class="form-group has-feedback">
                                            <input type="email"  name="email_prop" class="form-control" placeholder="Email"  required>  
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-6">  
                                        <div class="form-group has-feedback">
                                            <input type="password" name="contrasena_prop" class="form-control" placeholder="Contraseña" required>
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">  
                                        <div class="form-group has-feedback">
                                            <input type="password"  name="repcontrasena_prop" class="form-control" placeholder="Confirmar contraseña"  required>
                                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">  
                                        <div class="form-group has-feedback">
                                            <input type="number"  name="telefono_prop" class="form-control" placeholder="Número telefónico" required>
                                            <span class="glyphicon glyphicon glyphicon-earphone form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">  
                                        <div class="form-group has-feedback">
                                            <input type="number"  name="celular_prop" class="form-control" placeholder="Celular"  required>
                                            <span class="glyphicon glyphicon glyphicon-phone form-control-feedback"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-feedback">
                                    <input onKeyUp="this.value = this.value.toUpperCase();" pattern="[A-Z0-9]{5}" placeholder="Ingrese código de distribuidor ejm 'ABCDE' " type="text"  name="codigo_distribuidor" class="form-control"  required>
                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">  


                                        <div class="checkbox icheck">
                                            <label>
                                                <input style="margin-left: 0px"  type="checkbox" id="solita_credito" name="check" ><label>Solicitar Crédito</label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">  
                                        <div class="form-group has-feedback">
                                            <div class="input-group"> 
                                                <span class="input-group-addon">$</span>
                                                <input type="text" readonly class="form-control" id="monto_solicitado_prop" name='monto_solicitado_prop' placeholder="Monto a solicitar"   class="form-control"  style="width: 100%;"  data-type="currency" >
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-info" 
                                            style=' background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3484fc), color-stop(1, #12306a) );' >Enviar Solicitud <i class="fa fa-mail-forward ml-1"></i></button>
                                </div>  
                                <div id="resultado_reg_distribuidor">1</div>
                            </form>

                        </div>
                        <!--Footer-->
                        <div class="modal-footer">

                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
                        </div>

                    </div>

                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login / Register Form-->


<!-- Modal  Terminos y condiciones-->
<div class="modal fade" id="terminos_condiciones_proveedor" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center">Terminos y condiciones</h4>
            </div>
            <div class="modal-body" style="text-align: justify">
                <p>Para ser proveedor de nuestra compañia, es necesario que usted como nuevo usuario cumpla con ciertos requerimientos.</p>
                <p>1) Usted deberá realizar un previo adelanto de efectivo que nos de la certeza de que hará parte de nuestro equipo de proveedores.</p>
                <p>2)El pago de este podrá realizarce por medio de una transferencia bancaria al número de cuenta "cuenta ejemplo" y adjuntando 
                    por medio del formulario actual el comprobante de pago para poder generar sus credenciales de ingreso a nuestro sistema de operación con el saldo respectivo que usted haya realizado.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>




<!--MODAL PARA COMPRAR CUENTAS NETFLIX-->
<!-- Modal Soporte-->
<div id="mdl_comprar_cuenta_netflix" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #3B3B3B;color: white" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comprar Cuenta Netflix - Solicitud de Compra</h4>
            </div>
            <form name="frm_comprar_cuentas" id="frm_error" enctype="multipart/form-data" method="post" >

                <div class="modal-body" style="margin-bottom: -20px;">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"  > 
                            <label>Cantidad de cuentas a comprar</label>
                            <input type="number" min="1" class="form-control"   id="cantidad_cuentas_comprar" >
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <label>Valor</label>
                            <div class="input-group"> 
                                <span class="input-group-addon">$</span>
                                <input readonly type="text"  class="form-control" id="valor" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" >
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <label><b>Forma de pago:</b></label><br><br>
                            <label>Puedes realizar tus pagos acercandote a una de nuestras oficinas, 
                                o adjuntando tu comprobante de pago mediante la opción "Adjuntar Comprobante".</label>
                        </div><br>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">

                            <label><b><font color='red'>Importante: </font>Una vez realices la solicitud, ésta quedará pendiente de aprobación por parte del asesor o distribuidor encargado. </b></label>

                        </div>
                    </div><br>

                    <label>Adjuntar comprobante de pago<font color='red'>*</font></label>
                    <input type="file" id="img_error"  name="img_error[]" multiple required><br>

                    <div id="form_fotos"></div>
                </div><br>

                <div class="modal-footer" style="margin-top: -11px;">
                    <button type="button" title="Envía Reporte" onclick="envia_solicitud_compra_netflix()" id="envia_solicitud_compra_netflix" class="btn " style="background-color: #FF5454;color: white">Enviar Solicitud</button>
                    <button type="button" title="Cancelar" onclick="reload()" class="btn" style="background-color: #3B3B3B;color: white" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>

    </div>
</div>
