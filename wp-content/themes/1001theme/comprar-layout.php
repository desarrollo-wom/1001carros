<?php
/**
 * @package    WordPress
 * @subpackage    1001theme
 * @version        1.0.0
 *
 * Template Name: Comprar-Layout
 * Created by Asdrubal Torres
 *
 */
get_header();
$ruta_tema = get_theme_file_uri();
$host_url = get_home_url();


$pathSite = "/var/www/html/1001carros";

include 'controller/connect.php';

//cargando los registros de los tipos de carros
$sqlTipos = "SELECT * FROM `n_tipos` ORDER BY `descripcion`";
$tipos = mysqli_query($link, $sqlTipos);

//cargar los registros de las marcas de carrros
$sqlMarcas = "SELECT * FROM `n_marcas` ORDER BY `descripcion`";
$marcas = mysqli_query($link, $sqlMarcas);

//capturar los valores de los filtros del home
$tipo_carro = $_POST['tipo_carro'];
$marca_carro = $_POST['marca'];
$precio = $_POST['precio'];

$sqlCarros = "SELECT * FROM `carro`";

//determinar el filtro aplicado desde el home
$filtroAplicado = "";
$valorFiltro = "";
$filtroStr = "";

if (isset($tipo_carro) and $tipo_carro != 0) {
    $sqlCarros = "SELECT * FROM `carro` WHERE `id_tipo`=$tipo_carro;";

    $filtroAplicado = "Tipo";
    $sqlTipo = "SELECT * FROM `n_tipos` WHERE `id_tipo`=$tipo_carro";
    $tipoSeleccionado = mysqli_query($link, $sqlTipo);

    while ($tipo = mysqli_fetch_row($tipoSeleccionado)) {
        $valorFiltro = $tipo[1];
    }
    $filtroAplicado = $valorFiltro;
    $filtroStr = $valorFiltro;
}

if (isset($marca_carro) and $marca_carro != 0) {
    $sqlCarros = "SELECT * FROM `carro` WHERE `id_marca`=$marca_carro;";
    $filtroAplicado = "Marca";

    $sqlMarcaAplicada = "SELECT * FROM `n_marcas` WHERE `id_marca`=$marca_carro;";
    $marcaSeleccionada = mysqli_query($link, $sqlMarcaAplicada);

    while ($marca = mysqli_fetch_row($marcaSeleccionada)) {
        $valorFiltro = $marca[1];
    }

    $filtroAplicado = $valorFiltro;
    $filtroStr = $valorFiltro;
}

if (isset($precio) and $precio != 0) {
    $sqlCarros = "SELECT * FROM `carro` WHERE `precioPvp`<$precio;";
    $filtroAplicado = "Precio: " . $precio;
    $filtroStr = $precio;
}

//cargar todos los carros para la carga inicial
$carros = mysqli_query($link, $sqlCarros);

$totalResult = 0;


//determinar precio minimo y maximo de todos los carros
$sqlMaximo = "SELECT  MAX(`precioPvp`) `precioPvp` FROM `carro`";
$sqlMinimo = "SELECT  MIN(`precioPvp`) `precioPvp` FROM `carro`";

$costoMaximo = 0;
$costoMinimo = 0;
$costoMedio = 0;

$resultMax = mysqli_query($link, $sqlMaximo);
$resultMin = mysqli_query($link, $sqlMinimo);

while ($row1 = mysqli_fetch_array($resultMax)) {
    $costoMaximo = $row1[0];
}

while ($row2 = mysqli_fetch_array($resultMin)) {
    $costoMinimo = $row2[0];
}

$costoMedio = intval($costoMaximo / 2);


?>

