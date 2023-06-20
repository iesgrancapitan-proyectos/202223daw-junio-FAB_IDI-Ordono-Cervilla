import $ from 'jquery';


$(document).ready(function () {
    let tbody = document.querySelector("#tbody-tabla-gestion-contrasenas");
    let queryInput = $("#buscar-gestion-contrasenas");

    //Obtiene los todos usuarios mediante una petición AJAX
    function obtenerUsuarios() {
        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-gestion-contrasenas");

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
            });
        }
    }

    //Muestra todos los contrasenas en la tabla
    function mostrarUsuarios() {

        obtenerUsuarios().then(function (usuarios) {
            tbody.innerHTML = "";

            let ultimosUsuarios = usuarios.slice(-6);

            ultimosUsuarios.forEach(function (usuario) {

                if (usuario.activo == 1) {
                    let rowHtml = `
                    <tr>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.email}</td>
                    <td>
                    <a href="/gestion-contrasenas/renovar-contrasena/${usuario.id}" class="btn btn-danger btn-admin-save"><i class="fa-solid fa-lock"></i></a>
                    </td>
                    </tr> 
                    `;
                    tbody.innerHTML += rowHtml;
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
                    let rowHtml = `
                    <tr>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.email}</td>
                    <td>
                    <a href="/gestion-contrasenas/renovar-contrasena/${usuario.id}" class="btn btn-danger btn-admin-save"><i class="fa-solid fa-lock"></i></a>
                    </td>
                    </tr> 
                    `;
                    tbody.innerHTML += rowHtml;
                }

            });
        });
    }

    //Muestra usuarios al cargar la página
    mostrarUsuarios();

    //Muestra los contrasenas que coincidan con la búsqueda
    $("#buscar-gestion-contrasenas").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();
        tbody.innerHTML = "";

        if (query.length === 0) {
            mostrarUsuarios();
        } else {
            mostrarUsuariosCoincidentes();
        }
    });
}); 