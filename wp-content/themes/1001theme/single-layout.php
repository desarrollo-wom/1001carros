<?php
/**
 * @package    WordPress
 * @subpackage    1001theme
 * @version        1.0.0
 *
 * Template Name: Single-Layout
 * Created by Asdrubal Torres
 *
 */

$ruta_tema = get_theme_file_uri();
$host_url = get_home_url();

$iva = constant('WP_IVA');

//id del carro en este caso siempre sera la placa
$placa = $_GET['placa'];

include 'controller/connect.php';

//cargando los registros de los tipos de carros
$sqlCarro = "SELECT * FROM `carro` WHERE `placa`='$placa'";

$carro = mysqli_query($link, $sqlCarro);

$placa = "";
$placa = "";
$id_tipo = 0;
$id_marca = 0;
$id_agencia = 0;
$chasis = "";
$modelo = "";
$color = "";
$precioPvp = "";
$codigoU = "";
$kilometraje = "";
$anioFabricacion = "";
$cilindaje = "";
$transmision = "";
$direccion = "";
$traccion = "";
$tapiz = "";
$aireAcondicionado = "";
$vidrios = "";
$combustible = "";
$paisOrigen = "";
$fechaCreacion = "";
$estado = "";

while ($row = mysqli_fetch_row($carro)) {
    $placa = $row[0];
    $id_tipo = $row[1];
    $id_marca = $row[2];
    $id_agencia = $row[3];
    $chasis = $row[4];
    $modelo = $row[5];
    $color = $row[6];
    $precioPvp = $row[7];
    $codigoU = $row[8];
    $kilometraje = $row[9];
    $anioFabricacion = $row[10];
    $cilindaje = $row[11];
    $transmision = $row[12];
    $direccion = $row[13];
    $traccion = $row[14];
    $tapiz = $row[15];
    $aireAcondicionado = $row[16];
    $vidrios = $row[17];
    $combustible = $row[18];
    $paisOrigen = $row[19];
    $fechaCreacion = $row[20];
    $estado = $row[21];
}

$kmsCarros = $kilometraje;

$kmF = "";
$longitudKm = strlen($kmsCarros);

if ($longitudKm == 4) {
    $pre_pref = substr($kmsCarros, 0, 1);
    $pre_suf = substr($kmsCarros, 1, 3);
    $kmF = $pre_pref . "," . $pre_suf;
}
if ($longitudKm == 5) {
    $pre_pref = substr($kmsCarros, 0, 2);
    $pre_suf = substr($kmsCarros, 2, 3);
    $kmF = $pre_pref . "," . $pre_suf;
}
if ($longitudKm == 6) {
    $pre_pref = substr($kmsCarros, 0, 3);
    $pre_suf = substr($kmsCarros, 2, 3);
    $kmF = $pre_pref . "," . $pre_suf;
}

if ($longitudKm == 7) {
    $pre1 = substr($kmsCarros, 0, 1);
    $pre2 = substr($kmsCarros, 1, 3);
    $pre3 = substr($kmsCarros, 4, 3);
    $kmF = $pre1 . "," . $pre2 . "," . $pre3;
}

$precioF = "";
$longitudP = strlen($precioPvp);

$preciopvpcompelte = $precioPvp;

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

$precioPvp = $precioF;
$ultimoNumero = substr($placa, -1);

$sqlMarca = "SELECT * FROM `n_marcas` WHERE `id_marca`=$id_marca;";
$marcas = mysqli_query($link, $sqlMarca);
$marca = "";
while ($row1 = mysqli_fetch_row($marcas)) {
    $marca = $row1[1];
}

$sqlTipo = "SELECT * FROM `n_tipos` WHERE `id_tipo`=$id_tipo";
$tipos = mysqli_query($link, $sqlTipo);

$tipo = "";
while ($row2 = mysqli_fetch_row($tipos)) {
    $tipo = $row2[1];
}

//arreglo para almacenar las rutas de las fotos del carro
$fotosCarro = array();

$urlpack1 = $host_url . "/fotosftp/";
$urlpack1 .= $placa;

$url_image_share="";

$urlpack = "/var/www/html/1001carros/fotosftp/";
$urlpack .= $placa . "/{*.jpg,*.gif,*.png,*.JPG}";

