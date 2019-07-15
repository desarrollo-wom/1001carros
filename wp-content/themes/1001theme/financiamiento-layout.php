<?php
/**
 * @package 	WordPress
 * @subpackage 	1001theme
 * @version		1.0.0
 * 
 * Template Name: Financiamiento-Layout
 * Created by Asdrubal Torres
 * 
 */

get_header();
$ruta_tema = get_theme_file_uri();
$host_url = get_home_url();

$iva= constant('WP_IVA');

include 'controller/connect.php';

//obtener el listado de las agencias

$sqlAgencias = "SELECT * FROM `agencias`";
$agencias = mysqli_query($link, $sqlAgencias);
?>

<section id="cont-slider">
    <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/slider-financiamiento-blanco.jpg" alt="header-financiamiento" style="width:100%;" class="img-header">
</section>
<section id="cont-slider-responsive">
    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/slider-financiamiento-mobil.jpg" alt="First slide">
            </div>
        </div>
    </div>
</section>
<section id="contenido-financiamiento">
    <input type="hidden" name="iva" id="iva" value="<?php echo $iva; ?>"/>
    <div class="cont-padding">
        <h1 class="titulo-financiamiento">Calcula tu cuota</h1>
        <p class="subtitulo-financiamiento">Completa los datos para saber cuánto pagarás mensualmente*.</p>
        <p class="subtitulo-financiamiento">Aplican restricciones*.</p>
        <div class="valor-auto">
            <p class="p-violeta">Valor del carro que quieres comprar:</p>
            <input type="text" name="valortotal" id="valortotal" class="form-control" style="display: inline-block;width:auto;margin-left:10px;"
                   value="0" maxlength="6" onKeyPress="return checkIt(event)">
            <input type="hidden" name="vtotal" id="vtotal" value="" />
        </div>
        <div class="grid-3-slider">
            <div class="item">
                <p class="lbl-slider">Entrada:</p>
                <input id="ex1" data-slider-id='ex1Slider' type="text" />
                <div class="cont-labels">
                    <div class="row">
                        <div class="col-4 text-left">
                            <span class="label-slider" id="valorminimoentrada"></span>
                        </div>
                        <div class="col-4 text-center">
                            <span class="label-slider" id="valormedioentrada"></span>
                        </div>
                        <div class="col-4 text-right">
                            <span class="label-slider" id="valormaximoentrada"></span>
                        </div>
                    </div>
                </div>
                <input type="text" id="entrada-value" name="entrada-value" class="form-control" value="$0"
                       style="margin: 15px auto;max-width:80%;" readonly="true"/>
                <input type="hidden" name="entradavalue" id="entradavalue" value="" />
            </div>
            <div class="item">
                <p class="lbl-slider">Meses plazo:</p>
                <input id="ex2" data-slider-id='ex2Slider' type="text" />
                <div class="cont-labels">
                    <div class="row" style="margin-left: -30px;">
                        <div class="col-2 text-left">
                            <span class="label-slider">12</span>
                        </div>
                        <div class="col-4 text-center">
                            <span class="label-slider">24</span>
                        </div>
                        <div class="col-4 text-center">
                            <span class="label-slider">36</span>
                        </div>
                        <div class="col-2 text-right">
                            <span class="label-slider">48</span>
                        </div>
                    </div>
                </div>
                <input type="text" id="meses-value" name="meses-value" class="form-control" value="12 meses" style="margin: 15px auto;max-width:80%;" readonly="true"/>
                <input type="hidden" name="mesesvalue" id="mesesvalue" value="12" />
            </div>
            <div class="item">
                <p class="lbl-slider">Rastreo satelital(meses):</p>
                <input id="ex3" data-slider-id='ex3Slider' type="text"/>
                <div class="cont-labels">
                    <div class="row" style="margin-left: -30px;">
                        <div class="col-2 text-left">
                            <span class="label-slider">12</span>
                        </div>
                        <div class="col-4 text-center">
                            <span class="label-slider">24</span>
                        </div>
                        <div class="col-4 text-center">
                            <span class="label-slider">36</span>
                        </div>
                        <div class="col-2 text-right">
                            <span class="label-slider">48</span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="meses_rastreo" id="meses_rastreo" value="12" />
                <input type="hidden" name="costoR" id="costoR" value="0" />
                <input type="text" id="costo_rastreo" name="costo_rastreo" class="form-control" value="$0" style="margin: 15px auto;max-width:80%;" readonly="true"/>
            </div>
        </div>
        <div class="grid-3-slider" style="margin-top: 35px;">
            <div class="item"></div>
            <div class="item">
                <p class="lbl-slider">Cuota mensual referencial:</p>
                <input type="text" id="cuota-value" name="cuota-value" class="form-control" value="0" style="margin: 15px auto;max-width:80%;font-weight: bold;color:#2d257d;font-size: 20px;" readonly="true"/>
                <input type="hidden" name="cuotavalue" id="cuotavalue" value="" />
            </div>
            <div class="item"></div>
        </div>
        <p class="psmall">Utiliza el financiamiento de 1001Carros (Casabaca), tu banco de
            preferencia o efectivo. En cualquier opción que
            escojas, nosotros
            <br /> te ayudaremos a que el proceso sea lo más simple y rápido posible.
        </p>
        <p class="psmall" style="margin-top: 0;">* La cuota mensual varía según los requerimientos de la
            financiera.</p>
        <p class="psmall" style="margin-top: 0;">* No incluye seguro, rastreo satelital ni gastos
            administrativos.</p>
    </div>
