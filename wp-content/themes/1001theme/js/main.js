$(function () {
    $('.btn-toogle').click(function (e) {
        e.preventDefault();

        var menu = $('.main-menu');

        var action = 0;

        if (menu.hasClass('active') == true) {
            action = 1;
            menu.removeClass('active');
            menu.css('display', 'none');
            
            $('.btn-toogle i').addClass('fa-bars');
            $('.btn-toogle i').removeClass('fa-times');
        }

        if (menu.hasClass('active') == false && action == 0) {
            menu.addClass('active');
            menu.css('display', 'block');

            $('.btn-toogle i').removeClass('fa-bars');
            $('.btn-toogle i').addClass('fa-times');
        }

        var flecharight = $('.carousel-control-next');
        if (menu.hasClass('active') == true) {
            flecharight.css('z-index', '9999');
            menu.css('z-index', '10000');
        } else {
            flecharight.css('z-index', '20000');
            menu.css('z-index', '-1');
        }



    });

    $('#marcas_search').click(function (e) {
        e.preventDefault();
        console.log('OK');
    });

    $('.botones-p').click(function (e) {
        e.preventDefault();
        console.log('OK');
    });

    $('.btn.btn-link').click(function (e) {
        e.preventDefault();
        var cardpadre = $(this).parent('.card-header:after');
    });

    $('.btn-go-top').click(function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 1000);
    });

    $('.btn-down').click(function (e) {
        e.preventDefault();
        var altura = $('html,body').height();


        $('html,body').animate({
            scrollTop: altura
        }, 1000);
    });

    //efects blocks home

    $('#mascara_paso1').mouseover(function () {
        $('#des_paso1').removeClass('sr-only');
        $('#letras-efecto1').addClass('arriba');
        $('#letras-efecto1').removeClass('abajo');
    });

    $('#mascara_paso1').mouseleave(function () {
        $('#des_paso1').addClass('sr-only');
        $('#letras-efecto1').removeClass('arriba');
        $('#letras-efecto1').addClass('abajo');
    });

    $('#mascara_paso2').mouseover(function () {
        var d = $('#des_paso2').removeClass('sr-only');
        $('#letras-efecto2').addClass('arriba');
        $('#letras-efecto2').removeClass('abajo');
    });

    $('#mascara_paso2').mouseleave(function () {
        $('#des_paso2').addClass('sr-only');
        $('#letras-efecto2').removeClass('arriba');
        $('#letras-efecto2').addClass('abajo');
    });

    $('#mascara_paso3').mouseover(function () {
        $('#des_paso3').removeClass('sr-only');
        $('#letras-efecto3').addClass('arriba');
        $('#letras-efecto3').removeClass('abajo');
    });

    $('#mascara_paso3').mouseleave(function () {
        $('#des_paso3').addClass('sr-only');
        $('#letras-efecto3').removeClass('arriba');
        $('#letras-efecto3').addClass('abajo');
    });

    $('#mascara_paso4').mouseover(function () {
        console.log('OK');
        $('#des_paso4').removeClass('sr-only');
        $('#letras-efecto4').addClass('arriba');
        $('#letras-efecto4').removeClass('abajo');
    });

    $('#mascara_paso4').mouseleave(function () {
        $('#des_paso4').addClass('sr-only');
        $('#letras-efecto4').removeClass('arriba');
        $('#letras-efecto4').addClass('abajo');
    });

    $('#mascara_paso5').mouseover(function () {
        $('#des_paso5').removeClass('sr-only');
        $('#letras-efecto5').addClass('arriba');
        $('#letras-efecto5').removeClass('abajo');
    });

    $('#mascara_paso5').mouseleave(function () {
        $('#des_paso5').addClass('sr-only');
        $('#letras-efecto5').removeClass('arriba');
        $('#letras-efecto5').addClass('abajo');
    });

    $('#mascara_paso6').mouseover(function () {
        $('#des_paso6').removeClass('sr-only');
        $('#letras-efecto6').addClass('arriba');
        $('#letras-efecto6').removeClass('abajo');
    });

    $('#mascara_paso6').mouseleave(function () {
        $('#des_paso6').addClass('sr-only');
        $('#letras-efecto6').removeClass('arriba');
        $('#letras-efecto6').addClass('abajo');
    });


    $(document).ready(function () {
        var cabecera = $('#mainheader');
        var barra = $('#section-datos');
        var altura = 0;
        var alturabarra = 0;
        /*

                if(mainheader!=null){
                    altura = mainheader.offset().top;
                }
                if(barra!=null){
                    alturabarra = barra.offset().top; 
                }*/


        $(window).on('scroll', function () {
            var ancho = $(window).width(); //ancho de la ventana

            if ($(window).scrollTop() > altura) {
                $('#mainheader').addClass('header-fixed');
                $('#top-header').addClass('top-fixed');
              //  if (ancho > 768) {
                    $('#section-datos').addClass('barra-fixed');
               // }
            } else {
                $('#mainheader').removeClass('header-fixed');
               // if (ancho > 768) {
                    $('#section-datos').removeClass('barra-fixed');
                    $('#top-header').removeClass('top-fixed');
              //  }
            }

        });

    });


    //bloque de imagenes pasos home
    var altura_img = $('.img-subir').height();
    var screen_width = $(window).width();

    if (screen_width < 1020) {
        $('.efectos').height(altura_img);
        $('.efectos .mascara').height(altura_img);
    }




});