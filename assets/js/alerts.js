$(document).ready(function() {
    setTimeout(function() {
        $('.alert').fadeOut('slow', function() {
            $(this).alert('close');
        });
    }, 10000); // Valor em milisegundos
});