</section>
<section id="contenido-con-re">
    <div class="cont-padding">
        <div class="cont-menu-vc" style="margin-bottom: 0;">
            <ul class="menu-vender-comprar">
                <li class="active btn-condiciones-fin">CONDICIONES</li>
                <li class="btn-requisitos-fin" style="border-left: none;">REQUISITOS</li>
            </ul>
            <div id="cont-cond-fin">
                <div class="grid-5-cond">
                    <div class="item">
                        <div class="cuadro-paso">
                            <span>35%</span>
                        </div>
                    </div>
                    <div class="item relativo">
                        <div class="linea-separadora">&nbsp;</div>
                    </div>
                    <div class="item">
                        <div class="cuadro-paso">
                            <span>16.06%</span>
                        </div>
                    </div>
                    <div class="item relativo">
                        <div class="linea-separadora">&nbsp;</div>
                    </div>
                    <div class="item">
                        <div class="cuadro-paso">
                            <span>48</span>
                        </div>
                    </div>
                </div>
                <div class="grid-5-cond" style="margin-top:-10px;">
                    <div class="item">
                        <p class="lbl-slider">Valor de entrada</p>
                    </div>
                    <div class="item"></div>
                    <div class="item">
                        <p class="lbl-slider">Tasa</p>
                    </div>
                    <div class="item"></div>
                    <div class="item">
                        <p class="lbl-slider">Meses Plazo</p>
                    </div>
                </div>
                <div>
                    <p class="p-legal">* No incluye gastos de legalización y seguro.</p>
                </div>
            </div>
            <div id="cont-requisitos-fin" class="sr-only">
                <div class="grid-7-cond">
                    <div class="item">
                        <div class="cuadro-paso">
                            <div class="cont-img-paso-abso">
                                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-req-pas1.png" alt="paso1">
                            </div>
                        </div>
                    </div>
                    <div class="item relativo">
                        <div class="linea-separadora">&nbsp;</div>
                    </div>
                    <div class="item">
                        <div class="cuadro-paso">
                            <div class="cont-img-paso-abso">
                                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-req-pas2.png" alt="paso2">
                            </div>
                        </div>
                    </div>
                    <div class="item relativo">
                        <div class="linea-separadora">&nbsp;</div>
                    </div>
                    <div class="item">
                        <div class="cuadro-paso">
                            <div class="cont-img-paso-abso">
                                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-req-pas3.png" alt="paso3">
                            </div>
                        </div>
                    </div>
                    <div class="item relativo">
                        <div class="linea-separadora">&nbsp;</div>
                    </div>
                    <div class="item">
                        <div class="cuadro-paso">
                            <div class="cont-img-paso-abso">
                                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-req-pas4.png" alt="paso4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-7-cond">
                    <div class="itm">
                        <p class="lbl-slider">Solicitud de crédito
                            Casabaca</p>
                    </div>
                    <div class="itm"></div>
                    <div class="itm">
                        <p class="lbl-slider">Copia de cédula y
                            papeleta de votación</p>
                    </div>
                    <div class="itm"></div>
                    <div class="itm">
                        <p class="lbl-slider">Planilla de servicios
                            básicos (luz, agua, etc.)</p>
                    </div>
                    <div class="itm"></div>
                    <div class="itm">
                        <p class="lbl-slider">Justificación de
                            ingresos y patrimonio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contenido-con-re-mobil" style="padding:  10px 0;">
    <div class="cont-padding">
        <div class="contenedor-cond-req-ficha">
            <div class="item">
                <p class="subtitulo-cond-req-fich">Condiciones:</p>
                <p class="des-cond-req-fich">· Valor de entrada: 30 %</p>
                <p class="des-cond-req-fich">· Tasa: 16,06 %</p>
                <p class="des-cond-req-fich">· Plaza: 48 meses</p>
                <p class="des-cond-req-fich cond-last">El valor no incluye gastos de legalización y seguro</p>
            </div>
            <div class="item">
                <p class="subtitulo-cond-req-fich">Requisitos:</p>
                <p class="des-cond-req-fich">· Solicitud de crédito Casabaca.</p>
                <p class="des-cond-req-fich">· Copia de tu cédula y papeleta de votación.</p>
                <p class="des-cond-req-fich">· Planilla de servicios básicos (luz, agua, etc.)</p>
                <p class="des-cond-req-fich">· Justificación de ingresos y patrimonio</p>
            </div>
        </div>
    </div>
