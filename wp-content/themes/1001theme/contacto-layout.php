<?php
/**
 * @package 	WordPress
 * @subpackage 	1001theme
 * @version		1.0.0
 * 
 * Template Name: Contacto-Layout
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
    <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/header-contacto-blanco.jpg" alt="header-blanco" style="width:100%;" class="img-header">
</section>
<section id="cont-slider-responsive">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/header-contacto-responsive.jpg" alt="First slide">
            </div>
        </div>
    </div>
</section>
<section id="contenido-contacto">
    <form action="" id="form-contacto" method="post">
    <input type="hidden" id="host_url" name="host_url" value="<?php echo $ruta_tema; ?>" />
    <div class="cont-padding">
        <h1 class="titulo-contacto">Dudas o comentarios</h1>
        <p class="subtitulo-contacto">Llena tus datos, deja un mensaje y uno de nuestros
            <br /> asesores se comunicará contigo.</p>
        <div class="text-center cont-select-agencias" style="margin-top: 45px;">
            <label class="label-contacto-inline">*Direccionar tu mensaje a:</label>
            <select name="mensaje_to" id="mensaje_to" class="form-control control-contacto-inline">
                <option value=0>[ Selecciona la agencia o taller ]</option>
                <?php while ($row = mysqli_fetch_row($agencias)) { ?>
                    <option value="<?php echo $row[0]; ?>"><?php if($row[8]==1){ echo "Agencia - "; } echo $row[1]; ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="cont-error sr-only" id="error_mensaje_to">
                <p class="perror"><i class="fas fa-exclamation-triangle"></i> Debe seleccionar una agencia o taller</p>
            </div>
        </div>
        <div class="row cont-campos">
            <div class="col-xs-12 col-sm-3 fila-form-control">
                <input name="nombres" id="nombres" class="form-control control-contacto" placeholder="Nombres *" />
                <div class="cont-error sr-only" id="error_nombres">
                    <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo nombres obligatorio</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 fila-form-control">
                <input name="apellidos" id="apellidos" class="form-control control-contacto" placeholder="Apellidos *" />
                <div class="cont-error sr-only" id="error_apellidos">
                    <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo apellidos obligatorio</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 fila-form-control">
                <input name="celular" id="celular" class="form-control control-contacto" placeholder="Celular *" onKeyPress="return checkIt(event)" maxlength="12"/>
                <div class="cont-error sr-only" id="error_celular">
                    <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo celular obligatorio</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 fila-form-control">
                <input name="email" id="email" class="form-control control-contacto" placeholder="Correo *" />
                <div class="cont-error sr-only" id="error_email">
                    <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo correo obligatorio</p>
                </div>
            </div>
        </div>
        <div class="row cont-text-area">
            <div class="col-12 ">
                <textarea name="mensaje" id="mensaje" style="height: 250px!important;" class="form-control control-contacto"
                          placeholder="Mensaje"></textarea>
            </div>
        </div>
        <div class="row" style="margin: 30px 0 0 0;">
            <div class="col-12 text-center">
                <div class="form-group">
                    <p class="perror">* Campos obligatorios</p>
                </div>
                <a class="btn-new btn-enviar-contacto" href="#">Enviar</a>
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
</form>
</section>

<?php
get_footer();
?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/contacto.js" type="text/javascript"/></script>

