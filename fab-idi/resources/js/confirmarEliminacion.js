
import $ from "jquery";

//console.log('confirmarEliminacion.js cargado');

function confirmarEliminacion(enlacesEliminacion, urlEliminar) {

    
    enlacesEliminacion.forEach(function (enlace) {
        
        enlace.addEventListener('click', function () {
            const nombreElemento = this.dataset.nombreElemento;
            const idElemento = this.dataset.idElemento;
            console.log(idElemento);

            $('#modal-eliminacion').find('.modal-body p').text(`¿Quieres eliminar el elemento '${nombreElemento}'?`);
            $('#modal-eliminacion').find('.modal-footer .btn-admin-delete').attr('href', urlEliminar + idElemento);
            document.querySelector('#modal-eliminacion').style.display = 'flex';
        });
    });

    $('#modal-eliminacion .btn-close').click(function () {
        document.querySelector('#modal-eliminacion').style.display = 'none';
    });
}

export default confirmarEliminacion;
