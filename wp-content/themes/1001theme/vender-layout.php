<?php
/**
 * @package 	WordPress
 * @subpackage 	1001theme
 * @version		1.0.0
 * 
 * Template Name: Vender-Layout
 * Created by Asdrubal Torres
 * 
 */
get_header();
$ruta_tema = get_theme_file_uri();
$host_url = get_home_url();

include 'controller/connect.php';

//obtener el listado de las agencias
$sqlAgencias = "SELECT * FROM `agencias` ORDER BY `nombre`";
$agencias = mysqli_query($link, $sqlAgencias);

?>

<section id="cont-slider">
    <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/slider-vender-blanco.jpg"
         alt="header-blanco" style="width:100%;" class="img-header">
</section>
<input type="hidden" id="host_url" name="host_url" value="<?php echo $ruta_tema; ?>" />
<section id="cont-slider-responsive">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100"
                     src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/slider-vender-responsive.jpg"
                     alt="First slide">
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="host_url" name="host_url" value="<?php echo $ruta_tema; ?>" />
<section class="barras-amarillas active" id="barra-a-1">
    <div class="cont-padding">
        <div class="row pasos-desktop">
            <div class="col-6 text-left" style="align-self: center;">
                <p class="pasos-vender">1. Tu carro</p>
            </div>
            <div class="col-6 text-right" style="align-self: center;">
                <p class="progreso-pasos">Paso 1 de 3</p>
            </div>
        </div>
        <div class="row pasos-mobil">
            <div class="col-12">
                <p class="progreso-pasos" style="text-align: center;">Tu carro - Paso 1 de 3</p>
            </div>
        </div>
    </div>
</section>
<section class="paso1-auto">
    <div class="cont-padding">
        <p class="p23b">Por favor ingresa la información completa
            <br />del carro que quieres vender:</p>
        <div class="contenedor-placa-form">
            <label class="violeta">* Placa de tu carro:</label>
            <div style="text-align: center;position: relative;">
                <span id="span1"></span>
                <span id="span2"></span>
                <input type="text" name="placa" id="placa" placeholder="Ej: PIT-1234" class="control-placa" 
                       maxlength="8" />
            </div>
        </div>
        <div class="col5grid">
            <div class="item">
                <input type="text" name="year" id="year" class="form-control" placeholder="* Año:" maxlength="4" />
            </div>
            <div class="item">
                <input type="text" name="marca" id="marca" class="form-control" placeholder="* Marca:" />
            </div>
            <div class="item">
                <input type="text" name="modelo" id="modelo" class="form-control" placeholder="* Modelo:" />
            </div>
            <div class="item">
                <input type="text" name="kilometraje" id="kilometraje" class="form-control" placeholder="* Kilometraje:" />
            </div>
            <div class="item">
                <input type="text" name="color" id="color" class="form-control" placeholder="* Color:" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="cont-error sr-only" id="error_paso1">
                    <p class="perror" style="text-align: center!important;"><i class="fas fa-exclamation-triangle"></i> Falta información por ingresar</p>
                </div>
            </div>
        </div>
        <div style="text-align: center;margin: 50px 0 0 0;">
            <input type="hidden" name="placa_selected" id="placa_selected" value="" />
            <input type="hidden" name="year_selected" id="year_selected" value="" />
            <input type="hidden" name="marca_selected" id="marca_selected" value="" />
            <input type="hidden" name="modelo_selected" id="modelo_selected" value="" />
            <input type="hidden" name="kilometraje_selected" id="kilometraje_selected" value="" />
            <input type="hidden" name="color_selected" id="color_selected" value="" />

            <a href="#" class="btn-new" id="cont1">Continuar</a>
        </div>
    </div>
</section>
<section class="barras-amarillas" id="barra-a-2">
    <div class="cont-padding">
        <div class="row pasos-desktop">
            <div class="col-8 text-left" style="align-self: center;">
                <p class="pasos-vender">2. Preguntas sobre tu carro</p>
            </div>
            <div class="col-4 text-right" style="align-self: center;">
                <p class="progreso-pasos">Paso 2 de 3</p>
            </div>
        </div>
        <div class="row pasos-mobil">
            <div class="col-12">
                <p class="progreso-pasos" style="text-align: center;">Preguntas sobre tu carro - Paso 2 de 3</p>
            </div>
        </div>
    </div>
