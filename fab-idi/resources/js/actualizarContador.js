import $ from 'jquery';

$(document).ready(function () {
    //console.log("Contador de caracteres cargado");

    // Contar caracteres cuando se carga la página
    let numeroCaracteres = $("textarea").val().length;
    let limiteCaracteres = 240;
    let caracteresRestantes = limiteCaracteres - numeroCaracteres;
    $(".contador-caracteres").text(caracteresRestantes);

    $("textarea").on("keyup", function () {
        let numeroCaracteres = $(this).val().length;
        let limiteCaracteres = 240;
        let caracteresRestantes = limiteCaracteres - numeroCaracteres;
        $(".contador-caracteres").text(caracteresRestantes);
    });

});
