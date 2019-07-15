$(function (e) {

    $('.btn-enviar-contacto').click(function (e) {

        e.preventDefault();

        var mensaje_to = $('#mensaje_to');
        var error_mensaje_to = $('#error_mensaje_to');
        var nombres = $('#nombres');
        var error_nombres = $('#error_nombres');
        var apellidos = $('#apellidos');
        var error_apellidos = $('#error_apellidos');
        var celular = $('#celular');
        var error_celular = $('#error_celular');
        var email = $('#email');
        var error_email = $('#error_email');
        var mensaje = $('#mensaje').val();

        var enviar = true;

        if (mensaje_to.val() == 0) {
            error_mensaje_to.removeClass('sr-only');
            enviar = false;
        } else {
            error_mensaje_to.addClass('sr-only');
        }

        if (nombres.val() == "") {
            error_nombres.removeClass('sr-only');
            enviar = false;
        } else {
            error_nombres.addClass('sr-only');
        }

        if (apellidos.val() == "") {
            error_apellidos.removeClass('sr-only');
            enviar = false;
        } else {
            error_apellidos.addClass('sr-only');
        }

        if (email.val() == '') {
            error_email.removeClass('sr-only');
            enviar = false;
        } else {
            error_email.addClass('sr-only');
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

        if (celular.val() == '') {
            error_celular.removeClass('sr-only');
            enviar = false;
        } else {
            error_celular.addClass('sr-only');
        }

        var url = $('#host_url').val() + "/controller/procesacontacto.php";


        var data = {
            'agencia': mensaje_to.val(),
            'nombres': nombres.val(),
            'apellidos': apellidos.val(),
            'celular': celular.val(),
            'correo': email.val(),
            'mensaje': mensaje
        };

        var loadingform = $('#loading-form');
        var sent_ok = $('#sent_ok');

        if (enviar) {

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

                //limpiar el formulario
                $('#form-contacto')[0].reset();
            });
        }


    });

    function isValidEmail(mail) {
        return /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
    }



});