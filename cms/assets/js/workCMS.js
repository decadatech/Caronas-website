$.ajax({
    url: 'assets/php/work/select-work.php',
    success: function(response) {
        $('.ajax-reponse-select-work').html(response);        
    },
});

function downloadCnh(id) {    
    window.location.href = "assets/php/work/download-cnh.php?id="+id;
}   

function downloadCarro(id) {
    window.location.href = "assets/php/work/download-carro.php?id="+id;
}   

function downloadResidencia(id) {
    window.location.href = "assets/php/work/download-endereco.php?id="+id;
}   

function confirmarExclusaoWork(id) {
    var resposta = confirm("Deseja remover esse currículo?");
    if (resposta == true) {
        window.location.href = "assets/php/work/delete-work.php?id="+id;
    }
}   