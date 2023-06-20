import $ from 'jquery';
import confirmarEliminacion from "./confirmarEliminacion";

$(document).ready(function () {
    const originalTbodyContent = $("#tbody-tabla-gestion-usuarios").html();
    let tbody = document.querySelector("#tbody-tabla-gestion-usuarios");
    let queryInput = $("#buscar-gestion-usuarios");

    //Obtiene el perfil del usuario dado un ID
    function getPerfil(perfilId) {
        let perfilEncontrado = '';

        $.ajax({
            url: '/obtener-perfiles-ajax/',
            method: 'GET',
            async: false,  // Asegura que la petición se realice de forma síncrona
            success: function (perfiles) {
                perfiles.forEach(element => {
                    if (element.id == perfilId) {
                        perfilEncontrado = element.perfil;
                    }
                });
            },
            error: function () {
                console.log('Ocurrió un error al obtener los perfiles.');
            }
        });

        return perfilEncontrado;
    }

    //Obtiene el el tipo de colaborador de un usuario dado un ID
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
                console.log('Ocurrió un error al obtener los perfiles.');
            }
        });

        return colaboradorEncontrado;
    }

    //Obtiene los todos usuarios mediante una petición AJAX
    function obtenerUsuarios() {
        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-gestion-usuarios");

        if (tbody) {
            tbody.innerHTML = "";

            return fetch('/obtener-usuarios-ajax', {
                method: 'POST',
                body: JSON.stringify({ query: query }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(function (response) {
                //console.log(response);
                return response.json();
            }).then(function (usuarios) {
                // Filtrar usuarios activos
                let usuariosActivos = usuarios.filter(function (usuario) {
                    return usuario.activo === 1;
                });

                return usuariosActivos;
            });
        }
    }

    //Muestra todos los usuarios en la tabla
    function mostrarUsuarios() {

        obtenerUsuarios().then(function (usuarios) {
            tbody.innerHTML = "";

            let ultimosUsuarios = usuarios.slice(-5).reverse();

            ultimosUsuarios.forEach(function (usuario) {

                if (usuario.activo == 1) {
                    usuario.perfil_id = getPerfil(usuario.perfil_id);

                    if (usuario.id_colaborador != null) { //Si el usuario tiene un colaborador asociado se obtiene el nombre del colaborador
                        usuario.id_colaborador = getColaborador(usuario.id_colaborador);
                    }

                    renderData(usuario, tbody);
                }

            });

        });
    }

    function mostrarUsuariosCoincidentes() {

        let query = queryInput.val().toLowerCase();

        obtenerUsuarios().then(function (usuarios) {
            tbody.innerHTML = "";

            let usuariosFiltrados = usuarios.filter(function (usuario) {
                if (usuario.nombre) {
                    return usuario.nombre.toLowerCase().includes(query);
                }
                return false;
            });


            usuariosFiltrados.forEach(function (usuario) {

                if (usuario.activo == 1) {
                    usuario.perfil_id = getPerfil(usuario.perfil_id);

                    if (usuario.id_colaborador != null) { //Si el usuario tiene un colaborador asociado se obtiene el nombre del colaborador
                        usuario.id_colaborador = getColaborador(usuario.id_colaborador);
                    }

                    renderData(usuario, tbody);
                }

            });
        });
    }

    //Muestra usuarios al cargar la página
    if (window.location.pathname === "/gestion-usuarios") {
        mostrarUsuarios();
    }


    //Muestra los usuarios que coincidan con la búsqueda
    $("#buscar-gestion-usuarios").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();
        tbody.innerHTML = "";

        if (query.length === 0) {
            mostrarUsuarios();
        } else {
            mostrarUsuariosCoincidentes();
        }
    });
});

function renderData(usuario, tbody) {
    let rowHtml = `
                    <tr>
                    <td style="width:30px;"><img class='imagen-fit' src="${rutaImagen}/${usuario.imagen}" alt="foto-perfil-usuario"></td>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.apellidos}</td>
                    <td>${usuario.email}</td>
                    <td>${usuario.telefono ? usuario.telefono : ''}</td>
                    <td>${usuario.id_colaborador ? usuario.id_colaborador : ''}</td>
                    <td>${usuario.perfil_id}</td>
                    <td>
                    <a href='#' class="btn btn-danger btn-admin-delete" data-nombre-elemento="${usuario.nombre}" data-id-elemento="${usuario.id}"><i class="fa-solid fa-trash"></i></a>                            
                    <a href="/gestion-usuarios/editar-usuario/${usuario.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td></tr> 
                    `;
    tbody.innerHTML += rowHtml;

            //Añade el evento de confirmación de eliminación a los enlaces de eliminación
            const enlacesEliminacion = tbody.querySelectorAll('.btn-admin-delete');
            const urlEliminar = `/gestion-usuarios/eliminar-usuario/`;
            confirmarEliminacion(enlacesEliminacion, urlEliminar);
    
}
