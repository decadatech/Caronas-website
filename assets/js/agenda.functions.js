$('#registerModal').modal('hide');
$('#phone').mask('(00) 90000-0000');

const calendarEl = document.getElementById('calendar');

const calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: ['interaction', 'dayGrid', 'timeGrid'],
    defaultView: 'dayGridWeek',
    header: {
        left: 'prev,next,today',
        right: 'title',
    },
    locale: 'pt-br',
    timeFormat: 'H(:mm)',
    timeZone: 'BRT',     
    selectable: true,
    editable: true,
    navLinks: true, // can click day/week names to navigate views
    eventLimit: true, // allow "more" link when too many events
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
        //evento disparado ao selecionar um evento (abre o modal de update)        
    },
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