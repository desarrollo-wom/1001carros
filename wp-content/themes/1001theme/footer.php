
<?php
$ruta_tema = get_stylesheet_directory_uri();
$host_url= get_home_url();
?>
<footer>
    <div class="cont-padding" id="footer-desktop">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-pie" style="align-self: center;">
                <img src="<?php echo $ruta_tema; ?>/images/logo1001pie.png" alt="logo-pie" style="width: 100%;max-width:315px;">
            </div>
            <div class="col-xs-12 col-sm-3 col-pie">
            <div class="block">
                    <a href="<?php echo $host_url; ?>/financiamiento" class="enlace-footer">Financiamiento</a>
                </div>
                <div class="block">
                    <a href="<?php echo $host_url; ?>/vender" class="enlace-footer">Quiero vender</a>
                </div>
                <div class="block">
                    <a href="<?php echo $host_url; ?>/comprar" class="enlace-footer">Quiero comprar</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-pie">
                <div class="block">
                    <a href="<?php echo $host_url; ?>/trabaja" class="enlace-footer">Trabaja con nosotros</a>
                </div>
                <div class="block">
                    <a href="<?php echo $host_url; ?>/contacto" class="enlace-footer">Contáctanos</a>
                </div>
                <div class="block">
                    <a href="https://api.whatsapp.com/send?phone=593962881111&text=&source=&data=" class="enlace-footer" target="_blank">WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
    <div class="cont-padding" id="footer-mobil">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-3 col-pie">
                <div class="block">
                    <a href="financiamiento.html" class="enlace-footer">Financiamiento</a>
                </div>
                <div class="block">
                    <a href="vender.html" class="enlace-footer">Quiero vender</a>
                </div>
                <div class="block">
                    <a href="comprar.html" class="enlace-footer">Quiero comprar</a>
                </div>
                <div class="block">
                    <a href="trabaja.html" class="enlace-footer">Trabaja con nosotros</a>
                </div>
                <div class="block">
                    <a href="<?php echo $host_url; ?>/contacto" class="enlace-footer">Contáctanos</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-pie">
                <div class="block">
                    <a href="tel:+1800100122" class="enlace-footer">1800 1001 22</a>
                </div>
                <div class="block">
                    <a href="https://api.whatsapp.com/send?phone=593962881111&text=&source=&data=" class="enlace-footer">WhatsApp</a>
                </div>
            </div>
        </div>
    </div>

</footer>
<section id="copy-section">
    <div class="cont-padding">
        <div class="row" style="margin-right:0px!important;margin-left:0px!important;">
            <div class="col-8 col-left"><a href="<?php echo $host_url; ?>" class="enlace-copy"><span>Copyright</span> ©
                    1001Carros.com</a></div>
            <div class="col-4 col-right">
                <p class="p-copy"><span>Siguenos:</span> </p><a href="https://www.facebook.com/1001carros/" target="_blank" class="enlace-redes-footer"><img src="<?php echo $ruta_tema; ?>/images/face-footer.png"
                                                                                                          alt="icono-fabeook"></a><a href="https://www.youtube.com/channel/UCjScEGgZjqlX3aP9lU5trwg" target="_blank" class="enlace-redes-footer"><img src="<?php echo $ruta_tema; ?>/images/youtube-footer.png"
                                                                                     alt="icono-youtube"></a>
            </div>
        </div>
    </div>
</section>
<a href="#" class="btn-go-top"><i class="fas fa-chevron-up"></i></a>
</div> <!-- final del  contenedor global-->
<?php wp_footer(); ?>
</body>
</html>
