$.ajax({
    url: 'assets/php/plan/select-plan.php',
    success: function(response) {
        $('.ajax-reponse-select-plan').html(response);        
    },
});

//ADICIONAR OS DADOS DA MARCA NO BANCO VIA AJAX
$('#FormPlan').submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
        url: 'assets/php/plan/add-plan.php',
        type: 'POST',
        data: formData,                  
        success: function (result) {
                
            $('#FormPlan input').val(''); //LIMPA OS INPUTS 
            $('#FormPlan textarea').val(''); //LIMPA OS INPUTS 
            $('#addBrandModal').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/plan/select-plan.php',
                success: function(response) {
                    $('.ajax-reponse-select-plan').html(response);        
                },
            });      
        },
        Error: function () {
            $('#FormPlan input').val(''); //LIMPA OS INPUTS
            $('#FormPlan textarea').val(''); //LIMPA OS INPUTS 
        },      
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }     
    });
});

//EDITAR OS DADOS DO SOBRE NO BANCO VIA AJAX
$('#FormModalPlan').submit(function (event) {
    var formData = new FormData(this);
    formData.append('id', $('.save').data('id'));
    event.preventDefault();
    $.ajax({
        url: 'assets/php/plan/edit-plan.php',
        type: 'POST',
        data: formData,                   
        success: function (result) {
                
            $('#editPlanModal input').val(''); //LIMPA OS INPUTS 
            $('#editPlanModal textarea').val(''); //LIMPA OS INPUTS 
            $('#editPlanModal').modal('hide'); //FECHA O MODAL
            $('#editConfirmPlanModal').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/plan/select-plan.php',
                success: function(response) {
                    $('.ajax-reponse-select-plan').html(response);        
                },
            });
        },
        Error: function () {
            $('#editPlanModal input').val(''); //LIMPA OS INPUTS
            $('#editPlanModal textarea').val(''); //LIMPA OS INPUTS 
            $('#editPlanModal').modal('hide'); //FECHA O MODAL
        },          
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }      
    });
});


function confirmarExclusaoPlan(idDelete) {
    event.preventDefault();
    var resposta = confirm("Deseja remover esse plano?");
    if (resposta == true) {     
        $.ajax({
            url: 'assets/php/plan/delete-plan.php',
            type: 'POST',
            data: { idDelete: idDelete },
            success: function (result) {               
                $('#ModalConfirmDel').modal('show'); //ABRE O MODAL 
                $.ajax({
                    url: 'assets/php/plan/select-plan.php',
                    success: function(response) {
                        $('.ajax-reponse-select-plan').html(response);        
                    },
                });         
            },                      
        });
    }
}

function editarPlan(id) {

    $('#editPlanModal').modal('show'); //ABRE O MODAL

    let buttonId = "#"+id; //ID DO BOTAO PRESSIONADO
    $('#edit-titulo').val($(buttonId).data('titulo'));
    $('#edit-descricao').val($(buttonId).data('descricao'));
    $('.save').data('id', id); 

}  

// PERMITIR APENAS INSERÇÃO DE FOTO NA EXTENSÃO DE IMAGEM
function verificaExtensao($photo) {
    var extPermitidas = ['jpg', 'png', 'jpeg', 'svg', 'psd'];
    var extArquivo = $photo.value.split('.').pop();
  
    if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
        alert('Extensão "' + extArquivo + '" não permitida!');
        $("#photo").val('');
        $("#photoModal").val('');
    }
}