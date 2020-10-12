// CONFIGURAR O CAMPO DE TELEFONE 
$(document).ready(function() {
    $('#phone').mask('(00) 0000-00009');
    $('#phone').blur(function(event) {
        if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
            $('#phone').mask('(00) 00000-0009');
        } else {
            $('#phone').mask('(00) 0000-00009');
        }
    }); 
}); 

// PERMITIR APENAS INSERÇÃO DE CURRICULO EM PDF
function verificaExtensao($curriculo) {
    var extPermitidas = ['pdf', 'jpeg', 'jpg', 'png'];
    var extArquivo = $curriculo.value.split('.').pop();
  
    if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
        alert('Extensão "' + extArquivo + '" não permitida!');
        $("#curriculum").val('');
        $('#nomeCNH').html("Envie-nos sua CNH");
        $('#nomeCarro').html("Envie-nos o Documento do seu Carro");
        $('#nomeEndereco').html("Envie-nos seu Comprovante de Endereço");
    }
}

// ENVIAR DADOS DO FORMULÁRIO PARA O PHP
$("#formWork").submit(function() {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
        url: 'assets/php/add-work.php',
        type: 'POST',
        data: formData,
        success: function(data) {
            $('#formWork input').val(''); //LIMPA OS INPUTS 
            $('#formWork textarea').val('');
            $('#nomeCNH').html("Envie-nos sua CNH");
            $('#nomeCarro').html("Envie-nos o Documento do seu Carro");
            $('#nomeEndereco').html("Envie-nos seu Comprovante de Endereço");
            $('#add').modal('show'); //ABRE O MODAL             
        },
        Error: function () {
            $('#formWork input').val(''); //LIMPA OS INPUTS
            $('#formWork textarea').val('');
            $('#nomeCNH').html("Envie-nos sua CNH");
            $('#nomeCarro').html("Envie-nos o Documento do seu Carro");
            $('#nomeEndereco').html("Envie-nos seu Comprovante de Endereço");
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

$("#cnh").change(function (){
    var fileName = $('input[type="file"]')[0].files[0].name;
    $('#nomeCNH').html(fileName);
    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> A imagem do CNH foi adicionado!</div>';
    $('.screen-cnh-alert').html(alert); //ADICIONA O ALERT NA TELA 
    setTimeout(function() {
        $('.screen-cnh-alert').fadeOut('fast');
    }, 3000);         
});

$("#carro").change(function (){   
    var fileName = $('input[type="file"]')[1].files[0].name;
    $('#nomeCarro').html(fileName);
    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> A imagem do documento do seu Carro foi adicionado!</div>';
    $('.screen-carro-alert').html(alert); //ADICIONA O ALERT NA TELA 
    setTimeout(function() {
        $('.screen-carro-alert').fadeOut('fast');
    }, 3000);         
});

$("#endereco").change(function (){
    var fileName = $('input[type="file"]')[2].files[0].name;
    $('#nomeEndereco').html(fileName);
    let alert = '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert"><span aria-hidden="true">×</span></button><i class="fa fa-check mx-2"></i><strong>Sucesso!</strong> O Comprovante de endereço foi adicionado!</div>';
    $('.screen-endereco-alert').html(alert); //ADICIONA O ALERT NA TELA 
    setTimeout(function() {
        $('.screen-endereco-alert').fadeOut('fast');
    }, 3000);         
});