</section>
<section class="paso2-auto">
    <input name="accidente_selected" id="accidente_selected" value="" type="hidden">
    <input name="fallamec_selected" id="fallamec_selected" value="" type="hidden">
    <input name="nollaves_selected" id="nollaves_selected" value="" type="hidden">
    <input name="fumadocarro_selected" id="fumadocarro_selected" value="" type="hidden">
    <input name="condcarro_selected" id="condcarro_selected" value="" type="hidden">

    <div class="cont-padding">
        <p class="p23b intropaso2" id="intro-paso2">Por favor cuéntanos más sobre tu carro:</p>
        <div class="cont-pregunta1-paso2">
            <p>¿Qué valor esperas recibir por tu carro? *</p>
            <input type="text" class="form-control control-inline" name="valoresperado" id="valoresperado" placeholder="USD" />
            <div class="cont-error sr-only" id="error_valoresperado">
                <p class="perror" style="text-align: center!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
            </div>
        </div>
        <div class="cont-grid-left">
            <p class="p23b-ib">¿Tuvieron algún accidente? *</p>
            <div class="cont-botones-inline">
                <a href="#" class="btn-ctr btn-algun-accidente" alt="No">No</a>
                <a href="#" class="btn-ctr btn-algun-accidente" alt="1">1</a>
                <a href="#" class="btn-ctr btn-algun-accidente" alt="2+">2+</a>
            </div>
            <div class="cont-error sr-only" id="error_algunaccidente">
                <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
            </div>
        </div>
        <div></div>
        <div class="cont-grid-left">
            <p class="p23b-ib">¿Tu carro tiene alguna falla mecánica? *</p>
            <a href="#" class="btn-ctr btn-falla-mec" alt="Si">Si</a>
            <a href="#" class="btn-ctr btn-falla-mec" alt="No">No</a>
            <div class="cont-error sr-only" id="error_fallamecanica">
                <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
            </div>
        </div>
        <div></div>
        <div class="cont-grid-left">
            <p class="p23b-ib">¿Cuántas llaves tienes para este carro? *</p>
            <a href="#" class="btn-ctr btn-no-llaves" alt="1">1</a>
            <a href="#" class="btn-ctr btn-no-llaves" alt="2+">2+</a>
            <div class="cont-error sr-only" id="error_nollaves">
                <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
            </div>
        </div>
        <div></div>
        <div class="cont-grid-left">
            <p class="p23b-ib">¿Han fumado dentro de este carro? *</p>
            <a href="#" class="btn-ctr btn-fumado-carro" alt="Si">Si</a>
            <a href="#" class="btn-ctr btn-fumado-carro" alt="No">No</a>
            <div class="cont-error sr-only" id="error_fumadocarro">
                <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
            </div>
        </div>

        <p class="p23b pcondiciones" style="text-align: left;margin-top: 55px;">¿En qué condiciones está el
            carro?<br />
            (Selecciona una de las tres opciones) *</p>

        <div class="col2gridcondiciones" style="margin-top: 35px;">
            <div class="item1">
                <p class="p14-366"><span>1-</span> Aún atraes todas las miradas con tu carro. Hoy también te
                    preguntaron en la calle si lo
                    vendes, ¿verdad?
                    Está como nuevo, huele a nuevo y funciona a la perfección.</p>
                <div class="cont-radio">
                    <input type="radio" name="opcionestado" id="opcionestado"> <label class="label-radio-condiciones">¡COMO
                        NUEVO!</label>
                </div>
            </div>
            <div class="item2">
                <a href="#" class="btn-ctr-large btn-cond-carro" alt="Como nuevo">¡COMO NUEVO!</a>
            </div>
        </div>

        <div class="col2gridcondiciones">
            <div class="item1">
                <p class="p14-366"><span>2-</span> No está en su mejor momento, pero anda bastante bien. Un
                    golpecito o rayón no ocultan que se
                    trata
                    de un buen carro. Se nota que le “sacaste el aire” y ya tiene pinta de que es hora de
                    cambiar.</p>
                <div class="cont-radio">
                    <input type="radio" name="opcionestado" id="opcionestado"> <label class="label-radio-condiciones">BASTANTE
                        BIEN</label>
                </div>
            </div>
            <div class="item2">
                <a href="#" class="btn-ctr-large btn-cond-carro" alt="Bastante bien">BASTANTE BIEN</a>
            </div>
        </div>
        <div class="col2gridcondiciones">
            <div class="item1">
                <p class="p14-366"><span>3-</span> Su mejor época ya pasó. Necesita reparaciones, repuestos y
                    nueva pintura. Aunque te llevó por
                    muchos
                    caminos, no parece que vaya a llevarte muy lejos esta vez.</p>
                <div class="cont-radio">
                    <input type="radio" name="opcionestado" id="opcionestado"> <label class="label-radio-condiciones">NO
                        TAN BIEN</label>
                </div>
            </div>
            <div class="item2">
                <a href="#" class="btn-ctr-large btn-cond-carro" alt="No tan bien">NO TAN BIEN</a>
            </div>
        </div>
        <div class="row" style="margin-top: 35px;">
            <div class="col-12">
                <div class="cont-error sr-only" id="error_condiciones">
                    <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Debe seleccionar al menor una condición del carro</p>
                </div>
            </div>
        </div>
        <div style="text-align: center;margin: 50px 0 0 0;">
            <a href="#" class="btn-new" id="cont2">Continuar</a>
        </div>
    </div>