$total_imagenes = count(glob($urlpack, GLOB_BRACE));

$imagen = "";
for ($i = 1; $i <= $total_imagenes; $i++) {
    $imagen = $urlpack1 . "/" . $placa . "_" . $i . ".JPG";
    $fotosCarro[] = $imagen;
}

//cargar los auto relacionados
$sqlRel = "SELECT * FROM `carro` WHERE `id_tipo`=$id_tipo LIMIT 30";
$tiposRel = mysqli_query($link, $sqlRel);

//cargar ruta para la imagen en miniatura
$urlmini="";
if($total_imagenes>0){
    $urlmini= $host_url."/fotosftp/".$placa."/".$placa."_1.JPG";
    $url_image_share=$host_url."/fotosftp/".$placa."/".$placa."_1.JPG";
}

//$total_imagenes = 1;
//temp today
if ($total_imagenes ==0) {
    $fotosCarro = array();
    $fotosCarro[0] = $host_url."/fotosftp/default.png";
    $urlmini = $host_url."/fotosftp/proxima.png";
    $url_image_share=$host_url."/fotosftp/proxima.png";
}
?>

<?php
get_header();
?>
<head>
    <meta property="og:url"  content="<?php echo $host_url.'/?placa='.$placa ?>" />
    <meta property="og:type" content="web" />
    <meta property="og:title" content="<?php echo $placa; ?>" />
    <meta property="og:description" content="<?php echo $modelo; ?>" />
    <meta property="og:image:width"  content="600px" />
    <meta property="og:image:height"  content="600px" />
    <meta property="og:image"  content="<?php echo $url_image_share; ?>" />
</head>

<input type="hidden" id="host_url" name="host_url" value="<?php echo $ruta_tema; ?>"/>
<section id="separador-header2"></section>
<input type="hidden" name="iva" id="iva" value="<?php echo $iva; ?>"/>
<input type="hidden" name="precioPvp" id="precioPvp" value="<?php echo $preciopvpcompelte; ?>"/>
<input type="hidden" name="placa" id="placa" value="<?php echo $placa; ?>"/>
<section id="section-datos">
    <div class="cont-img-tumb">
        <img src="<?php echo $urlmini; ?>" style="display: inline-block;float: left;width:150px;" class="sr-only" id="img-tumbail">
    </div>
    <div class="cont-padding">
        <div id="container-resumen-carro">
            <div class="item1" style="align-self: center;">
                <h2 class="marcamodelo-carro"><?php echo $modelo; ?></h2>
                <p class="datoscarro"><?php echo $anioFabricacion; ?> | <?php echo $kmF; ?>km
                    | <?php echo $transmision; ?></p>
            </div>
            <div class="item2" style="align-self: center;">
                <p class="precio-carro-ficha">$<?php echo $precioPvp; ?></p>
            </div>
            <div class="item3" style="align-self: center;">
                <div class="row">
                    <div class="col-6 cont-p-aceptamos">
                        <p class="paceptamos">Aceptamos todas las<br/>
                            tarjetas de crédito</p>
                    </div>
                    <div class="col-6 cont-resumen-btn-reservar">
                        <a href="#" class="btn-new btn-reservalo">resérvalo ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="cont-slider">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <?php
            for ($i = 0; $i < count($fotosCarro); $i++) {
                if ($i == 0) {
                    echo '<div class="carousel-item active">';
                    echo '<img class="d-block w-100" src="' . $fotosCarro[$i] . '?auto=yes" alt="First slide" style="margin: 0 auto;max-width:800px;">';
                    echo '</div>';
                } else {
                    echo '<div class="carousel-item">';
                    echo '<img class="d-block w-100" src="' . $fotosCarro[$i] . '?auto=yes" alt="Second slide" style="margin: 0 auto;max-width:800px;">';
                    echo '</div>';
                }
            }
            ?>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</section>
<section id="cont-slider-responsive" style="margin-top: 0;">
    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <?php
            for ($i = 0; $i < count($fotosCarro); $i++) {
                if ($i == 0) {
                    echo '<div class="carousel-item active">';
                    echo '<img class="d-block w-70" src="' . $fotosCarro[$i] . '?auto=yes" alt="First slide" style="margin: 0 auto;width:80%;">';
                    echo '</div>';
                } else {
                    echo '<div class="carousel-item">';
                    echo '<img class="d-block w-70" src="' . $fotosCarro[$i] . '?auto=yes" alt="Second slide" style="margin: 0 auto;width:80%;">';
                    echo '</div>';
                }
            }
            ?>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</section>
