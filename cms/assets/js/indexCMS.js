$.ajax({
    url: 'assets/php/index/select-index-plans.php',
    success: function(response) {
        $('.ajax-reponse-select-index-plan').html(response);        
    },
});

$(document).on('click', '.limited', function(){
    var limit = 3;
    var counter = $('.limited:checked').length;
    if(counter > limit) {
       this.checked = false;
       alert('Limite atingido');
    }
 });