</section>
<section id="cont-form-precalificacion">
    <div class="cont-padding">
        <h1 class="titulo-financiamiento">Precalificación</h1>
        <div class="contenedor-form-trabaja">
            <div class="row" style="margin-top: 30px;">
                <div class="col-12">
                    <input name="nombres" id="nombres" class="form-control control-contacto" placeholder="Nombres *" />
                    <div class="cont-error sr-only" id="error_nombres">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo nombres obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <input name="apellidos" id="apellidos" class="form-control control-contacto" placeholder="Apellidos *" />
                    <div class="cont-error sr-only" id="error_apellidos">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo apellidos obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <input name="cedula" id="cedula" class="form-control control-contacto" placeholder="Cédula *" maxlength="11"/>
                    <div class="cont-error sr-only" id="error_cedula">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo cédula obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <input name="email" id="email" class="form-control control-contacto" placeholder="Correo *" />
                    <div class="cont-error sr-only" id="error_email">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo correo obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <input name="celular" id="celular" class="form-control control-contacto" placeholder="Celular *" maxlength="11"/>
                    <div class="cont-error sr-only" id="error_celular">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo celular obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="aceptarterminos" name="aceptarterminos" value="1">
                        <label class="custom-control-label" for="aceptarterminos"><a href="#" target="_blank"
                                                                                   class="enlace-acepto">Acepto términos y condiciones</a></label>
                    </div>
                    <div class="cont-error sr-only" id="error_customCheck11">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Debe de aceptar los términos y condiciones</p>
                    </div>
                </div>
                <div class="col-12" style="margin-top: 10px;margin-bottom:0px!important;text-align:center;">
                    <input type="hidden" id="host_url" name="host_url" value="<?php echo $ruta_tema; ?>" />
                    <a class="btn-new btn-precalificacion" href="#" style="padding: 10px 40px;">Enviar</a>
                </div>
                <div class="form-group sr-only" id="loading-form" style="text-align: center;width: 100%;margin-top: 35px;">
                    <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/Spinner-1s-200px.gif" alt="loader" style="width: 40px;height: 40px;" />
                    <label class="label-contacto-inline">Enviando información</label>
                </div>
                <div class="form-group sr-only" id="sent_ok" style="text-align: center;width: 100%;margin-top: 35px;">
                    <i class="fas fa-check" style="color:#5A9632;"></i>
                    <label class="label-contacto-inline">Información enviada correctamente.</label>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
   get_footer();
?>
<script src="<?php bloginfo('template_url'); ?>/dependencies/js/jquery.min.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/highlight.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap-slider.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/financiamiento.js" type="text/javascript"/></script>