<section id="section-ficha-tecnica">
    <div class="cont-padding">
        <h2 class="titulo-amarillo">Ficha técnica</h2>
        <div class="grid-ficha5">
            <div class="item1" style="padding-left: 15px;">
                <label class="lbl-ficha">Marca:</label>
                <label class="lbl-ficha">Tipo:</label>
                <label class="lbl-ficha">Año:</label>
                <label class="lbl-ficha">Tracción:</label>
                <label class="lbl-ficha">Motor:</label>
                <label class="lbl-ficha">Placa:</label>
                <label class="lbl-ficha">U:</label>
            </div>
            <div class="item2">
                <p class="datosficha"><?php echo $marca; ?></p>
                <p class="datosficha"><?php echo $tipo; ?></p>
                <p class="datosficha"><?php echo $anioFabricacion; ?></p>
                <p class="datosficha"><?php echo $traccion; ?></p>
                <p class="datosficha"><?php echo $cilindaje; ?></p>
                <p class="datosficha"><?php echo $placa; ?></p>
                <p class="datosficha"><?php echo $codigoU; ?></p>
            </div>
            <div class="item3">
                <div class="linea-vertical"></div>
            </div>
            <div class="item4">
                <label class="lbl-ficha">Último Número:</label>
                <label class="lbl-ficha">Color:</label>
                <label class="lbl-ficha">Kilometraje:</label>
                <label class="lbl-ficha">Tapizado:</label>
                <label class="lbl-ficha">Dirección:</label>
                <label class="lbl-ficha">Combustible:</label>
                <label class="lbl-ficha">Transmisión:</label>
            </div>
            <div class="item5">
                <p class="datosficha"><?php echo $ultimoNumero; ?></p>
                <p class="datosficha"><?php echo $color; ?></p>
                <p class="datosficha"><?php echo $kmF; ?></p>
                <p class="datosficha"><?php echo $tapiz; ?></p>
                <p class="datosficha"><?php echo $direccion; ?></p>
                <p class="datosficha"><?php echo $combustible; ?></p>
                <p class="datosficha"><?php echo $transmision; ?></p>
            </div>
        </div>
    </div>
</section>
<section id="contenido-financiamiento">
    <div class="cont-padding">
        <h1 class="titulo-financiamiento">Financiamiento</h1>
        <p class="subtitulo-financiamiento" style="margin-bottom: 45px!important;">Calcula fácilmente la cuota
            mensual para este carro</p>
        <div class="grid-3-slider">
            <div class="item">
                <p class="lbl-slider">Entrada:</p>
                <input id="ex1" data-slider-id='ex1Slider' type="text"/>
                <div class="cont-labels">
                    <div class="row" style="margin-left: -30px;">
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
                <input type="text" id="entrada-value" name="entrada-value" class="form-control" value="0 USD"
                       style="margin: 15px auto;max-width:80%;" readonly="true"/>
                <input type="hidden" name="entradavalue" id="entradavalue" value=""/>
            </div>
            <div class="item">
                <p class="lbl-slider">Meses plazo:</p>
                <input id="ex2" data-slider-id='ex2Slider' type="text"/>
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
                <input type="text" id="meses-value" name="meses-value" class="form-control" value="12 meses"
                       style="margin: 15px auto;max-width:80%;" readonly="true"/>
                <input type="hidden" name="mesesvalue" id="mesesvalue" value="12"/>
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
                <input type="hidden" name="meses_rastreo" id="meses_rastreo" value="12"/>
                <input type="hidden" name="costoR" id="costoR" value="0"/>
                <input type="text" id="costo_rastreo" name="costo_rastreo" class="form-control" value="0 USD"
                       style="margin: 15px auto;max-width:80%;" readonly="true"/>
            </div>
        </div>
        <div class="grid-3-slider" style="margin-top: 35px;">
            <div class="item"></div>
            <div class="item">
                <p class="lbl-slider">Cuota mensual referencial:</p>
                <input type="text" id="cuota-value" name="cuota-value" class="form-control" value="0"
                       style="margin: 15px auto;max-width:80%;font-weight: bold;color:#2d257d;font-size: 20px;"
                       readonly="true"/>
                <input type="hidden" name="cuotavalue" id="cuotavalue" value=""/>
            </div>
            <div class="item"></div>
        </div>
        <p class="psmall">Utiliza el financiamiento de 1001Carros (Casabaca), tu banco de
            preferencia o efectivo. En cualquier opción que
            escojas, nosotros
            <br/> te ayudaremos a que el proceso sea lo más simple y rápido posible.
        </p>
        <p class="psmall" style="margin-top: 0;">* La cuota mensual varía según los requerimientos de la
            financiera.</p>
        <p class="psmall" style="margin-top: 0;">* No incluye seguro, rastreo satelital ni gastos
            administrativos.</p>
    </div>
    <div class="cont-padding">
        <div class="contenedor-cond-req-ficha">
            <div class="item">
                <p class="subtitulo-cond-req-fich">Condiciones:</p>
                <p class="des-cond-req-fich">· Valor de entrada: 30 %</p>
                <p class="des-cond-req-fich">· Tasa: 16,06 %</p>
                <p class="des-cond-req-fich">· Plaza: 48 meses</p>
                <p class="des-cond-req-fich cond-last">El valor no incluye gastos de legalización y
                    seguro</p>
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
    <div class="cont-padding">
        <p class="p-aceptamos-tarje">Aceptamos todas las tarjetas de crédito</p>
    </div>
