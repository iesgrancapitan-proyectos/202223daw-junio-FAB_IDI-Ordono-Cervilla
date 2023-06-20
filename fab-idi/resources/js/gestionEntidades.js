import $ from 'jquery';
import confirmarEliminacion from "./confirmarEliminacion";

$(document).ready(function () {
    const originalTbodyContent = $("#tbody-tabla-gestion-entidades").html();
    let tbody = document.querySelector("#tbody-tabla-gestion-entidades");
    let queryInput = $("#buscar-gestion-entidades");

    //Obtiene el el tipo de colaborador de una entidad dado un ID
    function getColaborador(colaboradorId) {
        let colaboradorEncontrado = '';

        $.ajax({
            url: '/obtener-colaboradores-ajax/',
            method: 'GET',
            async: false,  // Asegura que la petición se realice de forma síncrona
            success: function (colaboradores) {
                colaboradores.forEach(element => {
                    if (element.id == colaboradorId) {
                        colaboradorEncontrado = element.colaborador;
                    }
                });
            },
            error: function () {
                console.log('Ocurrió un error al obtener los colaboradores.');
            }
        });

        return colaboradorEncontrado;
    }

    //Obtiene todas las entidades mediante una petición AJAX
    function obtenerEntidades() {
        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-gestion-entidades");

        if (tbody) {
            tbody.innerHTML = "";

            return fetch('/obtener-entidades-ajax', {
                method: 'POST',
                body: JSON.stringify({ query: query }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(function (response) {
                return response.json();
            }).then(function (entidades) {
                // Filtrar entidades activos
                let entidadesArray = Object.values(entidades);
                let entidadesActivas = entidadesArray.filter(function (entidad) {
                    return entidad.activo === 1;
                });

                return entidadesActivas;
            });
        }
    }

    //Muestra todas las entidades en la tabla
    function mostrarEntidades() {

        obtenerEntidades().then(function (entidades) {
            tbody.innerHTML = "";

            let ultimasEntidades = entidades.slice(-5).reverse();

            ultimasEntidades.forEach(function (entidad) {

                if (entidad.colaborador_id != null) { //Si el entidad tiene un colaborador asociado se obtiene el nombre del colaborador
                    entidad.colaborador_id = getColaborador(entidad.colaborador_id);
                }
                renderData(entidad, tbody);
            });

        });
    }

    function mostrarEntidadesCoincidentes() {

        let query = queryInput.val().toLowerCase();

        obtenerEntidades().then(function (entidades) {
            tbody.innerHTML = "";

            let entidadesFiltradas = entidades.filter(function (entidad) {
                if (entidad.nombre) {
                    return entidad.nombre.toLowerCase().includes(query);
                }
                return false;
            });


            entidadesFiltradas.forEach(function (entidad) {

                if (entidad.colaborador_id != null) { //Si el entidad tiene un colaborador asociado se obtiene el nombre del colaborador
                    entidad.colaborador_id = getColaborador(entidad.colaborador_id);
                }
                renderData(entidad, tbody);
            });
        });
    }

    //Muestra entidades al cargar la página
    mostrarEntidades();

    //Muestra los entidades que coincidan con la búsqueda
    $("#buscar-gestion-entidades").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();
        tbody.innerHTML = "";

        if (query.length === 0) {
            mostrarEntidades();
        } else {
            mostrarEntidadesCoincidentes();
        }
    });
});

function renderData(entidad, tbody) {
    let rowHtml = `
                    <tr>
                    <td style="width:30px;"><img class='imagen-fit' src="${rutaImagen}/${entidad.imagen}" alt="foto-perfil-entidad"></td>
                    <td>${entidad.web ? `<a href="${entidad.web}" target="_blank">${entidad.nombre}</a>` : entidad.nombre}</td>
                    <td>${entidad.representante ? entidad.representante : ''}</td>
                    <td><a href="mailto:${entidad.email}">${entidad.email}</a></td>
                    <td>${entidad.telefono ? entidad.telefono : ''}</td>
                    <td>${entidad.colaborador_id ? entidad.colaborador_id : ''}</td>
                    <td>
                    <a href='#' class="btn btn-danger btn-admin-delete" data-nombre-elemento="${entidad.nombre}" data-id-elemento="${entidad.id}"><i class="fa-solid fa-trash"></i></a>                            
                    <a href="/gestion-entidades/editar-entidad/${entidad.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr> 
                    `;
    tbody.innerHTML += rowHtml;

    //Añade el evento de confirmación de eliminación a los enlaces de eliminación
    const enlacesEliminacion = tbody.querySelectorAll('.btn-admin-delete');
    const urlEliminar = `/gestion-entidades/eliminar-entidad/`;
    confirmarEliminacion(enlacesEliminacion, urlEliminar);
}