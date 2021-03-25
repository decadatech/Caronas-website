$.ajax({
    url: 'assets/php/contact/select-contact.php',
    success: function(response) {
        $('.ajax-reponse-select-contact').html(response);        
    },
});

function viewContact(id) {

    let buttonIdContact = "#"+id; //ID DO BOTAO PRESSIONADO

    $('#ModalLabel').html($(buttonIdContact).data('nome'));
    $('#view-horario').html($(buttonIdContact).data('horas'));
    $('#view-volta').html($(buttonIdContact).data('horav'));
    $('#view-quant').html($(buttonIdContact).data('quant') + " passageiros");
    $('#view-desc').html($(buttonIdContact).data('desc'));
    $('#view-saida').html($(buttonIdContact).data('cidades'));    
    $('#view-chegada').html($(buttonIdContact).data('cidadec'));    

    $('#ModalViewContact').modal('show'); //ABRE O MODAL

}  

function confirmarExclusaoContact(id) {
    var resposta = confirm("Deseja remover esse contato?");
    if (resposta == true) {
        window.location.href = "assets/php/contact/delete-contact.php?id="+id;
    }
}   