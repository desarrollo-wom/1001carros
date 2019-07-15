<?php
/**
 * @package 	WordPress
 * @subpackage 	1001theme
 * @version		1.0.0
 * 
 * Template Name: Trabaja-Layout
 * Created by Asdrubal Torres
 * 
 */
get_header();
$ruta_tema = get_theme_file_uri();
$host_url = get_home_url();
?>

<section id="cont-slider">
    <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/header-trabajaconnosotros-blanco.jpg"
        alt="header-blanco" style="width:100%;" class="img-header">
</section>
<section id="cont-slider-responsive">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100"
                    src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/header-trabajaconnosotros-responsive.jpg"
                    alt="First slide">
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="host_url" name="host_url" value="<?php echo $ruta_tema; ?>" />
<section id="contenido-trabaja">
    <div class="contenedor-form-trabaja">
        <form action="<?php echo $ruta_tema;?>/controller/procesatrabaja.php" enctype="multipart/form-data" method="POST" id="formtrabaja">
            <p>En 1001Carros.com buscamos el mejor talento para unirse a nuestro equipo.</p>
            <p>Queremos que formes parte de nuestra familia. ¡Envía tu hoja de vida!</p>
            <div class="row" style="margin-top: 30px;">
                <div class="col-12">
                    <input name="nombres" id="nombres" class="form-control control-contacto" placeholder="Nombres *" />
                    <div class="cont-error sr-only" id="error_nombres">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo nombres obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <input name="apellidos" id="apellidos" class="form-control control-contacto"
                        placeholder="Apellidos *" />
                    <div class="cont-error sr-only" id="error_apellidos">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo apellidos obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <input name="email" id="email" class="form-control control-contacto" placeholder="Correo *" />
                    <div class="cont-error sr-only" id="error_email">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo Correo obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <input name="telefono" id="telefono" class="form-control control-contacto" placeholder="Teléfono *"
                        onKeyPress="return checkIt(event)" maxlength="12" />
                    <div class="cont-error sr-only" id="error_telefono">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo teléfono obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <input name="ciudad" id="ciudad" class="form-control control-contacto" placeholder="Ciudad *" />
                    <div class="cont-error sr-only" id="error_ciudad">
                        <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo ciudad obligatorio</p>
                    </div>
                </div>
                <div class="col-12">
                    <label class="label-contacto" style="display: inline-block;float:left;margin:10px 15px 7px 0;">Sube
                        tu CV</label>
                    <input id="adjuntos" name="adjuntos[]" type="file">
                </div>
                <div class="col-12">
                    <p class="perror" style="text-align: left!important;">* Campos obligatorios</p>
                </div>
                <div class="col-12" style="margin-top: 10px;margin-bottom:0px!important;text-align: center;">
                    <a class="btn-new btn-enviar-trabaja" href="#" style="padding: 10px 40px;">Enviar</a>
                </div>
                <div class="col-12 sr-only" id="loading-form" style="text-align: center;width: 100%;margin-top: 35px;">
                    <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/Spinner-1s-200px.gif" alt="loader"
                        style="width: 40px;height: 40px;" />
                    <label class="label-contacto-inline">Enviando información</label>
                </div>
                <div class="col-12 sr-only" id="sent_ok" style="text-align: center;width: 100%;margin-top: 35px;">
                    <i class="fas fa-check" style="color:#5A9632;"></i>
                    <label class="label-contacto-inline">Información enviada correctamente.</label>
                </div>

            </div>
        </form>
       
    </div>
</section>
<?php
get_footer();
?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.js" type="text/javascript" />
</script>
<script src="<?php bloginfo('template_url'); ?>/js/fileinput.min.js" type="text/javascript" />
</script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript" />
</script>
<script src="<?php bloginfo('template_url'); ?>/js/trabaja.js" type="text/javascript" />
</script>