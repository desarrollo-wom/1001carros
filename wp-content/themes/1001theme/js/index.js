$(function () {

    $(document).ready(function (e) {

        var ancho = $(window).width();

        $(window).resize(function (e) {
            ancho = $(window).width();
        });

        $('#section-sliders-responsive-vender').css('left', '-100%');

        $('#btn-comprar').click(function (e) {

            $(this).addClass('active');
            $('#btn-vender').removeClass('active');
            $('#p-paso-quiero').html('Compra tu carro con 3 grandes beneficios:');
            $('#grid-vender').addClass('sr-only');
            $('#grid-comprar').removeClass('sr-only');

            if (ancho <= 768) {
                $('#section-sliders-responsive-vender').css('display', 'none');
                $('#section-sliders-responsive-comprar').css('display', 'block');
            }

            $('#btn-comprar-final').removeClass('sr-only');
            $('#btn-vender-final').addClass('sr-only');
        });

        $('#btn-vender').click(function (e) {

            $(this).addClass('active');
            $('#btn-comprar').removeClass('active');
            $('#p-paso-quiero').html('Fácil, rápido y confiable:');
            $('#grid-comprar').addClass('sr-only');
            $('#grid-vender').removeClass('sr-only');

            if (ancho <= 768) {
                $('#section-sliders-responsive-vender').css('display', 'block');
                $('#section-sliders-responsive-comprar').css('display', 'none');
            }

            $('#btn-comprar-final').addClass('sr-only');
            $('#btn-vender-final').removeClass('sr-only');
        });

        $('#tipo_carro').change(function (e) {

            var valor = $(this).val();
            var form_home = $('#form_home');

            if (valor != 0) {
                form_home.submit();
            }
        });

        $('#marca').change(function (e) {
            var valor = $(this).val();
            var form_home = $('#form_home');

            if (valor != 0) {
                form_home.submit();
            }
        });

        $('#precio').change(function (e) {
            var valor = $(this).val();
            var form_home = $('#form_home');

            if (valor != 0) {
                form_home.submit();
            }
        });
    });
});