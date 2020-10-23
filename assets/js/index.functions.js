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

$('#cadastroForm').submit(function (event) {
    event.preventDefault();
    var idSaindo = $("[name='s']").attr("id");
    var idPara = $("[name='i']").attr("id");
    var data = $('#data').val();
    var passageiros = $('#passageiros').val();
    window.location.href = "agenda.html?s=" + idSaindo + "&i=" + idPara + "&d=" + data + "&p=" + passageiros;
});

var availableTags = [
    {
        id: 1,
        label: " Rod. de Arujá - SP",
    },
    {
        id: 2,
        label: " Rod. de Mogi das Cruzes - SP",
    },
    {
        id: 3,
        label: " Rod. de Suzano - SP",
    },
    {
        id: 4,
        label: " Rod. de POA - SP",
    },
    {
        id: 5,
        label: " Rod. de Guarulhos - SP",
    },
    {
        id: 6,
        label: " Rod. de Santa Isabel - SP",
    },
    {
        id: 7,
        label: " Rod. de Jacareí - SP",
    },
    {
        id: 8,
        label: " Rod. de São José dos Campos - SP",
    },
    {
        id: 9,
        label: " Rod. de Taubaté - SP",
    },
    {
        id: 10,
        label: " Rod. de Aparecida do Norte - SP",
    },
    {
        id: 11,
        label: " Rod. de Ilha bela - SP",
    },
    {
        id: 12,
        label: " Rod. de Ubatuba - SP",
    },
    {
        id: 13,
        label: " Rod. de Caraguatatuba - SP",
    },
    {
        id: 14,
        label: " Rod. de Bertioga - SP",
    },
    {
        id: 15,
        label: " Rod. de Salto - SP",
    },
    {
        id: 16,
        label: " Rod. de Itu - SP",
    },
    {
        id: 17,
        label: " Rod. de Sorocaba - SP",
    },
    {
        id: 18,
        label: " Rod. de Boituva - SP",
    },
    {
        id: 19,
        label: " Rod. de Botucatu - SP",
    },
];

$( function() {    
    $("[name='s']").autocomplete({
        source: availableTags,
        focus: function(event, ui) {
            $("[name='s']").val(ui.item.label);
            $("[name='s']").attr("id",ui.item.id);
            return false;
        },
        select: function(event, ui) {
            $("[name='s']").val(ui.item.label);
            $("[name='s']").attr("id",ui.item.id);
            return false;
        },
    });
});

$( function() {    
    $("[name='i']").autocomplete({
        source: availableTags,
        focus: function(event, ui) {
            $("[name='i']").val(ui.item.label);
            $("[name='i']").attr("id",ui.item.id);
            return false;
        },
        select: function(event, ui) {
            $("[name='i']").val(ui.item.label);
            $("[name='i']").attr("id",ui.item.id);
            return false;
        },
    });
});

// $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/31|35/municipios', {id: $(this).find("option:selected").attr('data-id')}, function (json) {  
//     var options = null;
//     for (var i = 0; i < json.length; i++) {
//         options += '<option value="' + json[i].id + '" >' + json[i].nome + " - " + json[i].microrregiao.mesorregiao.UF.sigla + '</option>';
//     }
//     $("select[name='s']").html('<option disabled value="" selected hidden> Saindo de ...</option>' + options);
//     $("select[name='i']").html('<option disabled value="" selected hidden> Indo para...</option>' + options);
// });