<section id="separador-header"></section>
<input type="hidden" id="host_url" name="host_url" value="<?php echo $ruta_tema; ?>"/>
<input type="hidden" id="host" name="host" value="<?php echo $host_url; ?>"/>
<input type="hidden" id="tipo_carro" name="tipo_carro" value="<?php echo $tipo_carro; ?>"/>
<input type="hidden" id="marca_carro" name="marca_carro" value="<?php echo $marca_carro; ?>"/>
<input type="hidden" id="precio" name="precio" value="<?php echo $precio; ?>"/>
<input type="hidden" id="filtro_home" name="filtro_home" value="<?php echo $filtroAplicado; ?>"/>
<input type="hidden" id="filtrohome" name="filtrohome" value="<?php echo $filtroStr; ?>"/>
<input type="hidden" id="filtrosall" name="filtrosall" value=""/>
<input type="hidden" id="costoMin" value="<?php echo $costoMinimo ?>"/>
<input type="hidden" id="costoMax" value="<?php echo $costoMaximo ?>"/>
<section>
    <div class="cont-btn-responsive">
        <div class="cont-padding" id="cont-btn-filtros">
            <a href="#" class="btn-filtros" style="position: relative;"><span>Filtrar búsqueda</span> <i
                        class="fas fa-angle-down"
                        style="position: absolute;
                                                                                                         right: 7px;
                                                                                                         top: 50%;
                                                                                                         transform: translateY(-50%);"></i></a>
        </div>
    </div>
    <div class="row cont-resultados">
        <div class="col-xs-12 col-lg-3 cont-menu-result">
            <div id="app">
                <div class="accordion" id="accordion">
                    <div class="card">
                        <div class="card-header" id="heading2">
                            <h5 class="mb-0">
                                <button class="btn btn-link filter collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Tipo
                                </button>
                            </h5>
                        </div>
                        <div id="collapse2" class="collapse show" aria-labelledby="heading2" data-parent="#accordion">
                            <div class="card-body">
                                <!--
                                <div class="row fila-ckeck" style="padding-top: 0px;margin-top:-6px;">
                                    <div class="col-left">
                                        <label class="label-option">Todos</label>
                                    </div>
                                    <div class="col-right">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck11">
                                            <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                        </div>
                                    </div>
                                </div> -->
                                <?php
                                while ($row = mysqli_fetch_row($tipos)) {
                                    $tipoSelected = 0;
                                    if (isset($tipo_carro) and $tipo_carro != 0) {
                                        if ($tipo_carro == $row[0]) {
                                            $tipoSelected = 1;
                                        } else {
                                            $tipoSelected = 0;
                                        }
                                    }
                                    ?>
                                    <div class="row fila-ckeck">
                                        <div class="col-left">
                                            <label class="label-option"><?php echo utf8_encode($row[1]); ?></label>
                                        </div>
                                        <div class="col-right">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input check-tipo"
                                                       data-name="<?php echo $row[1]; ?>" value="<?php echo $row[0]; ?>"
                                                       id="<?php echo 'tipo_' . $row[0]; ?>" <?php if ($tipoSelected == 1) { ?> checked <?php } ?> >
                                                <label class="custom-control-label" for="tipo_<?php echo $row[0]; ?>">&nbsp;</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading1">
                            <h5 class="mb-0">
                                <button class="btn btn-link filter" type="button" data-toggle="collapse"
                                        data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                    Marca
                                </button>
                            </h5>
                        </div>
                        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                            <div class="card-body">
                                <!--
                                <div class="row fila-ckeck"  style="padding-top: 0px;margin-top: -6px;">
                                    <div class="col-left">
                                        <label class="label-option">Todos</label>
                                    </div>
                                    <div class="col-right">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </div>
                                </div>-->
                                <?php
                                $cont = 0;
                                while ($row = mysqli_fetch_row($marcas)) {
                                    $marcaSelected = 0;
                                    if (isset($marca_carro) and $marca_carro > 0) {
                                        if ($marca_carro == $row[0]) {
                                            $marcaSelected = 1;
                                        } else {
                                            $marcaSelected = 0;
                                        }
                                    }
                                    ?>
                                    <div class="row fila-ckeck fila-marca <?php if ($cont > 5) { ?> sr-only <?php } ?> <?php if ($cont <= 5) { ?> visibles-siempre <?php } ?>">
                                        <div class="col-left">
                                            <label class="label-option"><?php echo utf8_encode($row[1]); ?></label>
                                        </div>
                                        <div class="col-right">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" value="<?php echo $row[0]; ?>"
                                                       data-name="<?php echo $row[1]; ?>"
                                                       class="custom-control-input check-marca"
                                                       id="<?php echo "marca_" . $row[0]; ?>" <?php if ($marcaSelected == 1) { ?> checked <?php } ?>>
                                                <label class="custom-control-label" for="marca_<?php echo $row[0]; ?>">&nbsp;</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $cont++;
                                }
                                ?>
                                <div class="row fila-ckeck">
                                    <a href="#" class="btn-ver-mas-filtro vermasmarca">Ver más +</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading3">
                            <h5 class="mb-0">
                                <button class="btn btn-link filter collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Precio
                                </button>
                            </h5>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                            <div class="card-body" style="padding: 45px 0;">
                                <div class="grid2x" style="padding-left: 15px;">
                                    <div class="item">
                                        <input type="text" id="precio_desde" name="desde" placeholder="min"
                                               class="form-control"
                                               style="border:1px solid #ced4da!important;" maxlength="6"
                                               onKeyPress="return checkIt(event)">
                                    </div>
                                    <div class="item">
                                        <input type="text" id="precio_hasta" name="hasta" placeholder="max"
                                               class="form-control"
                                               style="border:1px solid #ced4da!important;" maxlength="6"
                                               onKeyPress="return checkIt(event)">
                                    </div>
                                    <div class="item">
                                        <a href="#" class="btn-azul btn-buscar-precio">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div style="padding-left: 15px;padding-top: 5px;">
                                    <p class="perror sr-only" id="error_buscar_precio">Debe llenar los campos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading5">
                            <h5 class="mb-0">
                                <button class="btn btn-link filter collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    Año
                                </button>
                            </h5>
                        </div>
                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                            <div class="card-body" style="padding: 20px 0;">
                                <div class="grid2x" style="padding-left: 15px;">
                                    <div class="item">
                                        <input type="text" id="year_desde" name="year_desde" placeholder="desde"
                                               class="form-control"
                                               style="border:1px solid #ced4da!important;" maxlength="4"
                                               onKeyPress="return checkIt(event)">
                                    </div>
                                    <div class="item">
                                        <input type="text" id="year_hasta" name="year_hasta" placeholder="hasta"
                                               class="form-control"
                                               style="border:1px solid #ced4da!important;" maxlength="4"
                                               onKeyPress="return checkIt(event)">
                                    </div>
                                    <div class="item">
                                        <a href="#" class="btn-azul btn-buscar-anno">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div style="padding-left: 15px;padding-top: 5px;">
                                    <p class="perror sr-only" id="error_buscar_year">Debe llenar los campos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading4">
                            <h5 class="mb-0">
                                <button class="btn btn-link filter collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Km
                                </button>
                            </h5>
                        </div>
                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                            <div class="card-body" style="padding: 20px 0;">
                                <div class="grid2x" style="padding-left: 15px;">
                                    <div class="item">
                                        <input type="text" id="desde_km" name="desde_km" placeholder="min"
                                               class="form-control"
                                               style="border:1px solid #ced4da!important;"
                                               onKeyPress="return checkIt(event)">
                                    </div>
                                    <div class="item">
                                        <input type="text" id="hasta_km" name="hasta_km" placeholder="max"
                                               class="form-control"
                                               style="border:1px solid #ced4da!important;"
                                               onKeyPress="return checkIt(event)">
                                    </div>
                                    <div class="item">
                                        <a href="#" class="btn-azul btn-buscar-km">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div style="padding-left: 15px;padding-top: 5px;">
                                    <p class="perror sr-only" id="error_buscar_km">Debe llenar los campos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading10">
                            <h5 class="mb-0">
                                <button class="btn btn-link filter collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                    Placa
                                </button>
                            </h5>
                        </div>
                        <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
                            <div class="card-body" style="padding: 20px 0;">
                                <div class="row" style="padding-left: 15px;">
                                    <div class="col-8">
                                        <input type="text" id="nofinal" name="nofinal" placeholder="No. Final"
                                               class="form-control"
                                               style="border:1px solid #ced4da!important;" maxlength="1"
                                               onKeyPress="return checkIt(event)">
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="btn-azul btn-buscar-placa">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div style="padding-left: 15px;padding-top: 5px;">
                                    <p class="perror sr-only" id="error_buscar_placa">Debe seleccionar el número final
                                        de la placa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-lg-9">
            <div class="barra-filtros">
                <div style="margin-right: 15px;display: inline-block;">Filtros aplicados:</div>
                <div class="cont-filtros-desktop">
                    <?php

                    //capturar los valores de los filtros del home
                    $tipo_carro = $_POST['tipo_carro'];
                    $marca_carro = $_POST['marca'];
                    $precio = $_POST['precio'];

                    if (isset($tipo_carro) && $tipo_carro > 0) {
                        ?>
                        <div class="etiqueta-filtro filtro_tipo_selected"
                             id="<?php echo $tipo_carro; ?>"><?php echo $filtroAplicado; ?> <i class="fas fa-times"></i>
                        </div>
                        <?php
                    }

                    if (isset($marca_carro) && $marca_carro > 0) {
                        ?>
                        <div class="etiqueta-filtro filtro_marca_selected"
                             id="<?php echo $marca_carro; ?>"><?php echo $filtroAplicado; ?> <i
                                    class="fas fa-times"></i></div>
                        <?php
                    }

                    ?>
                </div>
            </div>
            <div class="cont-etiquetas-filtro">

            </div>
            <div class="progress sr-only" id="progres_search" style="margin-bottom: 15px;">
                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="">Buscando carros  <i class="fas fa-car-alt"></i> <i class="fas fa-car-alt"></i> <i
                                class="fas fa-car-alt"></i></span>
                </div>
            </div>
            <!-- Grid para el resultado de la bsuqueda de los auto -->

            <div id="grid-result-carro">
                <?php
                while ($carro = mysqli_fetch_row($carros)) {
                    $rutaimg = $host_url . "/fotosftp/" . $carro[0] . "/" . $carro[0] . "_thumb.jpg";
                    $totalResult++;

                    $precioPvp = $carro[7];

                    $precioF = "";
                    $longitudP = strlen($precioPvp);

                    if ($longitudP == 4) {
                        $pre_pref = substr($precioPvp, 0, 1);
                        $pre_suf = substr($precioPvp, 1, 3);
                        $precioF = $pre_pref . "," . $pre_suf;
                    }
                    if ($longitudP == 5) {
                        $pre_pref = substr($precioPvp, 0, 2);
                        $pre_suf = substr($precioPvp, 2, 3);
                        $precioF = $pre_pref . "," . $pre_suf;
                    }
                    if ($longitudP == 6) {
                        $pre_pref = substr($precioPvp, 0, 3);
                        $pre_suf = substr($precioPvp, 2, 3);
                        $precioF = $pre_pref . "," . $pre_suf;
                    }

                    $precioCarro = $precioF;
                    $urlImagenCarro = "";

                    if (file_exists($pathSite . '/fotosftp/' . $carro[0])) {
                        if (file_exists($pathSite . '/fotosftp/' . $carro[0] . '/' . $carro[0] . '_1.JPG')) {
                            $urlImagenCarro = $host_url . '/fotosftp/' . $carro[0] . '/' . $carro[0] . '_1.JPG';
                        } else {
                            $urlImagenCarro = $host_url . '/fotosftp/' . $carro[0] . '/' . $carro[0] . '_1.jpg';
                        }

                    } else {
                        $urlImagenCarro = $host_url . '/fotosftp/proxima.png';
                    }

                    ?>
                    <div class="grid-auto-result">
                        <div class="item">
                            <img src="<?php echo $urlImagenCarro; ?>" alt="auto-result1" style="width: 85%;">
                        </div>
                        <div class="item2" style="align-self: center;">
                            <form action="<?php echo $host_url . "/carro"; ?>" method="GET">
                                <a href="#" class="detalle"><h1
                                            class="titulo-ficha-result"><?php echo $carro[5]; ?></h1></a>
                                <a href="#" class="detalle"><p class="subtitulo-ficha-result"><?php echo $carro[10]; ?>
                                        I <?php echo $carro[9]; ?>km I <?php echo $carro[12]; ?></p></a>
                                <a href="#" class="detalle"><h1 class="titulo-ficha-result">
                                        $<?php echo $precioCarro; ?></h1></a>
                                <input type="hidden" name="placa" value="<?php echo $carro[0]; ?>"
                                       id="<?php echo $carro[0]; ?>"></a>
                                <a href="#" class="btn-new vermasficha detalle">Ver más +</a>
                            </form>
                        </div>
                    </div>
                <?php } ?>
                <?php
                // No se encontraron carros en la bsuqueda
                if ($totalResult == 0) {
                    ?>
                    <div class="block-no-result">
                        <h2>No se encontraron carros para el filtro aplicado.</h2>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>
<script src="<?php bloginfo('template_url'); ?>/dependencies/js/jquery.min.js" type="text/javascript" ></script>
<script src="<?php bloginfo('template_url'); ?>/bootstrap/dist/js/bootstrap.js" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/highlight.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap-slider.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/comprar.js" type = "text/javascript" ></script>
<style>
    .btn-flotante {
        top: 135px;
    }

    #top-header {
        background-color: #fff;
    }

    .row {
        margin-left: 0px !important;
        margin-right: 0px !important;
    }

    @media (max-width: 1376px) {
        #mainheader, #top-header {
            margin-top: 0px;
        }
    }

    @media (max-width: 420px) {
        .col-xs-12 {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .accordion {
            margin-left: -20px;
            margin-right: -20px;
            margin-bottom: 17px;
        }

        .btn-flotante {
            top: 110px;
        }
    }

    @media (max-width: 768px) {
        #cont-btn-filtros {
        }
    }
</style>