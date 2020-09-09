$.ajax({
    url: 'assets/php/select-plans-index.php',
    success: function(response) {
        $('.ajax-reponse-select-plan').html(response);        
    },
});

$.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/31|35/municipios', {id: $(this).find("option:selected").attr('data-id')}, function (json) {  
    var options = null;
    for (var i = 0; i < json.length; i++) {
        options += '<option value="' + json[i].nome + '" >' + json[i].nome + '</option>';
    }
    $("select[name='saindo']").html('<option value="default"> Saindo para...</option>' + options);
    $("select[name='indo']").html('<option value="default"> Indo para...</option>' + options);
});

// $('#cadastroForm').submit(function (event) {
//     event.preventDefault();
//     $.ajax({
//         url: 'assets/php/login/add-register.php',
//         type: 'POST',
//         data: $('#cadastroForm').serialize(),                  
//         success: function (result) {
                
//             $('#cadastroForm input').val(''); //LIMPA OS INPUTS 
//             //$('#ModalConfirm').modal('show'); //ABRE O MODAL             
//         },
//         Error: function () {
//             $('#cadastroForm input').val(''); //LIMPA OS INPUTS
//             //$('#formRegister textarea').val('');
//         },           
//     });
// });