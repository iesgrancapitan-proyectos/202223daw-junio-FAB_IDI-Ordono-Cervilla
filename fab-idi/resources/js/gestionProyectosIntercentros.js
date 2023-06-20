import $ from "jquery";
import confirmarEliminacion from "./confirmarEliminacion";

$(document).ready(function () {
    let tbody = document.querySelector("#tbody-tabla-proyectos-intercentros");
    let queryInput = $("#buscar-proyecto-intercentros");

    //Obtiene el curso académico del proyecto dado un ID
    function getCursoAcademico(proyectoId) {
        let cursoEncontrado = '';

        $.ajax({
            url: '/obtener-curso-academico-ajax/',
            method: 'GET',
            async: false,
            success: function (cursos) {
                cursos.forEach(curso => {
                    if (curso.id == proyectoId) {
                        cursoEncontrado = curso.curso_academico;
                    }
                });
            },
        });

        return cursoEncontrado;
    }

    //Obtiene todos los proyectos
    function obtenerProyectos() {
        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-proyectos-intercentros");

        if (tbody) {
            tbody.innerHTML = "";

            return fetch("/obtener-proyectos-ajax", {
                method: "POST",
                body: JSON.stringify({ query: query }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).then(function (response) {
                return response.json();
            }).then(function (proyectos) {
                let proyectosArray = Object.values(proyectos);
                //Filtra solo los proyectos activos
                let proyectosActivos = proyectosArray.filter(function (proyecto) {
                    return proyecto.tipo_proyecto_id == 2 && proyecto.activo == 1;
                });
                return proyectosActivos;
            });
        }
    }

    //Muestra todos los proyectos en la tabla
    function mostrarProyectos() {

        obtenerProyectos().then(function (proyectos) {
            tbody.innerHTML = "";

            //Obtiene los últimos 5 proyectos
            let ultimosProyectos = proyectos.filter(function (proyecto) {
                return proyecto.destacado === '0';
            }).slice(-5).reverse();

            ultimosProyectos.forEach(function (proyecto) {
                //Sacamos el string del curso académico del proyecto
                proyecto.curso_academico_id = getCursoAcademico(proyecto.curso_academico_id);
                renderData(proyecto, tbody);
            });
        });
    }

    //Muestra los proyectos que coinciden con la búsqueda
    function mostrarProyectosCoincidentes() {
        
        obtenerProyectos().then(function (proyectos) {
            tbody.innerHTML = "";
            
            //Filtra los proyectos que coinciden con la búsqueda
            let proyectosFiltrados = proyectos.filter(function (proyecto) {
                console.log(proyecto);
                return proyecto.nombre.toLowerCase().includes(queryInput.val());
            });

            proyectosFiltrados.forEach(function (proyecto) {

                renderData(proyecto, tbody);

            });
        });
    }

    //Renderiza los datos de todos los proyectos
    function renderData(proyecto, tbody) {
        proyecto.curso_academico_id = getCursoAcademico(proyecto.curso_academico_id);
        let rowHtml = `
                        <tr>
                            <td style="width:30px;"><img class='imagen-fit' src="${rutaImagen}/${proyecto.imagen}" alt="foto-perfil-entidad"></td>
                            <td>${proyecto.url ? `<a href="${proyecto.url}">${proyecto.nombre}</a>` : proyecto.nombre }</td>
                            <td>${proyecto.curso_academico_id}</td>
                            <td>
                            <a href="/gestion-proyectos/editar/${proyecto.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href='#' class="btn btn-danger btn-admin-delete" data-nombre-elemento="${proyecto.nombre}" data-id-elemento="${proyecto.id}"><i class="fa-solid fa-trash"></i></a>                                                        
                            </td>
                        </tr>
                    `;
        tbody.innerHTML += rowHtml;

        //Añade el evento de confirmación de eliminación a los enlaces de eliminación
        const enlacesEliminacion = tbody.querySelectorAll('.btn-admin-delete');
        const urlEliminar = `/gestion-proyectos/eliminar/`;
        confirmarEliminacion(enlacesEliminacion, urlEliminar);
    }

    //Muestra proyectos al cargar la página
    mostrarProyectos();

    //Muestra los proyectos que coinciden con la búsqueda
    $("#buscar-proyecto-intercentros").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();

        if (query.length === 0) {
            mostrarProyectos();
        } else {
            mostrarProyectosCoincidentes();
        }
    });
});


