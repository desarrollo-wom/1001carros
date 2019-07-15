<?php
/**
 * @package 	WordPress
 * @subpackage 	1001theme
 * @version		1.0.0
 * 
 * Template Name: Agencias-Layout
 * Created by Asdrubal Torres
 * 
 */
get_header();
$ruta_tema = get_theme_file_uri();
$host_url = get_home_url();

include 'controller/connect.php';

$sqlAgencias = "SELECT * FROM `agencias` ORDER BY `nombre`";
$sqlAgencias2 = "SELECT * FROM `agencias`";
$agencias = mysqli_query($link, $sqlAgencias);
$agencias2 = mysqli_query($link, $sqlAgencias);

?>

<section id="cont-slider">
    <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/07/w1001_agencias_d.jpg" alt="header-blanco" style="width:100%;" class="img-header">
</section>
<section id="cont-slider-responsive">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $host_url; ?>/wp-content/uploads/2019/07/w1001_agencias_mv.jpg" alt="First slide">
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="host_url" name="host_url" value="<?php echo $ruta_tema; ?>" />
<input type="hidden" id="host" name="host" value="<?php echo $host_url; ?>" />
<section id="contenido-agencias">
    <div class="grid-2-col-agencias">
        <div class="item">
            <div class="accordion" id="accordion">
                <div class="card">
                    <div class="card-header" id="heading8">
                        <h5 class="mb-0">
                            <button class="btn-cabecera btn btn-link filter" style="background-color:#ffcd00!important;opacity: 1;color:#2d257d!important;"
                                    type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true"
                                    aria-controls="collapse8" disabled>
                                Agencias
                            </button>
                        </h5>
                    </div>
                </div>
                <?php while ($row = mysqli_fetch_row($agencias)) { ?>
                    <?php
                    if ($row[8] == 1) {

                        $heading = "heading" . $row[0];
                        $collapse = "collapse" . $row[0];
                        ?>
                        <div class="card">
                            <div class="card-header" id="<?php echo $heading; ?>">
                                <h5 class="mb-0">
                                    <button class="btn btn-link filter" type="button" data-toggle="collapse"
                                            data-target="#<?php echo $collapse; ?>" aria-expanded="false" aria-controls="<?php echo $collapse; ?>">
                                       <?php echo 'Agencia - '.$row[1]; ?>
                                    </button>
                                </h5>
                            </div>
                            <div id="<?php echo $collapse; ?>" class="collapse <?php if ($row[0] == 1) {
            echo "show";
        } ?>" aria-labelledby="<?php echo $heading; ?>" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="block">
                                                <p class="acordion-menu-title">Dirección:</p>
                                                <p class="acordion-menu-p"><?php echo $row[2]; ?></p>
                                            </div>
                                            <div class="block">
                                                <p class="acordion-menu-title">Teléfono:</p>
                                                <p class="acordion-menu-p"><?php echo $row[3]; ?></p>
                                            </div>
                                            <div class="block">
                                                <p class="acordion-menu-title">Correo:</p>
                                                <p class="acordion-menu-p"><?php echo $row[4]; ?></p>
                                            </div>
                                            <div class="block">
                                                <p class="acordion-menu-title">Horarios:</p>
                                                <p class="acordion-menu-p"><?php echo $row[5]; ?></p>
                                                <p class="acordion-menu-p"><?php echo $row[6]; ?></p>
                                                <p class="acordion-menu-p"><?php echo $row[7]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cont-mapa-mobil" id="cont-map-mobil-<?php echo $row[0];?>" alt="c"></div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="card">
                    <div class="card-header" id="heading8">
                        <h5 class="mb-0">
                            <button class="btn-cabecera btn btn-link filter" style="background-color:#ffcd00!important;opacity: 1;color:#2d257d!important;"
                                    type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true"
                                    aria-controls="collapse8" disabled>
                                Talleres
                            </button>
                        </h5>
                    </div>
                </div>
                <?php while ($row = mysqli_fetch_row($agencias2)) { ?>
                    <?php
                    if ($row[8] == 0) {
                        $headin = "heading" . $row[0];
                        $collapse = "collapse" . $row[0];
                        ?>
                        <div class="card">
                            <div class="card-header" id="heading7">
                                <h5 class="mb-0">
                                    <button class="btn btn-link filter" type="button" data-toggle="collapse"
                                            data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                                <?php echo $row[1]; ?>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse7" class="collapse" aria-labelledby="<?php echo $heading; ?>" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="block">
                                                <p class="acordion-menu-title">Dirección:</p>
                                                <p class="acordion-menu-p"><?php echo $row[2]; ?></p>
                                            </div>
                                            <div class="block">
                                                <p class="acordion-menu-title">Teléfono:</p>
                                                <p class="acordion-menu-p"><?php echo $row[3]; ?></p>
                                            </div>
                                            <div class="block">
                                                <p class="acordion-menu-title">Correo:</p>
                                                <p class="acordion-menu-p"><?php echo $row[4]; ?></p>
                                            </div>
                                            <div class="block">
                                                <p class="acordion-menu-title">Horarios:</p>
                                                <p class="acordion-menu-p"><?php echo $row[5]; ?></p>
                                                <p class="acordion-menu-p"><?php echo $row[6]; ?></p>
                                                <p class="acordion-menu-p"><?php echo $row[7]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cont-mapa-mobil" id="cont-map-mobil-<?php echo $row[0];?>" alt="c"></div>
                            </div>
                        </div>

                    <?php }
                } ?>

            </div>
        </div>
        <div class="item" id="cont-mapa-agencias" alt="b">

        </div>
    </div>
</section>

<?php
get_footer();
?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/fileinput.min.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/agencias.js" type="text/javascript"/></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWaQJEc1kcHVlxZmOzBuHPsHmhrQxcfjM" type="text/javascript"/></script>