</section>
<section id="section-garantia">
    <div class="cont-padding">
        <div class="row">
            <div class="col-xs-12 col-sm-5">
                <div class="img-logo-1001-garantia">
                    <img src="<?php echo $ruta_tema; ?>/images/logo-1001-garantias.png" alt="log-garantias">
                </div>
            </div>
            <div class="col-xs-12 col-sm-7" style="align-self: center;">
                <h2 class="titulo-blanco-garantia">Seminuevos 1001Carros.com</h2>
                <h2 class="titulo-blanco-garantia" style="margin-bottom: 35px;">Satisfacción garantizada</h2>
                <h2 class="titulo-amarillo-garantia">1 año o 20.000 km</h2>
                <h2 class="titulo-blanco-garantia-unicos" style="margin-top: 45px;">Únicos seminuevos con
                    garantía</h2>
            </div>
        </div>
    </div>
</section>
<section id="more-info">
    <div class="cont-padding">
        <div class="row-2-col-more-info">
            <div class="item p-video" style="align-self: center;">
                <h1 class="titulo-more-info" style="text-align: left!important;">¿Por qué nos encantó este
                    carro?</h1>
                <p class="desauto" style="margin-bottom: 12px!important;">En 1001Carros.com trabajamos para brindarte la
                    experiencia al comprar o
                    vender un carro.</p>
                <p class="desauto">Todos nuestros carros aprobaron exitosamente nuestro riguroso proceso de
                    inspección de 150 puntos, donde evaluamos el historial vehicular del carro.</p>
            </div>
            <div class="item">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/StAF7gQYXoU" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="more-carros">
    <div class="cont-padding">
        <h1 class="titulo-more-info">Otros carros que te pueden interesar:</h1>
        <section class="regular slider">

            <?php
            while ($carros2 = mysqli_fetch_row($tiposRel)) {
            
            $placa=$carros2[0];

            $urlpack = "/var/www/html/1001carros/fotosftp/";
            $urlpack .= $placa . "/{*.jpg,*.gif,*.png,*.JPG}";

            $total_imagenes = count(glob($urlpack, GLOB_BRACE));

            
            if($total_imagenes==0){
                $urlthumb = $host_url . "/fotosftp/";
                $urlthumb .= "/proxima.png";
            }

            if($total_imagenes>0){
                $urlthumb = $host_url . "/fotosftp/";
                $urlthumb.=$placa."/".$placa."_1.JPG";
            }

            $placaC = $carros2[0];

                $kmsCarros = $carros2[9];

                $kmF = "";
                $longitudKm = strlen($kmsCarros);

                if ($longitudKm == 4) {
                    $pre_pref = substr($kmsCarros, 0, 1);
                    $pre_suf = substr($kmsCarros, 1, 3);
                    $kmF = $pre_pref . "," . $pre_suf;
                }
                if ($longitudKm == 5) {
                    $pre_pref = substr($kmsCarros, 0, 2);
                    $pre_suf = substr($kmsCarros, 2, 3);
                    $kmF = $pre_pref . "," . $pre_suf;
                }
                if ($longitudKm == 6) {
                    $pre_pref = substr($kmsCarros, 0, 3);
                    $pre_suf = substr($kmsCarros, 2, 3);
                    $kmF = $pre_pref . "," . $pre_suf;
                }

                if ($longitudKm == 7) {
                    $pre1 = substr($kmsCarros, 0, 1);
                    $pre2 = substr($kmsCarros, 1, 3);
                    $pre3 = substr($kmsCarros, 4, 3);
                    $kmF = $pre1 . "," . $pre2 . "," . $pre3;
                }

                ?>
                <form action="<?php echo $host_url . "/carro"; ?>" method="GET">
                    <div class="ficha-auto-item">
                        <img src="<?php echo $urlthumb ?>" alt="auto-relacionado">
                        <div class="cont-datos-carro-otro">
                            <p class="titulo-carro"><?php echo $carros2[5]; ?></p>
                            <p class="datos"><?php echo $carros2[10]; ?> I <?php echo $kmF; ?> km
                                I <?php echo $carros2[12]; ?></p>
                            <input type="hidden" name="placa" value="<?php echo $carros2[0]; ?>"
                                   id="<?php echo $carros2[0]; ?>">
                            <a href="#" class="vermasotrocarro">Ver más +</a>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </section>
    </div>
</section>
<div class="popup_reservar" style="display:none;">
    <div style="text-align:right;"><a href="" class="btn-close-popup"><i class="fas fa-times"></i></a></div>
    <h3 style="margin-bottom:20px;">Reservar ahora</h3>
    <form id="form-reservar">
        <div class="form-group">
            <input name="nombres" id="nombres" class="form-control control-contacto" placeholder="Nombres *"/>
            <div class="cont-error sr-only" id="error_nombres">
                <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo nombres obligatorio</p>
            </div>
        </div>
        <div class="form-group">
            <input name="celular" id="celular" class="form-control control-contacto" placeholder="Celular *"
                   onKeyPress="return checkIt(event)" maxlength="12"/>
            <div class="cont-error sr-only" id="error_celular">
                <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo celular obligatorio</p>
            </div>
        </div>
        <div class="form-group">
            <input name="email" id="email" class="form-control control-contacto" placeholder="Correo *"/>
            <div class="cont-error sr-only" id="error_email">
                <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo correo obligatorio</p>
            </div>
        </div>
        <div class="form-group">
            <textarea name="mensaje" id="mensaje" style="height: 250px!important;" class="form-control control-contacto"
                      placeholder="Mensaje"></textarea>
        </div>
        <div class="form-group sr-only" id="sent_ok" style="text-align: center;width: 100%;margin-top: 35px;">
            <i class="fas fa-check" style="color:#5A9632;"></i>
            <label class="label-contacto-inline">Información enviada correctamente.</label>
        </div>
        <div class="form-group text-center">
            <a href="#" class="btn-new btn-send-reserva">Reservar</a>
        </div>
    </form>
</div>


<?php
get_footer();
?>
<script src="<?php bloginfo('template_url'); ?>/dependencies/js/jquery.min.js" type="text/javascript"></script>
<script src ="<?php bloginfo('template_url'); ?>/bootstrap/dist/js/bootstrap.js" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/highlight.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap-slider.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript"></script>
<script src ="<?php bloginfo('template_url'); ?>/slick/slick.min.js" ></script>
<script src="<?php bloginfo('template_url'); ?>/js/single.js" type="text/javascript"></script>

<style type = "text/css" >
.slider{
    width: 80%;
}

#top-header{
    background: #fff;
}

.slick-dots{
    display: none!important;
}

@media(max-width:1376px){

#cont-slider {
    margin-top: 0!important;
}

#top-header, #mainheader{
 margin-top:0;
}

}

@media(max-width:768px){
    #cont-slider
    {
        margin-top:0!important;
    }
}

@media(max-width:420px){

.slick-dotted.slick-slider
{
    margin-bottom:15px;
}

.slider{
    width: 90%;
}
}
</style>