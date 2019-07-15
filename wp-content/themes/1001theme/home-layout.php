<?php
/**
 * @package 	WordPress
 * @subpackage 	1001theme
 * @version		1.0.0
 * 
 * Template Name: Home-Layout
 * Created by Asdrubal Torres
 * 
 */
get_header();
$ruta_tema = get_theme_file_uri();
$host_url = get_home_url();

include 'controller/connect.php';

$sqlMarcas = "SELECT * FROM `n_marcas` ORDER BY `descripcion`";
$resultadoM = mysqli_query($link, $sqlMarcas);

//cargando los registros de los tipos de carros
//paso 1 consulta
$sqlTipos = "SELECT * FROM `n_tipos` ORDER BY `descripcion`";
//paso 2 preparar la consulta para obtener el objeto 
$resultadoTipo = mysqli_prepare($link, $sqlTipos);

//$ok= mysqli_stmt_bind_param($$resultadoTipo, 's', $resultadoTipo);
$ok = mysqli_stmt_execute($resultadoTipo);

if ($ok == false) {
    
} else {
    $ok = mysqli_stmt_bind_result($resultadoTipo, $id, $descripcion);
}
?>
<section id="cont-slider">
  <img src="<?php echo $ruta_tema; ?>/images/slider-home-blanco.jpg" alt="slider-home" class="img-responsive img-header" style="width: 100%;">
  <?php //echo do_shortcode( '[rev_slider alias="principal"]' );   ?>
</section>
<section id="cont-slider-responsive">
    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $ruta_tema; ?>/images/banner-test-home-responsive.png" alt="First slide">
            </div>
        </div>
    </div>
</section>
<section id="cont-form-search">
    <div class="cont-padding">
        <form action="<?php echo $host_url; ?>/comprar" method="POST" id="form_home">
            <div class="grid4-form-home">
                <div class="item1">
                    <h2 class="intro-form-home">¿Qué carro estás buscando?</h2>
                </div>
                <div class="item">
                    <label class="label-home">Tipo de carro:</label>
                    <select name="tipo_carro" id="tipo_carro" class="form-control">
                        <option value="0">-Seleccione-</option>
<?php while (mysqli_stmt_fetch($resultadoTipo)) { ?>
                            <option value="<?php echo $id; ?>"><?php echo utf8_encode($descripcion); ?></option>
    <?php
}
mysqli_stmt_close($resultadoTipo);
?>
                    </select>
                </div>
                <div class="item">
                    <label class="label-home">Marca:</label>
                    <select name="marca" id="marca" class="form-control">
                        <option value="0">-Seleccione-</option>
<?php while ($row = mysqli_fetch_array($resultadoM)) { ?>
                            <option value="<?php echo $row[0]; ?>"><?php echo utf8_encode($row[1]); ?></option>
    <?php
}
?>
                    </select>
                </div>
                <div class="item" style="margin-bottom: 0;">
                    <label class="label-home">Precio:</label>
                    <select name="precio" id="precio" class="form-control">
                        <option value="0">Precio máximo</option>
                        <option value="10000">$10,000</option>
                        <option value="15000">$15,000</option>
                        <option value="20000">$20,000</option>
                        <option value="25000">$25,000</option>
                        <option value="30000">$30,000</option>
                        <option value="1000000">más de $30,000</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>
<section id="financiamiento">
    <h1>Financiamiento</h1>
    <p class="pfinanciamiento">De manera fácil y rápida, conoce la<br />
        entrada y tu cuota mensual.</p>
    <a class="btn-new" href="<?php echo $host_url; ?>/financiamiento">Calcula tu cuota</a>
