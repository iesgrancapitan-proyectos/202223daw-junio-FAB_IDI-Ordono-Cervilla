import $ from 'jquery';

$(document).ready(function () {

    /*Formulario creación usuario. Muestra o esconde campos según tipo usuario*/
    $('#btn-crear-usuario').hide();
    $("#form-select-tipo-usuario").change(function () {
        if ($(this).val() === "usuario") {
            $("#usuario-campos").show();
            $(".required-usuario").prop("required", true);
            $("#entidad-campos").hide();
            $(".required-entidad").prop("required", false);
            $('#btn-crear-usuario').show();
        } else if ($(this).val() === "entidad") {
            $("#usuario-campos").hide();
            $(".required-usuario").prop("required", false);
            $("#entidad-campos").show();
            $(".required-entidad").prop("required", true);
            $('#btn-crear-usuario').show();
        } else {
            $("#usuario-campos").hide();
            $(".required-usuario").prop("required", false);
            $("#entidad-campos").hide();
            $(".required-entidad").prop("required", false);
            $('#btn-crear-usuario').hide();
        }
    });
});
