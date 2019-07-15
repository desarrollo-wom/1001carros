$(function (e) {
    dibujarmapa_amazonas();
    $('#accordion').on('click', '#heading1', function (e) {
        dibujarmapa_amazonas();
    });

    $('#accordion').on('click', '#heading2', function (e) {
        dibujarmapa_carrion()
    });

    $('#accordion').on('click', '#heading3', function (e) {
        dibujarmapa_cumbaya();
    });

    $('#accordion').on('click', '#heading4', function (e) {
        dibujarmapa_sanbartolo()
    });

    $('#accordion').on('click', '#heading5', function (e) {
        dibujarmapa_sanrafael();
    });

    $('#accordion').on('click', '#heading6', function (e) {
        dibujarmapa_santodomingo();
    });

    $('#accordion').on('click', '#heading7', function (e) {
        dibujarmapa_tallermonteserrin();
    });

    $('#accordion').on('click', '#heading10', function (e) {
        dibujarmapa_bicentenario();
    });


    function dibujarmapa_amazonas() {
        var objDIV = $("#cont-mapa-agencias").attr('alt');
        var objDIV2 = $("#cont-map-mobil-1").attr('alt');
        var host = $('#host').val();

        var url_icono = host + "/wp-content/uploads/2019/05/puntero1.png";

        if (objDIV == 'b') {
            //obtener el div contenedor del mapa
            var divMapa = $("#cont-mapa-agencias");
            var lat = -0.192614;  //latitud del centro del mapa
            var long = -78.488814; //longitud del centro del mapa

            var latLong = new google.maps.LatLng(lat, long);

            var objConfMapa = {
                zoom: 17,
                center: latLong,
                scrollwheel: false
            }

            var mapa = new google.maps.Map(divMapa[0], objConfMapa);

            //Crear market finca 1
            var latLongFinca1 = new google.maps.LatLng('-0.192614', '-78.488814');

            var confFinca1 = {
                position: latLongFinca1,
                map: mapa
            }

            var markaFinca1 = new google.maps.Marker(confFinca1);
            markaFinca1.setIcon(url_icono);

            var objHTML1 = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - Amazonas</h5>\n\
            <p style="color:#000;">Av. Gral. Eloy Alfaro y Av. Amazonas</p></div>'
            }

            var popIS1 = new google.maps.InfoWindow(objHTML1);

            google.maps.event.addListener(markaFinca1, 'click', function () {
                popIS1.open(mapa, markaFinca1);
            });
        }

        if (objDIV2 == 'c') {
            //obtener el div contenedor del mapa
            var divMapa_mob = $("#cont-map-mobil-1");
            var lat_mob = -0.192614;  //latitud del centro del mapa
            var long_mob = -78.488814; //longitud del centro del mapa

            var latLong_mob = new google.maps.LatLng(lat_mob, long_mob);


            var objConfMapa_mob = {
                zoom: 17,
                center: latLong_mob,
                scrollwheel: false
            }

            var mapa_mob = new google.maps.Map(divMapa_mob[0], objConfMapa_mob);


            //Crear market finca 1
            var latLongFinca1_mob = new google.maps.LatLng('-0.192614', '-78.488814');

            var confFinca1_mob = {
                position: latLongFinca1_mob,
                map: mapa_mob
            }


            var markaFinca1_mob = new google.maps.Marker(confFinca1_mob);
            markaFinca1_mob.setIcon(url_icono);

            var objHTML1_mob = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - Amazonas</h5>\n\
            <p style="color:#000;">Av. Gral. Eloy Alfaro y Av. Amazonas</p></div>'
            }

            var popIS1_mob = new google.maps.InfoWindow(objHTML1_mob);

            google.maps.event.addListener(markaFinca1_mob, 'click', function () {
                popIS1_mob.open(mapa_mob, markaFinca1_mob);
            });

        }

    }

    function dibujarmapa_carrion() {
        var objDIV = $("#cont-mapa-agencias").attr('alt');
        var objDIV2 = $("#cont-map-mobil-2").attr('alt');
        var host = $('#host').val();
        var url_icono = host + "/wp-content/uploads/2019/05/puntero1.png";

        if (objDIV == 'b') {
            //obtener el div contenedor del mapa
            var divMapa = $("#cont-mapa-agencias");
            var lat = -0.202462;  //latitud del centro del mapa
            var long = -78.497410; //longitud del centro del mapa

            var latLong = new google.maps.LatLng(lat, long);


            var objConfMapa = {
                zoom: 17,
                center: latLong,
                scrollwheel: false
            }

            var mapa = new google.maps.Map(divMapa[0], objConfMapa);


            //Crear market finca 1

            var latLongFinca1 = new google.maps.LatLng('-0.202462', '-78.497410');

            var confFinca1 = {
                position: latLongFinca1,
                map: mapa
            }

            var markaFinca1 = new google.maps.Marker(confFinca1);
            markaFinca1.setIcon(url_icono);
            //  markaFinca1.setIcon();

            var objHTML1 = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - Carrión</h5>\n\
            <p style="color:#000;">Av. Carrión 1030 y av. 10 de Agosto</p></div>'
            }

            var popIS1 = new google.maps.InfoWindow(objHTML1);

            google.maps.event.addListener(markaFinca1, 'click', function () {
                popIS1.open(mapa, markaFinca1);

            });
        }


        if (objDIV2 == 'c') {
            //obtener el div contenedor del mapa
            var divMapa_mob = $("#cont-map-mobil-2");
            var lat_mob = -0.202462;  //latitud del centro del mapa
            var long_mob = -78.497410; //longitud del centro del mapa

            var latLong_mob = new google.maps.LatLng(lat_mob, long_mob);


            var objConfMapa_mob = {
                zoom: 17,
                center: latLong_mob,
                scrollwheel: false
            }

            var mapa_mob = new google.maps.Map(divMapa_mob[0], objConfMapa_mob);


            //Crear market finca 1

            var latLongFinca1_mob = new google.maps.LatLng('-0.202462', '-78.497410');

            var confFinca1_mob = {
                position: latLongFinca1_mob,
                map: mapa_mob
            }

            var markaFinca1_mob = new google.maps.Marker(confFinca1_mob);
            markaFinca1_mob.setIcon(url_icono);

            var objHTML1_mob = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - Carrión</h5>\n\
            <p style="color:#000;">Av. Carrión 1030 y av. 10 de Agosto</p></div>'
            }

            var popIS1_mob = new google.maps.InfoWindow(objHTML1_mob);

            google.maps.event.addListener(markaFinca1_mob, 'click', function () {
                popIS1_mob.open(mapa_mob, markaFinca1_mob);

            });
        }
    }

    function dibujarmapa_cumbaya() {
        var objDIV = $("#cont-mapa-agencias").attr('alt');
        var objDIV2 = $("#cont-map-mobil-3").attr('alt');
        var host = $('#host').val();
        var url_icono = host + "/wp-content/uploads/2019/05/puntero1.png";

        if (objDIV == 'b') {
            //obtener el div contenedor del mapa
            var divMapa = $("#cont-mapa-agencias");
            var lat = -0.196763;  //latitud del centro del mapa
            var long = -78.441162; //longitud del centro del mapa

            var latLong = new google.maps.LatLng(lat, long);


            var objConfMapa = {
                zoom: 17,
                center: latLong,
                scrollwheel: false
            }

            var mapa = new google.maps.Map(divMapa[0], objConfMapa);

            //Crear market finca 1
            var latLongFinca1 = new google.maps.LatLng('-0.196763', '-78.441162');

            var confFinca1 = {
                position: latLongFinca1,
                map: mapa
            }

            var markaFinca1 = new google.maps.Marker(confFinca1);
            markaFinca1.setIcon(url_icono);
            //  markaFinca1.setIcon();

            var objHTML1 = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - Cumbaya</h5>\n\
            <p style="color:#000;">Via Interoceánica 8001</p></div>'
            }

            var popIS1 = new google.maps.InfoWindow(objHTML1);

            google.maps.event.addListener(markaFinca1, 'click', function () {
                popIS1.open(mapa, markaFinca1);

            });
        }

        if (objDIV2 == 'c') {
            //obtener el div contenedor del mapa
            var divMapa_mob = $("#cont-map-mobil-3");
            var lat_mob = -0.196763;  //latitud del centro del mapa
            var long_mob = -78.441162; //longitud del centro del mapa

            var latLong_mob = new google.maps.LatLng(lat_mob, long_mob);


            var objConfMapa_mob = {
                zoom: 17,
                center: latLong_mob,
                scrollwheel: false
            }

            var mapa_mob = new google.maps.Map(divMapa_mob[0], objConfMapa_mob);

            //Crear market finca 1
            var latLongFinca1_mob = new google.maps.LatLng('-0.196763', '-78.441162');

            var confFinca1_mob = {
                position: latLongFinca1_mob,
                map: mapa_mob
            }

            var markaFinca1_mob = new google.maps.Marker(confFinca1_mob);
            markaFinca1_mob.setIcon(url_icono);

            var objHTML1_mob = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - Cumbaya</h5>\n\
            <p style="color:#000;">Via Interoceánica 8001</p></div>'
            }

            var popIS1_mob = new google.maps.InfoWindow(objHTML1_mob);

            google.maps.event.addListener(markaFinca1_mob, 'click', function () {
                popIS1_mob.open(mapa_mob, markaFinca1_mob);

            });
        }
    }

    function dibujarmapa_sanbartolo() {
        var objDIV = $("#cont-mapa-agencias").attr('alt');
        var objDIV2 = $("#cont-map-mobil-4").attr('alt');
        var host = $('#host').val();
        var url_icono = host + "/wp-content/uploads/2019/05/puntero1.png";

        if (objDIV == 'b') {
            //obtener el div contenedor del mapa
            var divMapa = $("#cont-mapa-agencias");
            var lat = -0.272220;  //latitud del centro del mapa
            var long = -78.528965; //longitud del centro del mapa

            var latLong = new google.maps.LatLng(lat, long);

            var objConfMapa = {
                zoom: 17,
                center: latLong,
                scrollwheel: false
            }

            var mapa = new google.maps.Map(divMapa[0], objConfMapa);

            //Crear market finca 1
            var latLongFinca1 = new google.maps.LatLng('-0.272220', '-78.528965');

            var confFinca1 = {
                position: latLongFinca1,
                map: mapa
            }

            var markaFinca1 = new google.maps.Marker(confFinca1);
            markaFinca1.setIcon(url_icono);
            //  markaFinca1.setIcon();

            var objHTML1 = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - San Bartolo</h5>\n\
            <p style="color:#000;">Av. Maldonado S/N y El Tablón</p></div>'
            }

            var popIS1 = new google.maps.InfoWindow(objHTML1);

            google.maps.event.addListener(markaFinca1, 'click', function () {
                popIS1.open(mapa, markaFinca1);

            });
        }

        if (objDIV2 == 'c') {
            //obtener el div contenedor del mapa
            var divMapa_mob = $("#cont-map-mobil-4");
            var lat_mob = -0.272220;  //latitud del centro del mapa
            var long_mob = -78.528965; //longitud del centro del mapa

            var latLong_mob = new google.maps.LatLng(lat_mob, long_mob);

            var objConfMapa_mob = {
                zoom: 17,
                center: latLong_mob,
                scrollwheel: false
            }

            var mapa_mob = new google.maps.Map(divMapa_mob[0], objConfMapa_mob);

            //Crear market finca 1
            var latLongFinca1_mob = new google.maps.LatLng('-0.272220', '-78.528965');

            var confFinca1_mob = {
                position: latLongFinca1_mob,
                map: mapa_mob
            }

            var markaFinca1_mob = new google.maps.Marker(confFinca1_mob);
            markaFinca1_mob.setIcon(url_icono);

            var objHTML1_mob = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - San Bartolo</h5>\n\
            <p style="color:#000;">Av. Maldonado S/N y El Tablón</p></div>'
            }

            var popIS1_mob = new google.maps.InfoWindow(objHTML1_mob);

            google.maps.event.addListener(markaFinca1_mob, 'click', function () {
                popIS1_mob.open(mapa_mob, markaFinca1_mob);

            });
        }
    }

    function dibujarmapa_sanrafael() {
        var objDIV = $("#cont-mapa-agencias").attr('alt');
        var objDIV2 = $("#cont-map-mobil-5").attr('alt');
        var host = $('#host').val();
        var url_icono = host + "/wp-content/uploads/2019/05/puntero1.png";

        if (objDIV == 'b') {
            //obtener el div contenedor del mapa
            var divMapa = $("#cont-mapa-agencias");
            var lat = -0.305208;  //latitud del centro del mapa
            var long = -78.453168; //longitud del centro del mapa

            var latLong = new google.maps.LatLng(lat, long);

            var objConfMapa = {
                zoom: 17,
                center: latLong,
                scrollwheel: false
            }

            var mapa = new google.maps.Map(divMapa[0], objConfMapa);

            //Crear market finca 1
            var latLongFinca1 = new google.maps.LatLng('-0.305208', '-78.453168');

            var confFinca1 = {
                position: latLongFinca1,
                map: mapa
            }

            var markaFinca1 = new google.maps.Marker(confFinca1);
            markaFinca1.setIcon(url_icono);

            var objHTML1 = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - Los Chillos</h5>\n\
            <p style="color:#000;">Av. San Luis S/S y 9na Transversal</p></div>'
            }

            var popIS1 = new google.maps.InfoWindow(objHTML1);

            google.maps.event.addListener(markaFinca1, 'click', function () {
                popIS1.open(mapa, markaFinca1);

            });
        }

        if (objDIV2 == 'c') {
            //obtener el div contenedor del mapa
            var divMapa_mob = $("#cont-map-mobil-5");
            var lat_mob = -0.305208;  //latitud del centro del mapa
            var long_mob = -78.453168; //longitud del centro del mapa

            var latLong_mob = new google.maps.LatLng(lat_mob, long_mob);

            var objConfMapa_mob = {
                zoom: 17,
                center: latLong_mob,
                scrollwheel: false
            }

            var mapa_mob = new google.maps.Map(divMapa_mob[0], objConfMapa_mob);

            //Crear market finca 1
            var latLongFinca1_mob = new google.maps.LatLng('-0.305208', '-78.453168');

            var confFinca1_mob = {
                position: latLongFinca1_mob,
                map: mapa_mob
            }

            var markaFinca1_mob = new google.maps.Marker(confFinca1_mob);
            markaFinca1_mob.setIcon(url_icono);

            var objHTML1_mob = {
                content: '<div style="width:275px;height:90px;font-family: Tun;"><h5>Agencia - Los Chillos</h5>\n\
            <p style="color:#000;">Av. San Luis S/S y 9na Transversal</p></div>'
            }

            var popIS1_mob = new google.maps.InfoWindow(objHTML1_mob);

            google.maps.event.addListener(markaFinca1_mob, 'click', function () {
                popIS1_mob.open(mapa_mob, markaFinca1_mob);

            });
        }
    }

    function dibujarmapa_santodomingo() {
        var objDIV = $("#cont-mapa-agencias").attr('alt');
        var objDIV2 = $("#cont-map-mobil-6").attr('alt');
        var host = $('#host').val();
        var url_icono = host + "/wp-content/uploads/2019/05/puntero1.png";

        if (objDIV == 'b') {
            //obtener el div contenedor del mapa
            var divMapa = $("#cont-mapa-agencias");
            var lat = -0.233138;  //latitud del centro del mapa
            var long = -79.167148; //longitud del centro del mapa

            var latLong = new google.maps.LatLng(lat, long);

            var objConfMapa = {
                zoom: 17,
                center: latLong,
                scrollwheel: false
            }

            var mapa = new google.maps.Map(divMapa[0], objConfMapa);

            //Crear market finca 1
            var latLongFinca1 = new google.maps.LatLng('-0.233138', '-79.167148');

            var confFinca1 = {
                position: latLongFinca1,
                map: mapa
            }

            var markaFinca1 = new google.maps.Marker(confFinca1);
            markaFinca1.setIcon(url_icono);

            var objHTML1 = {
                content: '<div style="width:300px;height:100px;font-family: Tun;"><h5>Agencia - Santo Domingo</h5>\n\
            <p style="color:#000;">Av. Esmeraldas y Av. De los Colonos S/N esquina Redondel Sueño de Bolívar</p></div>'
            }

            var popIS1 = new google.maps.InfoWindow(objHTML1);

            google.maps.event.addListener(markaFinca1, 'click', function () {
                popIS1.open(mapa, markaFinca1);

            });
        }

        if (objDIV2 == 'c') {
            //obtener el div contenedor del mapa
            var divMapa_mob = $("#cont-map-mobil-6");
            var lat_mob = -0.233138;  //latitud del centro del mapa
            var long_mob = -79.167148; //longitud del centro del mapa

            var latLong_mob = new google.maps.LatLng(lat_mob, long_mob);

            var objConfMapa_mob = {
                zoom: 17,
                center: latLong_mob,
                scrollwheel: false
            }

            var mapa_mob = new google.maps.Map(divMapa_mob[0], objConfMapa_mob);

            //Crear market finca 1
            var latLongFinca1_mob = new google.maps.LatLng('-0.233138', '-79.167148');

            var confFinca1_mob = {
                position: latLongFinca1_mob,
                map: mapa_mob
            }

            var markaFinca1_mob = new google.maps.Marker(confFinca1_mob);
            markaFinca1_mob.setIcon(url_icono);

            var objHTML1_mob = {
                content: '<div style="width:300px;height:100px;font-family: Tun;"><h5>Agencia - Santo Domingo</h5>\n\
            <p style="color:#000;">Av. Esmeraldas y Av. De los Colonos S/N esquina Redondel Sueño de Bolívar</p></div>'
            }

            var popIS1_mob = new google.maps.InfoWindow(objHTML1_mob);

            google.maps.event.addListener(markaFinca1_mob, 'click', function () {
                popIS1_mob.open(mapa_mob, markaFinca1_mob);
            });
        }
    }

    function dibujarmapa_tallermonteserrin() {
        var objDIV = $("#cont-mapa-agencias").attr('alt');
        var objDIV2 = $("#cont-map-mobil-7").attr('alt');
        var host = $('#host').val();
        var url_icono = host + "/wp-content/uploads/2019/05/puntero1.png";

        if (objDIV == 'b') {
            //obtener el div contenedor del mapa
            var divMapa = $("#cont-mapa-agencias");
            var lat = -0.159462;  //latitud del centro del mapa
            var long = -78.463430; //longitud del centro del mapa

            var latLong = new google.maps.LatLng(lat, long);

            var objConfMapa = {
                zoom: 17,
                center: latLong,
                scrollwheel: false
            }

            var mapa = new google.maps.Map(divMapa[0], objConfMapa);

            //Crear market finca 1
            var latLongFinca1 = new google.maps.LatLng('-0.159462', '-78.463430');

            var confFinca1 = {
                position: latLongFinca1,
                map: mapa
            }

            var markaFinca1 = new google.maps.Marker(confFinca1);
            markaFinca1.setIcon(url_icono);

            var objHTML1 = {
                content: '<div style="width:300px;height:100px;font-family: Tun;"><h5>Taller - Monteserrín</h5>\n\
            <p style="color:#000;">Av. Esmeraldas y Av. De los Colonos S/N esquina Redondel Sueño de Bolívar</p></div>'
            }

            var popIS1 = new google.maps.InfoWindow(objHTML1);

            google.maps.event.addListener(markaFinca1, 'click', function () {
                popIS1.open(mapa, markaFinca1);

            });
        }

        if (objDIV2 == 'c') {
            //obtener el div contenedor del mapa
            var divMapa_mob = $("#cont-map-mobil-7");
            var lat_mob = -0.159462;  //latitud del centro del mapa
            var long_mob = -78.463430; //longitud del centro del mapa

            var latLong_mob = new google.maps.LatLng(lat_mob, long_mob);

            var objConfMapa_mob = {
                zoom: 17,
                center: latLong_mob,
                scrollwheel: false
            }

            var mapa_mob = new google.maps.Map(divMapa_mob[0], objConfMapa_mob);

            //Crear market finca 1
            var latLongFinca1_mob = new google.maps.LatLng('-0.159462', '-78.463430');

            var confFinca1_mob = {
                position: latLongFinca1_mob,
                map: mapa_mob
            }

            var markaFinca1_mob = new google.maps.Marker(confFinca1_mob);
            markaFinca1_mob.setIcon(url_icono);

            var objHTML1_mob = {
                content: '<div style="width:300px;height:100px;font-family: Tun;"><h5>Taller - Monteserrín</h5>\n\
            <p style="color:#000;">Av. Esmeraldas y Av. De los Colonos S/N esquina Redondel Sueño de Bolívar</p></div>'
            }

            var popIS1_mob = new google.maps.InfoWindow(objHTML1_mob);

            google.maps.event.addListener(markaFinca1_mob, 'click', function () {
                popIS1_mob.open(mapa_mob, markaFinca1_mob);

            });
        }
    }

    function dibujarmapa_bicentenario() {
        var objDIV = $("#cont-mapa-agencias").attr('alt');
        var objDIV2 = $("#cont-map-mobil-10").attr('alt');

        var host = $('#host').val();
        var url_icono = host + "/wp-content/uploads/2019/05/puntero1.png";

        if (objDIV == 'b') {
            //obtener el div contenedor del mapa
            var divMapa = $("#cont-mapa-agencias");
            var lat = -0.150274;  //latitud del centro del mapa
            var long = -78.484440; //longitud del centro del mapa

            var latLong = new google.maps.LatLng(lat, long);

            var objConfMapa = {
                zoom: 17,
                center: latLong,
                scrollwheel: false
            }

            var mapa = new google.maps.Map(divMapa[0], objConfMapa);

            //Crear market finca 1
            var latLongFinca1 = new google.maps.LatLng('-0.150274', '-78.484440');

            var confFinca1 = {
                position: latLongFinca1,
                map: mapa
            }

            var markaFinca1 = new google.maps.Marker(confFinca1);
            markaFinca1.setIcon(url_icono);

            var objHTML1 = {
                content: '<div style="width:300px;height:100px;font-family: Tun;"><h5>Agencia - Bicentenario</h5>\n\
            <p style="color:#000;">Galo Plaza Lasso Y, Rafael Ramos, Quito</p></div>'
            }

            var popIS1 = new google.maps.InfoWindow(objHTML1);

            google.maps.event.addListener(markaFinca1, 'click', function () {
                popIS1.open(mapa, markaFinca1);

            });
        }

        if (objDIV2 == 'c') {
            //obtener el div contenedor del mapa
            var divMapa_mob = $("#cont-map-mobil-10");
            var lat_mob = -0.150274;  //latitud del centro del mapa
            var long_mob = -78.484440; //longitud del centro del mapa

            var latLong_mob = new google.maps.LatLng(lat_mob, long_mob);

            var objConfMapa_mob = {
                zoom: 17,
                center: latLong_mob,
                scrollwheel: false
            }

            var mapa_mob = new google.maps.Map(divMapa_mob[0], objConfMapa_mob);

            //Crear market finca 1
            var latLongFinca1_mob = new google.maps.LatLng('-0.150274', '-78.484440');

            var confFinca1_mob = {
                position: latLongFinca1_mob,
                map: mapa_mob
            }

            var markaFinca1_mob = new google.maps.Marker(confFinca1_mob);
            markaFinca1_mob.setIcon(url_icono);

            var objHTML1_mob = {
                content: '<div style="width:300px;height:100px;font-family: Tun;"><h5>Agencia - Bicentenario</h5>\n\
            <p style="color:#000;">Galo Plaza Lasso Y, Rafael Ramos, Quito</p></div>'
            }

            var popIS1_mob = new google.maps.InfoWindow(objHTML1_mob);

            google.maps.event.addListener(markaFinca1_mob, 'click', function () {
                popIS1_mob.open(mapa_mob, markaFinca1_mob);

            });
        }
    }

});