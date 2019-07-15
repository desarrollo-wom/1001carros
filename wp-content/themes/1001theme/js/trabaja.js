$(function (e) {

    $("#adjuntos").fileinput({
        showUpload: false,
        maxFileCount: 1,
        mainClass: "input-group",
        browseLabel: "Buscar archivo",
        removeLabel: "Eliminar",
        showCaption: false,
        fileType: "xsl",
    });

    $('.btn-enviar-trabaja').click(function (e) {
        e.preventDefault();

        var enviar = true;

        var nombres = $('#nombres');
        var error_nombres = $('#error_nombres');
        var apellidos = $('#apellidos');
        var error_apellidos = $('#error_apellidos');
        var email = $('#email');
        var error_email = $('#error_email');
        var telefono = $('#telefono');
        var error_telefono = $('#error_telefono');
        var ciudad = $('#ciudad');
        var error_ciudad = $('#error_ciudad');

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

        if (ciudad.val() == "") {
            error_ciudad.removeClass('sr-only');
            enviar = false;
        } else {
            error_ciudad.addClass('sr-only');
        }

        if (telefono.val() == "") {
            error_telefono.removeClass('sr-only');
            enviar = false;
        } else {
            error_telefono.addClass('sr-only');
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

        if(enviar){
            $('#formtrabaja').submit();
            console.log('OK');
        }


    });

    function isValidEmail(mail) {
        return /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
    }

});