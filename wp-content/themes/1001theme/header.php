<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Somos un concesionario multimarca de seminuevos, dedicado a la compra-venta de carros, con altos estándares de calidad, garantía y precio justo.">
        <meta name="keywords" content="Seminuevos,Garantía,Carros,Compra,Venta,Multimarca">
        <title>1001carros.com</title>
        <?php
        wp_head();

        $ruta_tema = get_stylesheet_directory_uri();
        ?>
        <script>
            function checkIt(evt) {
                evt = (evt) ? evt : window.event
                var charCode = (evt.which) ? evt.which : evt.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    status = "This field accepts numbers only."
                    return false
                }
                status = ""
                return true
            }
        </script>

        <!-- BEGIN JIVOSITE CODE --> <script type='text/javascript'> (function () {
        var widget_id = 'zlVIwvy5J8';
        var d = document;
        var w = window;
        function l() {
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = '//code.jivosite.com/script/widget/' + widget_id;
            var ss = document.getElementsByTagName('script')[0];
            ss.parentNode.insertBefore(s, ss);
        }
        if (d.readyState == 'complete') {
            l();
        } else {
            if (w.attachEvent) {
                w.attachEvent('onload', l);
            } else {
                w.addEventListener('load', l, false);
            }
        }
    })();</script> <!-- END JIVOSITE CODE -->
    </head>
    <body <?php body_class(); ?> >
        <div class="contenedor relativo">
            <!--
            <a href="#" class="btn-flotante">
                <img src="<?php echo $ruta_tema; ?>/images/btn-flotante.png" alt="call" class="btn-lateral" />
                <img src="<?php echo $ruta_tema; ?>/images/btn-chat-mobil.png" alt="call-mobil" class="btn-lateral-responsive" />
            </a>
            -->
            <section id="top-header">
                <div class="cont-padding">
                    <ul class="topmenu">
                        <li class="enlace1"><a href=""><i class="fas fa-phone"></i> <span>1800 1001 22</span></a></li>
                        <li class="enlace2"><a href="https://api.whatsapp.com/send?phone=593962881111&text=&source=&data=" target="_blank"><i class="fab fa-whatsapp"></i>
                        <span>096 2881 111</span></a></li>
                        <li style="padding-right: 0;" class="enlace3"><a href="mailto: info@1001carros.com" target="_blank"><i class="fas fa-envelope"></i></a></li>
                    </ul>
                </div>
            </section>
            <header id="mainheader">
                <div class="cont-padding">
                    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo $ruta_tema; ?>/images/logo_1001.png" alt="logo" class="pull-left img-main-logo">
                    </a>
                    <div id="btn-colapse">
                        <a href="#" class="btn-toogle">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu_principal',
                        'menu_class' => 'main-menu'
                    ));
                    ?>
                </div>
            </header>
