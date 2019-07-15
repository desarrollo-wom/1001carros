$(document).ready(function () {

    $('#ex1').slider({value: 0});

    $('#ex2').slider(
            {
                min: 12,
                max: 48,
                step: 12
            });

    $('#ex3').slider({
        min: 12,
        max: 48,
        step: 12
    });


    $('.btn-reservalo').click(function(e){
        e.preventDefault();
       $('.popup_reservar').fadeIn(500);
        
    });

    $('.btn-close-popup').click(function(e){
        e.preventDefault();
        $('.popup_reservar').fadeOut(500);
    });

    $('.btn-send-reserva').click(function(e){
        e.preventDefault();

       var enviar =true;
       var nombres=$('#nombres').val();
       var error_nombres=$('#error_nombres');
       var celular=$('#celular').val();
       var error_celular=$('#error_celular');
       var email=$('#email').val();
       var error_email=$('#error_email');

       if(nombres==""){
           enviar=false;
           error_nombres.removeClass('sr-only');
       }else{
        error_nombres.addClass('sr-only');
       }

       if(celular==""){
        enviar=false;
        error_celular.removeClass('sr-only');
        }else{
         error_celular.addClass('sr-only');
        }

       if(email==""){
        enviar=false;
        error_email.removeClass('sr-only');
       }else{
         error_email.addClass('sr-only');
       }

       var mensaje=$('#mensaje').val();
       var placa=$('#placa').val();

       var data={
           'nombres':nombres,
           'celular':celular,
           'email':email,
           'mensaje':mensaje,
           'placa':placa
       }

       var host = $('#host').val();
       var url = $('#host_url').val() + "/controller/procesaReservar.php";


       $.ajax(
       {
            url: url,
            type: 'POST',
            data: data
        }
        ).done(function (request) {
          
            //reset the form
            $('#form-reservar')[0].reset();
            $('#sent_ok').removeClass('sr-only');
            $('.popup_reservar').fadeOut(500);
        });

    });



    //calcular los valores de financiamiento
    var cantMeses = $('#mesesvalue').val();
    var valorTotal = $('#precioPvp').val();
    var iva = $('#iva').val();

    var valorEntradaMin = parseFloat((valorTotal * 35) / 100);

    var valorminimoentrada = $('#valorminimoentrada');
    valorminimoentrada.html(valorEntradaMin);
    $('#valormedioentrada').html(parseFloat(valorTotal / 2));
    $('#valormaximoentrada').html(valorTotal);

    $('#ex1').slider('refresh', {useCurrentValue: true});
    $('#ex1').slider({step: 1, min: valorEntradaMin, max: parseInt(valorTotal), value: 0});
    $('#entrada-value').val("$"+valorEntradaMin);
    $('#entradavalue').val(valorEntradaMin);


    //valores iniciales para el rastreo satelital
    var valorInicialRastreo = 0;
    var campoValorR = $('#costo_rastreo');


    var valorRastreo = 0;
    if (valorTotal < 20000) {

        var subtotal = 380;
        var ivaSubtotal = (subtotal * iva) / 100;
        valorRastreo = subtotal + ivaSubtotal;

    } else {
        var subtotal = 550;
        var ivaSubtotal = (subtotal * iva) / 100;
        valorRastreo = subtotal + ivaSubtotal;
    }



    var meses = parseInt(($('#meses_rastreo').val()) / 12);

    valorRastreo = valorRastreo * meses;
    campoValorR.val("$"+valorRastreo);
    $('#costoR').val(valorRastreo);

    //calcular el valor del seguro
    //valor del seguro es igual a 4.9% del total anual
    var valorSeguro = (valorTotal * 4.9) / 100;

    if (cantMeses == 24) {
        valorSeguro = valorSeguro * 2;
    }
    if (cantMeses == 36) {
        valorSeguro = valorSeguro * 3;
    }
    if (cantMeses == 48) {
        valorSeguro = valorSeguro * 4;
    }

    //diferencia entre entrada 
    var montoFinanciar = valorTotal - valorEntradaMin;

    var valorFinanciar = 0;


    valorFinanciar += montoFinanciar;

    // calcular intereses
    var valorInteres = 0;
    if (cantMeses == 12) {
        valorInteres = (valorFinanciar * 9) / 100;
    }
    if (cantMeses == 24) {
        valorInteres = (valorFinanciar * 18) / 100;
    }
    if (cantMeses == 36) {
        valorInteres = (valorFinanciar * 27) / 100;
    }
    if (cantMeses == 48) {
        valorInteres = (valorFinanciar * 36) / 100;
    }

    //1-se adiciona el valor del seguro
    valorFinanciar += valorSeguro;

    //adicionar el valor del interes
    valorFinanciar += valorInteres;


    var cuota = parseFloat(valorFinanciar / cantMeses);

    $('#cuota-value').val("$"+cuota.toFixed(2));

    $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerMode: false,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: false,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });

    $('#more-carros').on('click', '.vermasotrocarro', function (e) {
        e.preventDefault();

        var form = $(this).parent().parent().parent('form');
        form.submit();
    });

    $("#ex1").on("slide", function (slideEvt) {
        $("#entrada-value").val("$"+slideEvt.value);
        $("#entradavalue").val(slideEvt.value);

        //recalcular el valor de las cuotas variando la entrada
        //paso 1
        var montoFinanciar = 0;
        var valorTotal = $('#precioPvp').val();
        montoFinanciar = valorTotal - slideEvt.value;

        //paso 2
        //calcular el interes del valor a financiar segun los meses

        var valorInteres = 0;
        if (cantMeses == 12) {
            valorInteres = (montoFinanciar * 9) / 100;
        }
        if (cantMeses == 24) {
            valorInteres = (montoFinanciar * 18) / 100;
        }
        if (cantMeses == 36) {
            valorInteres = (montoFinanciar * 27) / 100;
        }
        if (cantMeses == 48) {
            valorInteres = (montoFinanciar * 36) / 100;
        }

        //paso 3
        //calcular el valor del seguro del carro
        var valorSeguro = (valorTotal * 4.9) / 100;

        if (cantMeses == 24) {
            valorSeguro = valorSeguro * 2;
        }
        if (cantMeses == 36) {
            valorSeguro = valorSeguro * 3;
        }
        if (cantMeses == 48) {
            valorSeguro = valorSeguro * 4;
        }

        //paso 4
        //valores iniciales para el rastreo satelital
        var valorRastreo = 0;
        if (valorTotal < 20000) {

            var subtotal = 380;
            var ivaSubtotal = (subtotal * iva) / 100;
            valorRastreo = subtotal + ivaSubtotal;

        } else {
            var subtotal = 550;
            var ivaSubtotal = (subtotal * iva) / 100;
            valorRastreo = subtotal + ivaSubtotal;
        }

        var meses = parseInt(($('#meses_rastreo').val()) / 12);

        valorRastreo = valorRastreo * meses;



        var cuota = parseFloat((montoFinanciar + valorInteres + valorSeguro + valorRastreo) / cantMeses);

        $('#cuota-value').val("$"+cuota.toFixed(2));
        $('#cuotavalue').val(cuota.toFixed(2));

    });

    $("#ex2").on("slide", function (slideEvt) {
        $("#meses-value").val(slideEvt.value + " meses");
        $("#mesesvalue").val(slideEvt.value);
        var cantMeses = slideEvt.value;

        //recalculo de la cuota al variar la cantidade de meses plazo
        //paso 1
        var montoFinanciar = 0;
        var valorTotal = $('#precioPvp').val();
        var entrada = $('#entradavalue').val();
        montoFinanciar = valorTotal - entrada;

        //paso 2
        //calcular el interes del valor a financiar segun los meses
        var valorInteres = 0;
        if (cantMeses == 12) {
            valorInteres = (montoFinanciar * 9) / 100;
        }
        if (cantMeses == 24) {
            valorInteres = (montoFinanciar * 18) / 100;
        }
        if (cantMeses == 36) {
            valorInteres = (montoFinanciar * 27) / 100;
        }
        if (cantMeses == 48) {
            valorInteres = (montoFinanciar * 36) / 100;
        }

        //paso 3
        //calcular el valor del seguro del carro
        var valorSeguro = (valorTotal * 4.9) / 100;

        if (cantMeses == 24) {
            valorSeguro = valorSeguro * 2;
        }
        if (cantMeses == 36) {
            valorSeguro = valorSeguro * 3;
        }
        if (cantMeses == 48) {
            valorSeguro = valorSeguro * 4;
        }

        //paso 4
        //valores iniciales para el rastreo satelital
        var valorRastreo = 0;
        if (valorTotal < 20000) {

            var subtotal = 380;
            var ivaSubtotal = (subtotal * iva) / 100;
            valorRastreo = subtotal + ivaSubtotal;

        } else {
            var subtotal = 550;
            var ivaSubtotal = (subtotal * iva) / 100;
            valorRastreo = subtotal + ivaSubtotal;
        }

        var meses = parseInt(($('#meses_rastreo').val()) / 12);
        valorRastreo = valorRastreo * meses;


        var cuota = parseFloat((montoFinanciar + valorInteres + valorSeguro + valorRastreo) / cantMeses);

        $('#cuota-value').val("$"+cuota.toFixed(2));
        $('#cuotavalue').val(cuota.toFixed(2));
    });

    //actualizar el valor de la cantidad de meses que aplicaran el rastreo satelital
    $("#ex3").on("slide", function (slideEvt) {

        $("#meses_rastreo").val(slideEvt.value);
        var iva = $('#iva').val();
        //recalcular la cuota de rastreo satelital
        //valores iniciales para el rastreo satelital

        var valorInicialRastreo = 0;
        var valorTotal = parseInt($('#precioPvp').val());

        var campoValorR = $('#costo_rastreo');
        var costR = $('#costoR');

        if (valorTotal != "" && valorTotal != 0) {
            var valorRastreo = 0;

            if (valorTotal < 20000) {
                var subtotal = 380;
                var ivaSubtotal = (subtotal * iva) / 100;
                valorRastreo = subtotal + ivaSubtotal;

            } else {
                var subtotal = 550;
                var ivaSubtotal = (subtotal * iva) / 100;
                valorRastreo = subtotal + ivaSubtotal;
            }

            var meses = parseInt(($('#meses_rastreo').val()) / 12);

            valorRastreo = valorRastreo * meses;
            campoValorR.val("$"+valorRastreo.toFixed(2));
            costR.val(valorRastreo.toFixed(2));
        }
        


        var cantMeses = $('#mesesvalue').val();
        //recalculo de la cuota al variar la cantidade de meses plazo
        //paso 1
        var montoFinanciar = 0;
        var valorTotal = $('#precioPvp').val();
        var entrada = $('#entradavalue').val();
        montoFinanciar = valorTotal - entrada;

        //paso 2
        //calcular el interes del valor a financiar segun los meses

        var valorInteres = 0;
        if (cantMeses == 12) {
            valorInteres = (montoFinanciar * 9) / 100;
        }
        if (cantMeses == 24) {
            valorInteres = (montoFinanciar * 18) / 100;
        }
        if (cantMeses == 36) {
            valorInteres = (montoFinanciar * 27) / 100;
        }
        if (cantMeses == 48) {
            valorInteres = (montoFinanciar * 36) / 100;
        }

        //paso 3
        //calcular el valor del seguro del carro
        var valorSeguro = (valorTotal * 4.9) / 100;

        if (cantMeses == 24) {
            valorSeguro = valorSeguro * 2;
        }
        if (cantMeses == 36) {
            valorSeguro = valorSeguro * 3;
        }
        if (cantMeses == 48) {
            valorSeguro = valorSeguro * 4;
        }

        //paso 4
        //valores iniciales para el rastreo satelital
        var valorRastreo = 0;
        if (valorTotal < 20000) {

            var subtotal = 380;
            var ivaSubtotal = (subtotal * iva) / 100;
            valorRastreo = subtotal + ivaSubtotal;

        } else {
            var subtotal = 550;
            var ivaSubtotal = (subtotal * iva) / 100;
            valorRastreo = subtotal + ivaSubtotal;
        }

        var meses = parseInt(($('#meses_rastreo').val()) / 12);
        valorRastreo = valorRastreo * meses;

        var cuota = parseFloat((montoFinanciar + valorInteres + valorSeguro + valorRastreo) / cantMeses);

        $('#cuota-value').val("$"+cuota.toFixed(2));
        $('#cuotavalue').val(cuota.toFixed(2));
    });


    $(window).on('scroll', function () {
        var ancho = $(window).width();
        var img_tumbail = $('#img-tumbail');
        var container_resumen_carro = $('#container-resumen-carro');
        if (ancho > 768) {
            if ($(window).scrollTop() > 100) {
                img_tumbail.removeClass('sr-only');
                container_resumen_carro.css('width', '85%');
                container_resumen_carro.css('margin-top', '8px');
                container_resumen_carro.css('margin-left', '15%');
            } else {
                img_tumbail.addClass('sr-only');
                container_resumen_carro.css('width', '100%');
                container_resumen_carro.css('margin-left', '0%');
                container_resumen_carro.css('margin-top', '0');
            }
        } else {
            if ($(window).scrollTop() > 100) {
                img_tumbail.removeClass('sr-only');
                container_resumen_carro.css('width', '100%');
                container_resumen_carro.css('margin-left', '');
                container_resumen_carro.css('margin-top', '14px');
            } else {
                img_tumbail.addClass('sr-only');
                container_resumen_carro.css('width', '100%');
                container_resumen_carro.css('margin-left', '0%');
                container_resumen_carro.css('margin-top', '0');
            }
        }

    });
}
);