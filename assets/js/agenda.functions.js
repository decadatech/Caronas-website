$('#registerModal').modal('hide');
$('#phone').mask('(00) 90000-0000');
$('#end').mask('00/00/0000 00:00');


$('#schedule').on('click', () => {
  $('#registerModal').modal('show');
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
        $('#registerModal #end').val(info.end.toLocaleString());
        $('#registerModal').modal('show');
    },
    eventDrop: function (info) {     
        //evento disparado ao arrastar o evento (update de data)         
    },
    eventResize: function (info) {                
        //evento disparado ao redimencionar o evento (update de data)        
    },
    eventClick: function (info) {    
        alert('0');      
    },
    eventRender: function(event, element) {
        $(element).addTouch();
    }
});

calendar.render();

$('#registerModal').on('hidden.bs.modal', function (e) {
    $('#registerModal input').val('');
    $("select[name='estado0']").val(0);
    $("select[name='estado1']").val(0);
    $("select[name='cidade0']").html('<option value="" id="selecionar0">Selecione um estado</option>');
    $("select[name='cidade1']").html('<option value="" id="selecionar0">Selecione um estado</option>');
    $('#registerModal textarea').val('');
});

$("select[name='estado0']").change(function () {
    if ($(this).val()) {
        $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+$(this).find("option:selected").attr('data-id')+'/municipios', {id: $(this).find("option:selected").attr('data-id')}, function (json) {
            
            $("#selecionar0").hide();
            var options = null;
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].nome + '" >' + json[i].nome + '</option>';
            }
            $("select[name='cidade0']").html(options);

        });

    } else {
        $("select[name='cidade0']").html('<option value="" id="selecionar0">Selecione um estado</option>');
    }
});

$("select[name='estado1']").change(function () {
    if ($(this).val()) {
        $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+$(this).find("option:selected").attr('data-id')+'/municipios', {id: $(this).find("option:selected").attr('data-id')}, function (json) {
            
            $("#selecionar1").hide();
            var options = null;
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].nome + '" >' + json[i].nome + '</option>';
            }
            $("select[name='cidade1']").html(options);

        });

    } else {
        $("select[name='cidade1']").html('<option value="" id="selecionar1">Selecione um estado</option>');
    }
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
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: 'assets/php/add-plano.php',
        type: 'POST',
        data: formData,                 
        processData: false,  
        contentType: false, 
        success: function (result) {                
            $('#scheduleForm input').val(''); //LIMPA OS INPUTS 
            $('#scheduleForm textarea').val(''); //LIMPA OS INPUTS 
            $("#scheduleForm select").val(0);
            $('#registerModal').modal('hide'); //ABRE O MODAL             
            $('#confirmModal').modal('show'); //ABRE O MODAL             
        },
        Error: function () {
            $('#scheduleForm input').val(''); //LIMPA OS INPUTS 
            $('#scheduleForm textarea').val(''); //LIMPA OS INPUTS 
            $("#scheduleForm select").val(0);
        },           
    });
});