$(function () {

   // $("#precio_desde").mask("99999@9999.999");

    var filtros = {
        "tipos": [],
        "marcas": [],
        "precio": [],
        "annos": [],
        "kms": [],
        "placa": -1
    };

    var host = $('#host').val();

    function cerrarMenuFiltros(){
        var ancho =$(window).width();
        var menulateral = $('.cont-menu-result');
       if(ancho<=768){
        if (menulateral.is(":visible")) {
            menulateral.css('display', 'none');
        } else {
            menulateral.css('display', 'block');
        }
       }
    }

    //fuction for buscar los carros segun los filtros aplicados
    function buscarCarros() {

        //console.log(filtros);
        var cont_carros = $('#grid-result-carro');
        var url = $('#host_url').val() + "/controller/buscarController.php";

        filtrosAplicados();

        $('#progres_search').removeClass('sr-only');
        $.ajax(
            {
                url: url,
                type: 'POST',
                data: filtros
            }
        ).done(function (request) {

            var carros = JSON.parse(request);

            var cantCarros = carros.length;

            var html = "";

            $.each(carros, function (index) {

                //verificar que exista la foto
                var imageTipeCar = carros[index]['image'];
                var urlFoto = "";

                if (imageTipeCar == 1) {
                    urlFoto = host + "/fotosftp/" + carros[index]['placa'] + "/" + carros[index]['placa'] + "_1.JPG";
                }
                if (imageTipeCar == 2) {
                    urlFoto = host + "/fotosftp/" + carros[index]['placa'] + "/" + carros[index]['placa'] + "_1.jpg";
                }

                if (imageTipeCar == 0) {
                    urlFoto = host + "/fotosftp/proxima.png";
                }

                var grid_carro = '';
                grid_carro += '<div class="grid-auto-result">';
                grid_carro += '<div class="item">';
                grid_carro += '<img src="' + urlFoto + '" alt="auto-result1" style="width: 85%;">';
                grid_carro += '</div>';
                grid_carro += '<div class="item2" style="align-self: center;">';
                grid_carro += '<form action="' + host + '/carro" method="GET">'
                grid_carro += '<a href="#" class="detalle"><h1 class="titulo-ficha-result">' + carros[index]['modelo'] + '</h1></a>';
                grid_carro += '<a href="#" class="detalle"><p class="subtitulo-ficha-result">' + carros[index]['anno'] + ' I ' + carros[index]['kilometros'] + 'km I ' + carros[index]['transmicion'] + ' </p></a>';
                grid_carro += '<a href="#" class="detalle"><h1 class="titulo-ficha-result">' + carros[index]['precio'] + '</h1></a>';
                grid_carro += '<a href="#" class="detalle"><input type="hidden" name="placa" value="' + carros[index]['placa'] + '" id="' + carros[index]['placa'] + '"></a>';
                grid_carro += '<a href="#" class="btn-new vermasficha detalle">Ver más +</a>';
                grid_carro += '</form>';
                grid_carro += '</div>';
                grid_carro += '</div>';

                html += grid_carro;
            });

            cont_carros.html(html);

            if (cantCarros == 0) {
                html = "<h3>No se encontraron carros para los filtros seleccionados.</h3>";
                cont_carros.html(html);
            }

            $('#progres_search').addClass('sr-only');

        });
    }

    $('.barra-filtros').on('click', '.btn-close-filter', function (e) {
        e.preventDefault();

        var idComp = $(this).parent('div').attr('id');
        var tagTipo = $(this).parent('div');

        if (tagTipo.hasClass('filtro_tipo_selected')) {

            var id = $(tagTipo).attr('id');
            var tipoSelected = $('#tipo_' + id);


            if (tipoSelected.is(':checked')) {
                tipoSelected.attr('checked', false);
            }

            //buscar el filtro en el arreglo y eliminar
            var tiposApliqued = filtros.tipos;
            var posDelete = -1;

            $.each(tiposApliqued, function (index) {
                if (tiposApliqued[index]['valor'] == id) {
                    posDelete = index;
                }
            });

            filtros.tipos.splice(posDelete, 1);

        }


        if (tagTipo.hasClass('filtro_marca_selected')) {

            var id = $(tagTipo).attr('id');
            var tipoSelected = $('#marca_' + id);


            if (tipoSelected.is(':checked')) {
                tipoSelected.attr('checked', false);
            }

            //buscar el filtro en el arreglo y eliminar
            var marcasApliqued = filtros.marcas;
            var posDelete = -1;

            $.each(marcasApliqued, function (index) {
                if (marcasApliqued[index]['valor'] == id) {
                    posDelete = index;
                }
            });

            filtros.marcas.splice(posDelete, 1);

        }


        if (idComp == "filtro_precio_selected") {
            filtros.precio = [];

            $('#precio_desde').val('');
            $('#precio_hasta').val('');
        }
        if (idComp == "filtro_kms_selected") {
            filtros.kms = [];

            $('#year_desde').val('');
            $('#year_hasta').val('');
        }
        if (idComp == "filtro_placa_selected") {
            filtros.placa = -1;
            $('#nofinal').val('');
        }

        buscarCarros();

    });

    function filtrosAplicados() {

        var cont_filtros_desktop = $('.cont-filtros-desktop');

        cont_filtros_desktop.html('');
        var html = '';

        if (filtros.tipos.length > 0) {
            var filtrosTipos = filtros.tipos

            $.each(filtrosTipos, function (index) {
                html += '<div class="etiqueta-filtro filtro_tipo_selected"  id="' + filtrosTipos[index]['valor'] + '">' + filtrosTipos[index]['nombreTipo'] + '<i class="fas fa-times btn-close-filter"></i></div>';
            })

        }

        if (filtros.marcas.length > 0) {
            var filtrosMarcas = filtros.marcas

            $.each(filtrosMarcas, function (index) {
                html += '<div class="etiqueta-filtro filtro_marca_selected" id="' + filtrosMarcas[index]['valor'] + '">' + filtrosMarcas[index]['nombreMarca'] + '<i class="fas fa-times btn-close-filter"></i></div>';
            })
        }

        if (filtros.precio.length > 0) {
            if (filtros.precio[0] == 0 && filtros.precio[1] != 0) {
                html += '<div class="etiqueta-filtro" id="filtro_precio_selected">Precio(Max: ' + filtros.precio[1] + ' )<i class="fas fa-times btn-close-filter"></i></div>';
            }

            if (filtros.precio[0] != 0 && filtros.precio[1] == 0) {
                html += '<div class="etiqueta-filtro" id="filtro_precio_selected">Precio(Min: ' + filtros.precio[0] + ' )<i class="fas fa-times btn-close-filter"></i></div>';
            }

            if (filtros.precio[0] != 0 && filtros.precio[1] != 0) {
                html += '<div class="etiqueta-filtro" id="filtro_precio_selected">Precio(Min: ' + filtros.precio[0] + ' | Max: ' + filtros.precio[1] + ')<i class="fas fa-times tn-close-filter"></i></div>';
            }
        }

        if (filtros.annos.length > 0) {
            if (filtros.annos[0] == 0 && filtros.annos[1] != 0) {
                html += '<div class="etiqueta-filtro" id="filtro_annos_selected">Año(Max: ' + filtros.annos[1] + ' )<i class="fas fa-times btn-close-filter"></i></div>';
            }

            if (filtros.annos[0] != 0 && filtros.annos[1] == 0) {
                html += '<div class="etiqueta-filtro" id="filtro_annos_selected">Año(Min: ' + filtros.annos[0] + ' )<i class="fas fa-times btn-close-filter"></i></div>';
            }

            if (filtros.annos[0] != 0 && filtros.annos[1] != 0) {
                html += '<div class="etiqueta-filtro" id="filtro_annos_selected">Año(Min: ' + filtros.annos[0] + ' | Max: ' + filtros.annos[1] + ')<i class="fas fa-times tn-close-filter"></i></div>';
            }
        }

        if (filtros.kms.length > 0) {
            if (filtros.kms[0] == 0 && filtros.kms[1] != 0) {
                html += '<div class="etiqueta-filtro" id="filtro_kms_selected">Kms(Max: ' + filtros.kms[1] + ' )<i class="fas fa-times btn-close-filter"></i></div>';
            }

            if (filtros.kms[0] != 0 && filtros.kms[1] == 0) {
                html += '<div class="etiqueta-filtro" id="filtro_kms_selected">Kms(Min: ' + filtros.kms[0] + ' )<i class="fas fa-times btn-close-filter"></i></div>';
            }

            if (filtros.kms[0] != 0 && filtros.kms[1] != 0) {
                html += '<div class="etiqueta-filtro" id="filtro_kms_selected">Kms(Min: ' + filtros.kms[0] + ' | Max: ' + filtros.kms[1] + ')<i class="fas fa-times btn-close-filter"></i></div>';
            }
        }

        if (filtros.placa != -1) {
            html += '<div class="etiqueta-filtro" id="filtro_placa_selected">Placa(' + filtros.placa + ' )<i class="fas fa-times btn-close-filter"></i></div>';
        }

        cont_filtros_desktop.html(html);

    }

    $('.check-tipo').click(function () {

        var valor = $(this).val();
        var nombreTipo = $(this).data('name');

        var objTipo = {
            'valor': valor,
            'nombreTipo': nombreTipo
        }

        if ($(this).is(':checked')) {
            //se adiciona el valor al arreglo de tipos
            filtros.tipos.push(objTipo);
        } else {
            // se elimina el valor al arreglo de tipos

            //buscar el filtro en el arreglo y eliminar
            var tiposApliqued = filtros.tipos;
            var posDelete = -1;

            $.each(tiposApliqued, function (index) {
                if (tiposApliqued[index]['valor'] == valor) {
                    posDelete = index;
                }
            });

            filtros.tipos.splice(posDelete, 1);

        }
        buscarCarros();
        cerrarMenuFiltros();

    });

    $('.check-marca').click(function () {

        var valor = $(this).val();
        var nombreMarca = $(this).data('name');

        var objMarca = {
            'valor': valor,
            'nombreMarca': nombreMarca
        }

        if ($(this).is(':checked')) {
            //se adiciona el valor al arreglo de tipos
            filtros.marcas.push(objMarca);
        } else {
            // se elimina el valor al arreglo de tipos
            var marcasApliqued = filtros.marcas;
            var posDelete = -1;

            $.each(marcasApliqued, function (index) {
                if (marcasApliqued[index]['valor'] == valor) {
                    posDelete = index;
                }
            });

            filtros.marcas.splice(posDelete, 1);
        }
        buscarCarros();
        cerrarMenuFiltros();

    });


    $('.btn-buscar-precio').click(function (e) {
        e.preventDefault();

        var valorMin = $('#precio_desde').val();
        var valorMax = $('#precio_hasta').val();

        var error_buscar_precio = $('#error_buscar_precio');

        //reset el arreglo de precios
        filtros.precio = [];

        if (valorMin == "" && valorMax == "") {
            error_buscar_precio.removeClass('sr-only');
        } else {
            error_buscar_precio.addClass('sr-only');
            if (valorMin != "") {
                filtros.precio.push(valorMin);
            } else {
                filtros.precio.push(0);
            }

            if (valorMax != "") {
                filtros.precio.push(valorMax);
            } else {
                filtros.precio.push(0);
            }

        }

        buscarCarros();
        cerrarMenuFiltros();

    });


    $('.btn-buscar-anno').click(function (e) {
        e.preventDefault();

        var yearDesde = $('#year_desde').val();
        var yearHasta = $('#year_hasta').val();

        var error_buscar_year = $('#error_buscar_year');

        //reset el arreglo de precios
        filtros.annos = [];

        if (yearDesde == "" && yearHasta == "") {
            error_buscar_year.removeClass('sr-only');
        } else {
            error_buscar_year.addClass('sr-only');
            if (yearDesde != "") {
                filtros.annos.push(yearDesde);
            } else {
                filtros.annos.push(0);
            }

            if (yearHasta != "") {
                filtros.annos.push(yearHasta);
            } else {
                filtros.annos.push(0);
            }
        }

        buscarCarros();
        cerrarMenuFiltros();
    });

    $('.btn-buscar-km').click(function (e) {
        e.preventDefault();

        var kmDesde = $('#desde_km').val();
        var kmHasta = $('#hasta_km').val();

        var error_buscar_km = $('#error_buscar_km');

        //reset el arreglo de precios
        filtros.kms = [];

        if (kmDesde == "" && kmHasta == "") {
            error_buscar_km.removeClass('sr-only');
        } else {
            error_buscar_km.addClass('sr-only');
            if (kmDesde != "") {
                filtros.kms.push(kmDesde);
            } else {
                filtros.kms.push(0);
            }

            if (kmHasta != "") {
                filtros.kms.push(kmHasta);
            } else {
                filtros.kms.push(0);
            }
        }

        buscarCarros();
        cerrarMenuFiltros();
    });

    $('.btn-buscar-placa').click(function (e) {
        e.preventDefault();

        filtros.placa = -1;
        var placa = $('#nofinal').val();
        var error_buscar_placa = $('#error_buscar_placa');

        if (placa == '') {
            error_buscar_placa.removeClass('sr-only');
            filtros.kms = [];
        } else {
            error_buscar_placa.addClass('sr-only');
            filtros.placa = placa;
        }

        buscarCarros();
        cerrarMenuFiltros();
    });

    $(document).ready(function (e) {
        
        var ancho = $(window).width();


        if (ancho <= 991) {
            $('.cont-resultados').addClass('cont-padding');
            $('.cont-resultados').removeClass('row');
        } else {
            $('.cont-resultados').removeClass('cont-padding');
            $('.cont-resultados').addClass('row');
        }

        $('.btn-filtros').click(function (e) {
   
            var menulateral = $('.cont-menu-result');
            if (menulateral.is(":visible")) {
                menulateral.css('display', 'none');
            } else {
                menulateral.css('display', 'block');
            }
        });

            $(window).resize(function (e) {
                var ancho = $(window).width();
                if (ancho <= 991) {
                    $('.cont-resultados').addClass('cont-padding');
                    $('.cont-resultados').removeClass('row');
                } else {
                    $('.cont-resultados').removeClass('cont-padding');
                    $('.cont-resultados').addClass('row');
                }
            });

            $('#grid-result-carro').on('click', '.detalle', function (e) {
                e.preventDefault();
                var form = $(this).parent('form');
                form.submit();
            });

            //verificar los filtros aplicados desde el home y adicionarlos al objeto de filtros
            var tipo_carro = $('#tipo_carro').val();
            var marca_carro = $('#marca_carro').val();
            var precio = $('#precio').val();
            var filtrohome = $('#filtrohome').val();

            if (tipo_carro != 0) {
                var objTipo = {
                    'valor': tipo_carro,
                    'nombreTipo': filtrohome
                }

                filtros.tipos.push(objTipo);
            }

            if (marca_carro > 0) {
                var objMarca = {
                    'valor': marca_carro,
                    'nombreMarca': filtrohome
                }

                filtros.marcas.push(objMarca);
            }

            if (precio > 0) {
                filtros.precio.push(0);
                filtros.precio.push(precio); //se aplica el precio maximo
            }
        

    });


    $('.vermasmarca').click(function (e) {
        e.preventDefault();
        var filasmarca = $('.fila-marca');
        if (!$(this).hasClass('vermenosmarca')) {

            if (filasmarca.hasClass('sr-only')) {
                filasmarca.removeClass('sr-only');
            }

            $(this).html('Ver menos -');
            $(this).addClass('vermenosmarca');
        } else {
            $(this).html('Ver más +');
            $(this).removeClass('vermenosmarca');
            var filasmarca = $('.fila-marca');
            filasmarca.each(function () {
                var elemt = $(this);
                if (!elemt.hasClass('visibles-siempre')) {
                    elemt.addClass('sr-only');
                }
            });
        }

    });

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

    function fileExists(url) {
        if (url) {
            var req = new XMLHttpRequest();
            req.open('GET', url, false);
            req.send();
            return req.status == 200;
        } else {
            return false;
        }
    }


});           