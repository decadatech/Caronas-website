var params = window.location.search.substring(1).split('&');
var paramArray = {};

for(var i=0; i<params.length; i++) {
    var param = params[i].split('=');
    paramArray[param[0]] = param[1];
}

// $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/31|35/municipios', {id: $(this).find("option:selected").attr('data-id')}, function (json) {  
//     var options = null;
//     for (var i = 0; i < json.length; i++) {
//         options += '<option value="' + json[i].id + '" name="' + json[i].nome + " - " + json[i].microrregiao.mesorregiao.UF.sigla + '">' + json[i].nome + " - " + json[i].microrregiao.mesorregiao.UF.sigla + '</option>';
//     }
//     $("select[name='cidade0']").html('<option disabled value="" selected hidden> Saindo de ...</option>' + options);
//     $("select[name='cidade1']").html('<option disabled value="" selected hidden> Indo para...</option>' + options);

//     if(paramArray["s"] != undefined){
//         $("select[name='cidade0']").val(paramArray["s"]);
//     }
//     if(paramArray["i"] != undefined){
//         $("select[name='cidade1']").val(paramArray["i"]);
//     }
//     if(paramArray["d"] != undefined){
//         var data = paramArray["d"].split('%2F').join('/');
//         data = data.split('+').join(' ');
//         data = data.split('%3A').join(':');
//         $("#end").val(data);
//     }
//     if(paramArray["p"] != undefined){
//         $("#quantity").val(paramArray["p"]);
//     }

//     if(paramArray["s"] != undefined || paramArray["i"] != undefined || paramArray["d"] != undefined || paramArray["p"] != undefined){
//         $('#registerModal').modal('show');
//     }
// });

if(paramArray["s"] != undefined){
    $("#cidade0").val(decodeURIComponent(paramArray["s"]));
}
if(paramArray["i"] != undefined){
    $("#cidade1").val(decodeURIComponent(paramArray["i"]));
}
if(paramArray["d"] != undefined){
    var data = paramArray["d"].split('%2F').join('/');
    data = data.split('+').join(' ');
    data = data.split('%3A').join(':');
    $("#end").val(data);
}
if(paramArray["p"] != undefined){
    $("#quantity").val(paramArray["p"]);
}

if(paramArray["s"] != undefined || paramArray["i"] != undefined || paramArray["d"] != undefined || paramArray["p"] != undefined){
    $('#registerModal').modal('show');
}

$('#registerModal').modal('hide');
$('#phone').mask('(00) 90000-0000');
$('#end').mask('00/00/0000 00:00');
$('.divBack').hide();

$('#schedule').on('click', () => {
  $('#registerModal').modal('show');
});

$("#checkBack").click(function(){
    if($('.divBack').css('display') == 'none'){
        $('.divBack').show();         
    }else{
        $('.divBack').hide();         
    }
});

const calendarEl = document.getElementById('calendar');

const calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: ['interaction', 'dayGrid', 'timeGrid'],
    defaultView: $(window).width() < 765 ? 'dayGridDay':'dayGridWeek',
    header: {
      left: 'prev,next,today',
      right: 'title',
    },
    locale: 'pt-br',
    timeFormat: 'H(:mm)',
    timeZone: 'BRT',     
    selectable: true,
    editable: true,
    navLinks: true, 
    eventLimit: true,
    contentHeight: 100,
    // events: {
    //     url: 'REQUEST_FILE',       
    // },
    select: function(info) {            
        // Evento disparado ao selecionar um dia
        // $('#registerModal #start').val(info.start.toLocaleString());
        $('#registerModal #end').val(info.end.toLocaleString().slice(0, 16));
        $('#registerModal').modal('show');
    },
    eventDrop: function (info) {     
        //evento disparado ao arrastar o evento (update de data)         
    },
    eventResize: function (info) {                
        //evento disparado ao redimencionar o evento (update de data)        
    },
    eventClick: function (info) {    
        // alert('0');
    },
    eventRender: function(event, element) {
        $(element).addTouch();
    }
});

calendar.render();

$('#registerModal').on('hidden.bs.modal', function (e) {
    $('#registerModal input').val('');
    // $("select[name='estado0']").val(0);
    // $("select[name='estado1']").val(0);
    $('#registerModal textarea').val('');
});

$("#quantity").keyup(function () {
    if($("#quantity").val() == 7){
        $("#quantity").val('');
    } else if($("#quantity").val() == 8){
        $("#quantity").val('');
    } else if($("#quantity").val() == 9){
        $("#quantity").val('');
    }
});

$('#scheduleForm').submit(function (event) {
    // var valor1 = $("select[name='cidade0']").find(":selected").html();
    // var valor2 = $("select[name='cidade1']").find(":selected").html();
    // $("select[name='cidade0']").find(":selected").val(valor1);
    // $("select[name='cidade1']").find(":selected").val(valor2);
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'assets/php/add-contact.php',
        type: 'POST',
        data: formData,                 
        processData: false,  
        contentType: false, 
        success: function (result) {                
            $('#scheduleForm input').val(''); //LIMPA OS INPUTS 
            $('#scheduleForm textarea').val(''); //LIMPA OS INPUTS 
            // $("#scheduleForm select").val(0);
            $('checkBack').prop("checked", false);
            $('#registerModal').modal('hide'); //ABRE O MODAL             
            $('#confirmModal').modal('show'); //ABRE O MODAL             
        },
        Error: function () {
            $('#scheduleForm input').val(''); //LIMPA OS INPUTS 
            $('checkBack').prop("checked", false);
            $('#scheduleForm textarea').val(''); //LIMPA OS INPUTS 
            // $("#scheduleForm select").val(0);
        },           
    });
});