</section>
<section id="vender-comprar">
    <div class="cont-padding">
        <h1>Quiero</h1>
        <div class="cont-menu-vc">
            <ul class="menu-vender-comprar">
                <li class="active" id="btn-comprar">Comprar</li>
                <li id="btn-vender">Vender</li>
            </ul>
        </div>
        <p class="pfinanciamiento" id="p-paso-quiero">Encuentra tu carro ideal con
            tres grandes beneficios:</p>
        <div class="cont-3block-grid sr-only" id="grid-vender">
            <div class="item">
                    <div class="contenedor-img efectos" id="mascara_paso1">
                        <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/vender-paso1-s.jpg" alt="paso1" style="width: 100%;"  class="img-subir" />
                        <div class="mascara">
                            <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-vender-paso1.png" alt="paso1s" class="icono-capa" />
                        </div>
                    </div>
                <div style="height:150px;" id="letras-efecto1" class="abajo">
                    <h3 class="titulo-paso">Tráenos tu carro</h3>
                    <div class="des-seguro-section sr-only" id="des_paso1">
                        <p class="p-despasos">Trae tu carro a cualquiera de nuestras agencias para revisar su
                            estado.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                    <div class="contenedor-img efectos" id="mascara_paso2">
                        <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/vender-paso2-s.jpg" alt="paso2" style="width: 100%;"  class="img-subir" />
                        <div class="mascara">
                            <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-vender-paso2.png" alt="paso2s" class="icono-capa" />
                        </div>
                    </div>
                <div style="height:150px;" id="letras-efecto2" class="abajo">
                    <h3 class="titulo-paso">Lo avaluamos</h3>
                    <div class="des-seguro-section sr-only" id="des_paso2">
                        <p class="p-despasos">Realizamos un chequeo de tu vehículo, tanto por dentro como por
                            fuera.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                    <div class="contenedor-img efectos" id="mascara_paso3">
                        <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/vender-paso3-s.jpg" alt="paso3" style="width: 100%;" class="img-subir" />
                        <div class="mascara">
                            <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-vender-paso3.png" alt="paso3s" class="icono-capa" />
                        </div>
                    </div>
                <div style="height:150px;" id="letras-efecto3" class="abajo">
                    <h3 class="titulo-paso">Recibe una oferta</h3>
                    <div class="des-seguro-section sr-only" id="des_paso3">
                        <p class="p-despasos">Te ofrecemos un precio justo por tu carro, sin regateos.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cont-3block-grid" id="grid-comprar">
            <div class="item">
                    <div class="contenedor-img efectos" id="mascara_paso4">
                        <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/comprar-paso1-s.jpg" alt="paso1-s" style="width: 100%;" class="img-subir" />
                        <div class="mascara">
                            <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-comprar-paso1.png" alt="paso1-s-s" class="icono-capa" />
                        </div>
                    </div>
                <div style="height:150px;" id="letras-efecto4" class="abajo">
                    <h3 class="titulo-paso">Lo evaluamos</h3>
                    <div class="des-seguro-section sr-only" id="des_paso4">
                        <p class="p-despasos">Todos nuestros carros pasan por un chequeo de 150 puntos antes de
                            comprarlos.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                    <div class="contenedor-img efectos" id="mascara_paso5">
                        <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/comprar-paso2-s.jpg" alt="comprar-paso2s" style="width: 100%;" class="img-subir" />
                        <div class="mascara">
                            <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-comprar-paso2.png" alt="comprar-paso2" class="icono-capa" />
                        </div>
                    </div>
                <div style="height:150px;" id="letras-efecto5" class="abajo">
                    <h3 class="titulo-paso">Lo alistamos</h3>
                    <div class="des-seguro-section sr-only" id="des_paso5">
                        <p class="p-despasos">Realizamos un exhaustivo proceso de alistamiento para dejar al
                            carro
                            listo tanto por fuera como por dentro.</p>
                    </div>
                </div>
            </div>
            <div class="item">
                    <div class="contenedor-img efectos" id="mascara_paso6">
                        <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/comprar-paso3-s.jpg" alt="comprar-paso5s" style="width: 100%;" class="img-subir" />
                        <div class="mascara">
                            <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-comprar-paso3.png" alt="comprar-paso5" class="icono-capa" />
                        </div>
                    </div>
                <div style="height:150px;" id="letras-efecto6" class="abajo">
                    <h3 class="titulo-paso">Lo garantizamos</h3>
                    <div class="des-seguro-section sr-only" id="des_paso6">
                        <p class="p-despasos">Somos los únicos que te ofrecemos garantía de 1 año o 30.000 km.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="section-sliders-responsive-comprar">
            <div class="paso-beneficios">
                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-paso-comprar-mobil-1.png" alt="paso1-mobil" style="max-width: 77px;">
                <p class="pasos-responsive"><span>Lo evaluamos:</span></p>
                <p class="p-descripcion-responsive">
                    Todos nuestros carros pasan por un chequeo de 150 puntos antes de comprarlos.
                </p>
            </div>
            <div class="paso-beneficios">
                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-paso-comprar-mobil-2.png" alt="paso2-mobil" style="max-width: 77px;">
                <p class="pasos-responsive"><span>Lo alistamos:</span></p>
                <p class="p-descripcion-responsive">
                    Realizamos un exhaustivo proceso de alistamiento para dejar al carro listo tanto por fuera
                    como por dentro.
                </p>
            </div>
            <div class="paso-beneficios">
                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-paso-comprar-mobil-3.png" alt="paso3-mobil" style="max-width: 77px;">
                <p class="pasos-responsive"><span>Lo garantizamos:</span></p>
                <p class="p-descripcion-responsive">
                    Somos los únicos que te ofrecemos garantía de 1 año o 30.000 km.
                </p>
            </div>
        </div>
        <div id="section-sliders-responsive-vender" style="display: none;">
            <div class="paso-beneficios">
                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-paso-vender-mobil-1.png" alt="paso1-mobil-s" style="max-width: 77px;">
                <p class="pasos-responsive"><span>Tráenos tu carro:</span> </p>
                <p class="p-descripcion-responsive">
                    Trae tu carro a cualquiera de nuestras agencias para revisar su estado.
                </p>
            </div>
            <div class="paso-beneficios">
                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-paso-vender-mobil-2.png" alt="paso1-mobil-2s" style="max-width: 77px;">
                <p class="pasos-responsive"><span>Lo avaluamos:</span></p>
                <p class="p-descripcion-responsive">
                    Realizamos un exhaustivo proceso de alistamiento para dejar al carro listo tanto por fuera
                    como por dentro.
                </p>
            </div>
            <div class="paso-beneficios">
                <img src="<?php echo $host_url; ?>/wp-content/uploads/2019/05/icono-paso-vender-mobil-3.png" alt="paso3-mobil-s" style="max-width: 77px;">
                <p class="pasos-responsive"><span>Recibe una oferta:</span> </p>
                <p class="p-descripcion-responsive">
                    Te ofrecemos un precio justo por tu carro, sin regateos.
                </p>
            </div>
        </div>
        <div class="contenedor-btn-quiero">
            <a href="<?php echo get_home_url(); ?>/comprar" class="btn-new" id="btn-comprar-final">¿Qué carro estás buscando?</a>
            <a href="<?php echo get_home_url(); ?>/vender" class="btn-new sr-only" id="btn-vender-final">PRESÉNTANOS TU CARRO</a>
        </div>
    </div>
</section>
<?php
get_footer();
?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/index.js" type="text/javascript"/></script>
