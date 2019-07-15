$(document).ready(function () {


    $('.paso2-auto').fadeOut(0);
    $('.paso3-auto').fadeOut(0);

    function validarPaso1(){
        //capturar los datos
        var seguir = true;
        var placa = $('#placa');
        var year = $('#year');
        var marca = $('#marca');
        var modelo = $('#modelo');
        var kilometraje = $('#kilometraje');
        var color = $('#color');

        $('#placa_selected').val(placa.val());
        $('#year_selected').val(year.val());
        $('#marca_selected').val(marca.val());
        $('#modelo_selected').val(modelo.val());
        $('#kilometraje_selected').val(kilometraje.val());
        $('#color_selected').val(color.val());

        var error_paso1 = $('#error_paso1');

        if (placa.val() == "") {
            seguir = false;
            error_paso1.removeClass('sr-only');
            placa.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_paso1.addClass('sr-only');
            placa.css('border', '1px solid #999');
        }

        if (year.val() == "") {
            seguir = false;
            error_paso1.removeClass('sr-only');
            year.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_paso1.addClass('sr-only');
            year.css('border', '1px solid #999');
        }

        if (marca.val() == "") {
            seguir = false;
            error_paso1.removeClass('sr-only');
            marca.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_paso1.addClass('sr-only');
            marca.css('border', '1px solid #999');
        }

        if (modelo.val() == "") {
            seguir = false;
            error_paso1.removeClass('sr-only');
            modelo.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_paso1.addClass('sr-only');
            modelo.css('border', '1px solid #999');
        }

        if (kilometraje.val() == "") {
            seguir = false;
            error_paso1.removeClass('sr-only');
            kilometraje.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_paso1.addClass('sr-only');
            kilometraje.css('border', '1px solid #999');
        }

        if (color.val() == "") {
            seguir = false;
            error_paso1.removeClass('sr-only');
            color.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_paso1.addClass('sr-only');
            color.css('border', '1px solid #999');
        }

        /*
        if (seguir) {
            $('.paso2-auto').fadeIn('slow');
            $('.paso1-auto').fadeOut(0);
            $('.paso3-auto').fadeOut(0);

            var barrapaso1 = $('#barra-a-1');
            var barrapaso2 = $('#barra-a-2');
            var barrapaso3 = $('#barra-a-3');

            if (barrapaso2.hasClass('active') == false) {
                barrapaso2.addClass('active');
            }

            barrapaso1.removeClass('active');
            barrapaso3.removeClass('active');
        }
        */

        return seguir;
    }

    function validarPaso2(){
        var cont = true;
        var valoresperado = $('#valoresperado');
        var error_valoresperado = $('#error_valoresperado');

        var accidente_selected = $('#accidente_selected');
        var error_algunaccidente = $('#error_algunaccidente');
        var fallamec_selected = $('#fallamec_selected');
        var error_fallamecanica = $('#error_fallamecanica');
        var nollaves_selected = $('#nollaves_selected');
        var error_nollaves = $('#error_nollaves');
        var fumadocarro_selected = $('#fumadocarro_selected');
        var error_fumadocarro = $('#error_fumadocarro');
        var condcarro_selected = $('#condcarro_selected');
        var error_condiciones = $('#error_condiciones');

        if (valoresperado.val() == "") {
            cont = false;
            error_valoresperado.removeClass('sr-only');
            valoresperado.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_valoresperado.addClass('sr-only');
            valoresperado.css('border', '1px solid #999');
        }

        if (accidente_selected.val() == "") {
            cont = false;
            error_algunaccidente.removeClass('sr-only');
        } else {
            error_algunaccidente.addClass('sr-only');
        }

        if (fallamec_selected.val() == "") {
            cont = false;
            error_fallamecanica.removeClass('sr-only');
        } else {
            error_fallamecanica.addClass('sr-only');
        }

        if (nollaves_selected.val() == "") {
            cont = false;
            error_nollaves.removeClass('sr-only');
        } else {
            error_nollaves.addClass('sr-only');
        }

        if (fumadocarro_selected.val() == "") {
            cont = false;
            error_fumadocarro.removeClass('sr-only');
        } else {
            error_fumadocarro.addClass('sr-only');
        }

        if (condcarro_selected.val() == "") {
            cont = false;
            error_condiciones.removeClass('sr-only');
        } else {
            error_condiciones.addClass('sr-only');
        }

        /*
        if (cont) {
            $('.paso3-auto').fadeIn('slow');
            $('.paso2-auto').fadeOut(0);
            $('.paso1-auto').fadeOut(0);

            var barrapaso1 = $('#barra-a-1');
            var barrapaso2 = $('#barra-a-2');
            var barrapaso3 = $('#barra-a-3');

            if (barrapaso3.hasClass('active') == false) {
                barrapaso3.addClass('active');
            }

            barrapaso1.removeClass('active');
            barrapaso2.removeClass('active');
        }*/

        return cont;
    }

    function validarPaso3(){
        var finalizar = true;

        var nombres = $('#nombres');
        var error_nombres = $('#error_nombres');
        var apellidos = $('#apellidos');
        var error_apellidos = $('#error_apellidos');
        var celular = $('#celular');
        var error_celular = $('#error_celular');
        var email = $('#email');
        var error_email = $('#error_email');
        var agencia2 = $('#agencia2');
        var error_agencia2 = $('#error_agencia2');
        var cambiarcarro = $('#cambiarcarro');
        var error_cambiarcarro = $('#error_cambiarcarro');

        if (nombres.val() == "") {
            finalizar = false;
            error_nombres.removeClass('sr-only');
            nombres.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_nombres.addClass('sr-only');
            nombres.css('border', '1px solid #999');
        }

        if (apellidos.val() == "") {
            finalizar = false;
            error_apellidos.removeClass('sr-only');
            apellidos.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_apellidos.addClass('sr-only');
            apellidos.css('border', '1px solid #999');
        }

        if (celular.val() == "") {
            finalizar = false;
            error_celular.removeClass('sr-only');
            celular.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_celular.addClass('sr-only');
            celular.css('border', '1px solid #999');
        }

        if (email.val() == "") {
            finalizar = false;
            error_email.removeClass('sr-only');
            email.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_email.addClass('sr-only');
            email.css('border', '1px solid #999');
        }

        if (agencia2.val() == 0) {
            finalizar = false;
            error_agencia2.removeClass('sr-only');
            agencia2.css('border', '2px solid rgb(114,28,36)');
        } else {
            error_agencia2.addClass('sr-only');
            agencia2.css('border', '1px solid #999');
        }

        return finalizar;

    }

    $('.btn-finalizar').click(function (e) {
        e.preventDefault();

        validarPaso1();
        validarPaso2();
        validarPaso3();

        //if(validarPaso1() && validarPaso2 && validarPaso3()){
     if(true){
        //datos paso 1
           var placa=$('#placa').val();
           var year=$('#year').val();
           var marca=$('#marca').val();
           var modelo=$('#modelo').val();
           var kilometraje=$('#kilometraje').val();
           var color=$('#color').val();

        //datos paso 2
           var valoresperado=$('#valoresperado').val();
           var accidente_selected=$('#accidente_selected').val();
           var fallamec_selected=$('#fallamec_selected').val();
           var nollaves_selected=$('#nollaves_selected').val();
           var fumadocarro_selected=$('#fumadocarro_selected').val();
           var condcarro_selected=$('#condcarro_selected').val();

        //datos paso 3
           var nombres=$('#nombres').val();
           var apellidos=$('#apellidos').val();
           var celular=$('#celular').val();
           var email=$('#email').val();
           var agencia=$('#agencia2').val();
           var cambiarcarro=$('#cambiarcarro').val();

           var url = $('#host_url').val() + "/controller/procesaVender.php";

           var data={
               'placa':placa,
               'year':year,
               'marca':marca,
               'modelo':modelo,
               'kilometraje':kilometraje,
               'color':color,
               'valoresperado':valoresperado,
               'accidente_selected':accidente_selected,
               'fallamec_selected':fallamec_selected,
               'nollaves_selected':nollaves_selected,
               'fumadocarro_selected':fumadocarro_selected,
               'condcarro_selected':condcarro_selected,
               'nombres':nombres,
               'apellidos':apellidos,
               'celular':celular,
               'email':email,
               'agencia':agencia,
               'cambiarcarro':cambiarcarro
           };

           
           $.ajax(
            {
                url: url,
                type: 'POST',
                data: data
            }
    ).done(function (response) {

        resetFieldsForm();

        if(condcarro_selected=="Como nuevo" || condcarro_selected=="Bastante bien"){
            $('.contenedor-modal').css('visibility', 'visible');
            $('.modal-personalizado').css('visibility', 'visible');
        }

        if(condcarro_selected=="No tan bien"){
            $('.contenedor-modal').css('visibility', 'visible');
            $('.modal-personalizado').css('visibility', 'visible');
        }
       
        
    });
        }
        
    });


    function resetFieldsForm(){
        $('#placa').val('');
        $('#year').val('');
        $('#marca').val('');
        $('#modelo').val('');
        $('#kilometraje').val('');
        $('#color').val('');
        $('#valoresperado').val('');
        $('#accidente_selected').val('');
        $('#fallamec_selected').val('');
        $('#nollaves_selected').val('');
        $('#fumadocarro_selected').val('');
        $('#condcarro_selected').val('');
        $('#nombres').val('');
        $('#apellidos').val('');
        $('#celular').val('');
        $('#email').val('');
        $('#agencia2').val('');
        $('#cambiarcarro').val('');
    }

    $('.btn-close').click(function (e) {
        e.preventDefault();
        $('.contenedor-modal').css('visibility', 'hidden');
        $('.modal-personalizado').css('visibility', 'hidden');
    });


    $('#barra-a-1').click(function (e) {
        e.preventDefault();

        $('.paso1-auto').fadeIn('slow');
        $('.paso2-auto').fadeOut(0);
        $('.paso3-auto').fadeOut(0);

        var barrapaso1 = $('#barra-a-1');
        var barrapaso2 = $('#barra-a-2');
        var barrapaso3 = $('#barra-a-3');

        if (barrapaso1.hasClass('active') == false) {
            barrapaso1.addClass('active');
        }

        barrapaso2.removeClass('active');
        barrapaso3.removeClass('active');



    });

    $('#barra-a-2').click(function (e) {
        e.preventDefault();

        $('.paso2-auto').fadeIn('slow');
        $('.paso1-auto').fadeOut(0);
        $('.paso3-auto').fadeOut(0);

        var barrapaso1 = $('#barra-a-1');
        var barrapaso2 = $('#barra-a-2');
        var barrapaso3 = $('#barra-a-3');

        if (barrapaso2.hasClass('active') == false) {
            barrapaso2.addClass('active');
        }

        barrapaso1.removeClass('active');
        barrapaso3.removeClass('active');

    });

    $('#barra-a-3').click(function (e) {
        e.preventDefault();

        $('.paso3-auto').fadeIn('slow');
        $('.paso2-auto').fadeOut(0);
        $('.paso1-auto').fadeOut(0);

        var barrapaso1 = $('#barra-a-1');
        var barrapaso2 = $('#barra-a-2');
        var barrapaso3 = $('#barra-a-3');

        if (barrapaso3.hasClass('active') == false) {
            barrapaso3.addClass('active');
        }

        barrapaso1.removeClass('active');
        barrapaso2.removeClass('active');

    });

    $('#cont1').click(function (e) {
        e.preventDefault();
        validarPaso1();

    });

    $('#cont2').click(function (e) {
        e.preventDefault();
        validarPaso1();
        validarPaso2();
    });

    $('.btn-algun-accidente').click(function (e) {
        e.preventDefault();

        //desactivar todas
        var taccidente = $('.btn-algun-accidente');
        taccidente.each(function () {
            var elemt = $(this);
            if (elemt.hasClass('active')) {
                elemt.removeClass('active');
            }
        });

        $(this).addClass('active');

        $('#accidente_selected').val($(this).attr('alt'));
    });

    $('.btn-falla-mec').click(function (e) {
        e.preventDefault();

        //desactivar todas
        var taccidente = $('.btn-falla-mec');
        taccidente.each(function () {
            var elemt = $(this);
            if (elemt.hasClass('active')) {
                elemt.removeClass('active');
            }
        });

        $(this).addClass('active');
        $('#fallamec_selected').val($(this).attr('alt'));

    });

    $('.btn-no-llaves').click(function (e) {
        e.preventDefault();

        //desactivar todas
        var taccidente = $('.btn-no-llaves');
        taccidente.each(function () {
            var elemt = $(this);
            if (elemt.hasClass('active')) {
                elemt.removeClass('active');
            }
        });

        $(this).addClass('active');
        $('#nollaves_selected').val($(this).attr('alt'));
    });

    $('.btn-fumado-carro').click(function (e) {
        e.preventDefault();

        //desactivar todas
        var taccidente = $('.btn-fumado-carro');
        taccidente.each(function () {
            var elemt = $(this);
            if (elemt.hasClass('active')) {
                elemt.removeClass('active');
            }
        });

        $(this).addClass('active');
        $('#fumadocarro_selected').val($(this).attr('alt'));
    });

    $('.btn-cambiar-carro').click(function (e) {
        e.preventDefault();

        //desactivar todas
        var taccidente = $('.btn-cambiar-carro');
        taccidente.each(function () {
            var elemt = $(this);
            if (elemt.hasClass('active')) {
                elemt.removeClass('active');
            }
        });

        $(this).addClass('active');
        $('#cambiarcarro').val($(this).attr('alt'));
    });




    $('.btn-cond-carro').click(function (e) {
        e.preventDefault();

        //desactivar todas
        var taccidente = $('.btn-cond-carro');
        taccidente.each(function () {
            var elemt = $(this);
            if (elemt.hasClass('active')) {
                elemt.removeClass('active');
            }
        });

        $(this).addClass('active');
        $('#condcarro_selected').val($(this).attr('alt'));
    });


});