<?php
/**
 * @package 	WordPress
 * @subpackage 	1001theme
 * @version		1.0.0
 * 
 * Template Name: Gracias-Trabaja-Layout
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
        <form action="/controller/procesatrabaja.php" enctype="multipart/form-data" method="POST" id="formtrabaja">
            <p>En 1001Carros.com buscamos el mejor talento para unirse a nuestro equipo.</p>
            <p>Gracias por ponerce en contacto con nosotros</p>
            <div class="row" style="margin-top: 30px;">
                
              
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