<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Template Name: Directorio
 * Created by Asdrubal
 * 
 */
get_header();

$cmsmasters_option = cmsmasters_get_global_options();

$host = "localhost";
$usuario = "mallelja_adminwp";
$password = "db2016WOM@";
$db = "mallelja_wp";

$link = mysql_connect($host, $usuario, $password);

mysql_select_db($db, $link) OR DIE("Error: No es posible establecer la conexión");

$sql = "SELECT * FROM `wp_categorias_local`";

$sql2 = "SELECT * FROM `wp_local`";

$locales = mysql_query($sql2);

$num_total_registros = mysql_num_rows($locales);
$resultado = mysql_query($sql);
?>
<div class="contenedor-directorio">
    <h2 style="margin-bottom:35px!important;">DIRECTORIO</h2>
    <div class="contenedor-form-directorio">
            <div class="contenedor-form">
                <div class="item"></div>
                <div class="item">
                    <label>Local / Marca</label> 
                    <input type="text" name="local" id="local" placeholder="Buscar por Local o Marca" class="form-control"/>
                </div>
                <div class="item">
                    <label>Categoría</label>
                    <select  name="Categoria" id="categoria" class="form-control"> 
                        <option value="0">Seleccione la categoria</option>
                        <?php while ($row = mysql_fetch_array($resultado)) { ?>
                            <option value="<?php echo $row[0]; ?>"><?php echo utf8_encode($row[1]); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="item">
                    <label>Nivel:</label>
                    <select  name="nivel" id="nivel" class="form-control"> 
                        <option value="">Seleccione el Nivel</option>
                        <option value="0">0</option> 
                        <option value="1">1</option> 
                        <option value="2">2</option> 
                        <option value="3">3</option> 
                    </select>
                </div>
                <div class="item"></div>
            </div>
            <div class="contenedor-form">
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item cont-btn-buscar">
                    <a href="#" class="btn-buscar btn btn-default" style="margin-right:5px;font-weight:600;">Buscar</a>
                </div>
                <div class="item"></div>
            </div>
            <div class="contenedor-letras" style="margin-top:35px;">
                <div class="item"></div>
                <div class="item">
                    <div class="listado-grid">
                        <div class="item"><a href="http://malleljardin.com.ec/directorio/" class="todos" style="color:#fff;">Todos</a></div>
                        <div class="item"><a href="#" class="lista-letras">A</a></div>
                        <div class="item"><a href="#" class="lista-letras">B</a></div>
                        <div class="item"><a href="#" class="lista-letras">C</a></div>
                        <div class="item"><a href="#" class="lista-letras">D</a></div>
                        <div class="item"><a href="#" class="lista-letras">E</a></div>
                        <div class="item"><a href="#" class="lista-letras">F</a></div>
                        <div class="item"><a href="#" class="lista-letras">G</a></div>
                        <div class="item"><a href="#" class="lista-letras">H</a></div>
                        <div class="item"><a href="#" class="lista-letras">I</a></div>
                        <div class="item"><a href="#" class="lista-letras">J</a></div>
                        <div class="item"><a href="#" class="lista-letras">K</a></div>
                        <div class="item"><a href="#" class="lista-letras">L</a></div>
                        <div class="item"><a href="#" class="lista-letras">M</a></div>
                        <div class="item"><a href="#" class="lista-letras">N</a></div>
                        <div class="item"><a href="#" class="lista-letras">O</a></div>
                        <div class="item"><a href="#" class="lista-letras">P</a></div>
                        <div class="item"><a href="#" class="lista-letras">Q</a></div>
                        <div class="item"><a href="#" class="lista-letras">R</a></div>
                        <div class="item"><a href="#" class="lista-letras">S</a></div>
                        <div class="item"><a href="#" class="lista-letras">T</a></div>
                        <div class="item"><a href="#" class="lista-letras">U</a></div>
                        <div class="item"><a href="#" class="lista-letras">V</a></div>
                        <div class="item"><a href="#" class="lista-letras">W</a></div>
                        <div class="item"><a href="#" class="lista-letras">X</a></div>
                        <div class="item"><a href="#" class="lista-letras">Y</a></div>
                        <div class="item"><a href="#" class="lista-letras">Z</a></div>
                    </div>
                </div>
                <div class="item"></div>
            </div> 
          <input type="hidden" name="letra" id="letra" value="" />
          <input type="hidden" name="local_v" id="local_v" value="" />
          <input type="hidden" name="categoria_v" id="categoria_v" value="0" />
          <input type="hidden" name="nivel_v" id="nivel_v" value="" />
    </div>
    <div class="contenedor-resultados">
    
    </div>
    <nav aria-label="Page navigation" id="contenedor-paginador">
        <ul class="pagination" id="paginador"></ul>   
    </nav>
    <div class="contenedor-mensaje-no hidden">
     <h3>No se encontraron locales</h3>
    </div>
</div>


<?php
get_footer();
?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-2.min.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/paginator.min.js" type="text/javascript"/></script>
<script src="<?php bloginfo('template_url'); ?>/js/app.js" type="text/javascript"/></script>


<style stype="text/css">
    .cont-btn-buscar{
        text-align:right;
    }

    a:focus, a:hover {
    color: #fff;
    text-decoration: underline;
    }

    .parrafo-resultado{
        text-align: justify;
        font-size: 13px;
        line-height:16px;
        color: #878787;
        line-height: 18px;
        margin-bottom:8px;
        padding-bottom:0px;
    }

    .enlace-website{
     font-size:15px;
    }

    .enlace-website:hover{
     color:#337ab7;
    }

    .nombre-local-directorio{
        text-align:left;
        font-size:24px;
        margin-bottom:10px;
    }

    .local-result{
        display:grid;
        grid-gap:50px;
        grid-template-columns:1fr 50% 1fr;
        margin-top:25px;
        border-bottom:1px dashed  #ccc;
        padding-bottom:15px;
    }

    .boton-mas-info{
        display: block;
        padding: 8px 16px;
        margin-bottom: 15px;
        font-size: 18px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border-radius: 4px;
        min-width:85px;
        color:#fff;
    }

    .btn-success:hover,.btn-success:active,.btn-success:focus{
     background:#666666;
     border-color:#666666;
    }

    .boton-mas-info:hover{
     text-decoration:none;
     background:#fff;
    }

    .btn{
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 16px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
        min-width:85px;
    }

    .lista-letras{
        font-weight:700;
    }

    .lista-letras:hover{
        color:#000;
    }


    .lista-letras{
        display:inline-block;
        color:#fff; 
    }

    .listado-grid{
        display:grid;
        grid-gap:0;
        grid-template-columns: repeat(27, 1fr);  
    }

    .btn-success {
        color: #fff;
        background-color: #5A5A5E;
        border-color: #5A5A5E;
    }

    .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
    }

    .form-control{
        width:100%;
        border:none!important;
    }

    label{
        color:#fff;
        display:block; 
        text-align:left;
    }

    .contenedor-form{
        display:grid;
        grid-gap:10px;
        grid-template-columns:5% 1fr 1fr 1fr 5%;
        margin-bottom:15px;
    }

    .contenedor-letras{
        display:grid;
        grid-gap:10px;
        grid-template-columns:5% 1fr 5%;
        margin-bottom:15px; 
    }

    .contenedor-directorio{
        width:98%;
        max-width:1200px;
        margin:0 auto;
        padding:35px 0;
    } 

    .contenedor-form-directorio{
        display:grid;
        padding:35px 0;
        border-radius:7px;
        -webkit-border-radius:7px;
        -moz-border-radius:7px;
        -ms-border-radius:7px;
        -o-border-radius:7px;
        margin-bottom:45px;
    }

.lista-letras:hover{
  color:#fcfcfc;
}

input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]){
 height:33px;
 font-style:normal;
 color:#555;
 font-size:16px;
}

@media(max-width:420px){
        .listado-grid{
            display:grid;
            grid-gap:0;
            grid-template-columns: repeat(6, 1fr);  
        }
        .contenedor-form{
            display:grid;
            grid-gap:5px;
            grid-template-columns:1fr;
            margin-bottom:15px;
        }

        .contenedor-form-directorio{
            padding:25px 15px;
        } 

        .cont-btn-buscar{
            text-align:left;
        }

        .contenedor-letras{
            display:grid;
            grid-gap:0px;
            grid-template-columns:0% 1fr 0%;
            margin-bottom:15px; 
        }

        .local-result{
        grid-gap:5px;
        grid-template-columns:1fr;
        margin-top:25px;
        border-bottom:1px dashed  #ccc;
        padding:0 15px 15px 15px;
    }

    .nombre-local-directorio{
      font-size:20px;
    }


    }

</style>