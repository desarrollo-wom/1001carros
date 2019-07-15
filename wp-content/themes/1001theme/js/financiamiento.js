$(function () {
    $(document).ready(function (e) {

        var iva = $('#iva').val();

        $('#valortotal').keyup(function (e) {

            $('#ex1').slider("enable");
            var valorTotal = $(this).val();
            $('#vtotal').val(valorTotal);


            if ($(this).val() == "") {
                valorTotal = 0;
            }

            //cantida de meses a financiar

            var cantMeses = $('#mesesvalue').val();

            var valorEntradaMin = parseFloat((valorTotal * 35) / 100);

            var valorminimoentrada = $('#valorminimoentrada');
            valorminimoentrada.html(valorEntradaMin);

            $('#valormedioentrada').html(parseFloat(valorTotal / 2));
            $('#valormaximoentrada').html(valorTotal);

            $('#ex1').slider('refresh', { useCurrentValue: true });
            $('#ex1').slider({ step: 1, min: valorEntradaMin, max: parseInt(valorTotal), value: 0 });
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
            $('#cuotavalue').val("$"+cuota.toFixed(2));

        });


        $('.btn-precalificacion').click(function (e) {
            e.preventDefault();
            var enviar = true;

            var nombres = $('#nombres');
            var error_nombres = $('#error_nombres');
            var apellidos = $('#apellidos');
            var error_apellidos = $('#error_apellidos');
            var cedula = $('#cedula');
            var error_cedula = $('#error_cedula');
            var celular = $('#celular');
            var error_celular = $('#error_celular');
            var email = $('#email');
            var error_email = $('#error_email');
            var customCheck11 = $('#aceptarterminos');
            var error_customCheck11 = $('#error_customCheck11');

            //optener los valores referenciales de la cotizacion
            var valortotal = $('#valortotal').val();
            var entradavalue = $('#entradavalue').val();
            var mesesvalue = $('#mesesvalue').val();
            var meses_rastreo = $('#meses_rastreo').val();
            var costo_rastreo = $('#costo_rastreo').val();
            var cuotavalue=$('#cuotavalue').val();

            if (nombres.val() == "") {
                enviar = false;
                error_nombres.removeClass('sr-only');
                nombres.css('border-color', '#721c24');
            } else {
                error_nombres.addClass('sr-only');
                nombres.css('border-color', '#ccc');
            }

            if (apellidos.val() == "") {
                enviar = false;
                error_apellidos.removeClass('sr-only');
                apellidos.css('border-color', '#721c24');
            } else {
                error_apellidos.addClass('sr-only');
                apellidos.css('border-color', '#ccc');
            }

            if (cedula.val() == "") {
                enviar = false;
                error_cedula.removeClass('sr-only');
                cedula.css('border-color', '#721c24');
            } else {
                error_cedula.addClass('sr-only');
                cedula.css('border-color', '#ccc');
            }

            if (email.val() == "") {
                enviar = false;
                error_email.removeClass('sr-only');
                email.css('border-color', '#721c24');
            } else {
                error_email.addClass('sr-only');
                email.css('border-color', '#ccc');
            }

            if (isValidEmail(email.val())) {
                error_email.addClass('sr-only');
                error_email.html(' <p class="perror"><i class="fas fa-exclamation-triangle"></i> Campo correo obligatorio</p>');
            } else {
                if (!email.val() == '') {
                    error_email.html(' <p class="perror"><i class="fas fa-exclamation-triangle"></i> El formato del email no es correcto</p>');
                    error_email.removeClass('sr-only');
                    enviar = false;
                    email.css('border-color', '#721c24');
                }
            }

            if (celular.val() == "") {
                enviar = false;
                error_celular.removeClass('sr-only');
                celular.css('border-color', '#721c24');
            } else {
                error_celular.addClass('sr-only');
                celular.css('border-color', '#ccc');
            }

            if (customCheck11.is(':checked')) {
                error_customCheck11.addClass('sr-only');
            } else {
                enviar = false;
                error_customCheck11.removeClass('sr-only');
            }

            var url = $('#host_url').val() + "/controller/procesafinanciamiento.php";

            var data = {
                'nombres': nombres.val(),
                'apellidos': apellidos.val(),
                'cedula': cedula.val(),
                'celular': celular.val(),
                'email': email.val(),
                'valortotal': valortotal,
                'entradavalue': entradavalue,
                'mesesvalue': mesesvalue,
                'meses_rastreo': meses_rastreo,
                'costo_rastreo': costo_rastreo,
                'cuotavalue':cuotavalue
            };


            //proceso de envio al controllador por ajax
            if (enviar) {
                var loadingform = $('#loading-form');
                var sent_ok = $('#sent_ok');

                loadingform.removeClass('sr-only');

                $.ajax(
                    {
                        url: url,
                        type: 'POST',
                        data: data
                    }
                ).done(function (response) {
                    loadingform.addClass('sr-only');
                    sent_ok.removeClass('sr-only');


                    //ocultar 
                    setTimeout(function () {
                        sent_ok.fadeOut(1500);
                    }, 2000);

                   //reset los campos del formulario
                   $('#nombres').val('');
                   $('#apellidos').val('');
                   $('#cedula').val('');
                   $('#celular').val('');

                });

            }

        });

        $('.btn-condiciones-fin').click(function (e) {
            e.preventDefault();

            $(this).addClass('active');
            $('.btn-requisitos-fin').removeClass('active');

            $('#cont-cond-fin').removeClass('sr-only');

            if ($('#cont-requisitos-fin').hasClass('sr-only') == false) {
                $('#cont-requisitos-fin').addClass('sr-only');
            }
        });

        $('.btn-requisitos-fin').click(function (e) {
            e.preventDefault();
            $(this).addClass('active');
            $('.btn-condiciones-fin').removeClass('active');

            $('#cont-requisitos-fin').removeClass('sr-only');

            if ($('#cont-cond-fin').hasClass('sr-only') == false) {
                $('#cont-cond-fin').addClass('sr-only');
            }
        });

        $('#ex1').slider({ value: 0 });
        $('#ex1').slider("disable");
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


        $("#ex1").on("slide", function (slideEvt) {
            $("#entrada-value").val("$"+slideEvt.value);
            $("#entradavalue").val(slideEvt.value);
            
            var cantMeses = $('#mesesvalue').val();

            //recalcular el valor de las cuotas variando la entrada
            //paso 1
            var montoFinanciar = 0;
            var valorTotal = $('#vtotal').val();
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
            var valorTotal = $('#vtotal').val();
            var entrada = $('#entradavalue').val()
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
            var valorTotal = parseInt($('#valortotal').val());
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
            var valorTotal = $('#vtotal').val();
            var entrada = $('#entradavalue').val()
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

        function isValidEmail(mail) {
            return /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
        }

    });
});