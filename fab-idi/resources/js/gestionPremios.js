import $ from "jquery";
import confirmarEliminacion from "./confirmarEliminacion";

$(document).ready(function () {

    let tbody = document.querySelector("#tbody-tabla-premios");
    let queryInput = $("#buscar-premio");
    let tbodyDestacados = document.querySelector("#tbody-tabla-premios-destacados");

    //Obtiene todos los premios
    function obtenerPremios() {
        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-premios");

        if (tbody) {
            tbody.innerHTML = "";
            return fetch("/obtener-premios-ajax", {
                method: "POST",
                body: JSON.stringify({ query: query }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).then(function (response) {
                return response.json();
            }).then(function (premios) {
                let premiosArray = Object.values(premios);
                // Filtrar premios activos
                let premiosActivos = premiosArray.filter(function (premio) {
                    return premio.activo === 1;
                });

                return premiosActivos;
            });

        }
    }

    //Muestra todos los premios en la tabla
    function mostrarPremios() {

        obtenerPremios().then(function (premios) {
            tbody.innerHTML = "";

            //Obtiene la cantidad de premios destacados
            let premiosDestacados = premios.filter(function (premio) {
                return premio.destacado === 1;
            });

            let numeroPremiosDestacados = premiosDestacados.length;

            //Obtiene los últimos 5 premios
            let ultimosPremios = premios.filter(function (premio) {
                return premio.destacado === 0;
            }).slice(-5).reverse();


            ultimosPremios.forEach(function (premio) {

                let fecha = new Date(premio.fecha);
                let fechaFormateada = `${String(fecha.getDate()).padStart(2, '0')}/${fecha.getMonth() + 1}/${fecha.getFullYear()}`;

                renderData(premio, fechaFormateada, numeroPremiosDestacados, tbody);

            });
        });
    }

    //Muestra premios destacados en la tabla
    function mostrarPremiosDestacados() {

        obtenerPremios().then(function (premios) {
            tbodyDestacados.innerHTML = "";

            let premiosDestacados = premios.filter(function (premio) {
                return premio.destacado === 1;
            });

            premiosDestacados.forEach(function (premio) {

                let fecha = new Date(premio.fecha);
                let fechaFormateada = `${String(fecha.getDate()).padStart(2, '0')}/${fecha.getMonth() + 1}/${fecha.getFullYear()}`;

                renderDataDestacados(premio, fechaFormateada, tbodyDestacados);

            });
        });
    }

    //Muestra los premios que coinciden con la búsqueda
    function mostrarPremiosCoincidentes() {

        obtenerPremios().then(function (premios) {
            tbody.innerHTML = "";

            //Obtiene la cantidad de premios destacados
            let premiosDestacados = premios.filter(function (premio) {
                return premio.destacado === 1;
            });

            let numeroPremiosDestacados = premiosDestacados.length;

            //Filtra los premios que coinciden con la búsqueda
            let premiosFiltrados = premios.filter(function (premio) {
                return premio.titulo.toLowerCase().includes(queryInput.val());
            });

            premiosFiltrados.forEach(function (premio) {
                let fecha = new Date(premio.fecha);
                let fechaFormateada = `${String(fecha.getDate()).padStart(2, '0')}/${fecha.getMonth() + 1}/${fecha.getFullYear()}`;

                renderData(premio, fechaFormateada, numeroPremiosDestacados, tbody);

            });
        });
    }

    //Renderiza los datos de todos los premios
    function renderData(premio, fechaFormateada, numeroPremiosDestacados, tbody) {

        let rowHtml = `
                        <tr>
                            <td style="width:10%;"><img class='imagen-fit'src="${rutaImagen}/${premio.imagen}" alt="foto-perfil-entidad"></td>
                            <td>${premio.titulo}</td>
                            <td>${fechaFormateada}</td>
                            <td>${premio.url ? `<a href="${premio.url}" target="_blank">Ver más</a>` : ''}</td>
                            <td>
                            <a href="/gestion-premios/editar/${premio.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href='#' class="btn btn-danger btn-admin-delete" data-nombre-elemento="${premio.titulo}" data-id-elemento="${premio.id}"><i class="fa-solid fa-trash"></i></a>
                            ${numeroPremiosDestacados < 4 ?
                `<a href="${premio.destacado ? `gestion-premios/destacar/${premio.id}` : `gestion-premios/destacar/${premio.id}`}" class="btn ${premio.destacado ? "btn-admin-save" : "btn btn-admin-premio"} btn-destacar-premio">
                                                <i class="fa-solid fa-eye"></i>
                                    </a>`
                : ''}
                            </td>
                        </tr>
                    `;
        tbody.innerHTML += rowHtml;

        //Añade el evento de confirmación de eliminación a los enlaces de eliminación
        const enlacesEliminacion = tbody.querySelectorAll('.btn-admin-delete');
        const urlEliminar = `/gestion-premios/eliminar/`;
        confirmarEliminacion(enlacesEliminacion, urlEliminar);

    }

    //Renderiza los datos de los premios destacados
    function renderDataDestacados(premio, fechaFormateada, tbody) {
        let rowHtml = `
                        <tr>
                            <td style="width:10%;"><img class='imagen-fit' src="${rutaImagen}/${premio.imagen}" alt="foto-perfil-entidad"></td>
                            <td>${premio.titulo}</td>
                            <td>${fechaFormateada}</td>
                            <td>${premio.url ? `<a href="${premio.url}" target="_blank">Ver más</a>` : ''}</td>
                            <td>
                            <a href="/gestion-premios/editar/${premio.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href='#' class="btn btn-danger btn-admin-delete" data-nombre-elemento="${premio.titulo}" data-id-elemento="${premio.id}"><i class="fa-solid fa-trash"></i></a>                            
                            <a href="/gestion-premios/quitar-destacado/${premio.id}" class="btn btn-admin-premio"><i class="fa-solid fa-eye-slash"></i></a>
                            </td>
                        </tr>
                    `;
        tbody.innerHTML += rowHtml;

        //Añade el evento de confirmación de eliminación a los enlaces de eliminación
        const enlacesEliminacion = tbody.querySelectorAll('.btn-admin-delete');
        const urlEliminar = `/gestion-premios/eliminar/`;
        confirmarEliminacion(enlacesEliminacion, urlEliminar);

    }
    
    //Muestra premios al cargar la página
    mostrarPremios();
    mostrarPremiosDestacados();

    //Obtiene el input de búsqueda y muestra los premios coincidentes o no
    $("#buscar-premio").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();

        if (query.length === 0) {
            mostrarPremios();
        } else {
            mostrarPremiosCoincidentes();
        }
    });
});


