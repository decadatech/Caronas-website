$.ajax({
    url: 'assets/php/select-plans-index.php',
    success: function(response) {
        $('.ajax-reponse-select-plan').html(response);        
    },
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