$("#passageiros").keyup(function () {
    if($("#passageiros").val() == 7){
        $("#passageiros").val('');
    } else if($("#passageiros").val() == 8){
        $("#passageiros").val('');
    } else if($("#passageiros").val() == 9){
        $("#passageiros").val('');
    }
});

$('#data').mask('00/00/0000 00:00');

$.ajax({
    url: 'assets/php/select-plans-index.php',
    success: function(response) {
        $('.ajax-reponse-select-plan').html(response);        
    },
});

$.ajax({
    url: 'assets/php/select-namePlan-index.php',
    success: function(response) {
        $('.ajax-reponse-select-namePlan').html(response);        
    },
});

$.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/31|35/municipios', {id: $(this).find("option:selected").attr('data-id')}, function (json) {  
    var options = null;
    for (var i = 0; i < json.length; i++) {
        options += '<option value="' + json[i].id + '" >' + json[i].nome + " - " + json[i].microrregiao.mesorregiao.UF.sigla + '</option>';
    }
    $("select[name='s']").html('<option disabled value="" selected hidden> Saindo de ...</option>' + options);
    $("select[name='i']").html('<option disabled value="" selected hidden> Indo para...</option>' + options);
});