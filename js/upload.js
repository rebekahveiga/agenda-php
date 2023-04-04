$(document).ready(function(){
    var mensagem = $("#mensagem");
    var preloader = $("#preloader");
    var barra = $("#barra");
    $("#editar-foto").hide();
    $("#btn-editar").on('click', function(){
       $("#editar-foto").toggle(); 
    });
    $("#btn-enviar-foto").on('click', function(event){
        event.preventDefault();
    })
});