</section>
<section class="barras-amarillas" id="barra-a-3">
    <div class="cont-padding">
        <div class="row pasos-desktop">
            <div class="col-6 text-left" style="align-self: center;">
                <p class="pasos-vender">3. Tus datos</p>
            </div>
            <div class="col-6 text-right" style="align-self: center;">
                <p class="progreso-pasos">Paso 3 de 3</p>
            </div>
        </div>
        <div class="row pasos-mobil">
            <div class="col-12">
                <p class="progreso-pasos" style="text-align: center;">Tus datos - Paso 3 de 3</p>
            </div>
        </div>
    </div>
</section>
<section class="paso3-auto">
    <div class="cont-padding">
        <p class="p23b">Ingresa tu información personal:</p>
        <div class="grid-4-personal">
            <div class="item">
                <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres" />
                <div class="cont-error sr-only" id="error_nombres">
                    <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
                </div>
            </div>
            <div class="item">
                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" />
                <div class="cont-error sr-only" id="error_apellidos">
                    <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
                </div>
            </div>
            <div class="item">
                <input type="text" name="celular" id="celular" class="form-control" placeholder="Celular" />
                <div class="cont-error sr-only" id="error_celular">
                    <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
                </div>
            </div>
            <div class="item">
                <input type="text" name="email" id="email" class="form-control" placeholder="Correo" />
                <div class="cont-error sr-only" id="error_email">
                    <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
                </div>
            </div>
        </div>
        <div class="grid-2-personal">
            <div class="item">
                <label class="label-agencia">Agencia:</label>
                <select class="form-control select-agencia" name="agencia2" id="agencia2">
                    <option value="0">Seleccione la agencia más cercana a usted</option>
                    <?php while ($row = mysqli_fetch_row($agencias)) { ?>
                    <option value="<?php echo $row[1]; ?>"><?php if($row[8]==1){ echo "Agencia - "; } echo $row[1]; ?></option>
                    <?php
                }
                ?>
                </select>
                <div class="cont-error sr-only" id="error_agencia2">
                    <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
                </div>
            </div>
            <div class="item">
                <label class="label-agencia">¿Quieres cambiar tu carro por un seminuevo de 1001Carros.com?</label>
                <div>
                    <a href="#" class="btn-ctr btn-cambiar-carro" alt="Si">Si</a>
                    <a href="#" class="btn-ctr btn-cambiar-carro" alt="No">No</a>
                    <input type="hidden" name="cambiarcarro"  id="cambiarcarro" value="" />
                </div>
                <div class="cont-error sr-only" id="error_cambiarcarro">
                    <p class="perror" style="text-align: left!important;"><i class="fas fa-exclamation-triangle"></i> Campo requerido</p>
                </div>
            </div>
        </div>
        <div style="text-align: center;margin: 50px 0 0 0;">
            <a href="#" class="btn-new btn-finalizar">Finalizar</a>
        </div>
    </div>
</section>
<div class="contenedor-modal">
        <div class="modal-personalizado">
            <a href="#" class="btn-close"><i class="fas fa-times"></i></a>
            <div class="cont-icono">
                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/07/icono-OKOK.png" alt="icono-OKOK">
            </div>
            <h1 class="titulo-popup">¡Felicidades!</h1>
            <div class="cont-popup" style="margin-bottom: 45px!important;">
                <p>Tu seminuevo está en perfectas condiciones.</p>
                <p>Pronto nos contactaremos contigo.</p>
            </div>
        </div>
    </div>

<?php
get_footer();
?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.js" type="text/javascript" /></script>
<script src="<?php bloginfo('template_url'); ?>/js/fileinput.min.js" type="text/javascript" /></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript" /></script>
<script src="<?php bloginfo('template_url'); ?>/js/vender.js" type="text/javascript" /></script>