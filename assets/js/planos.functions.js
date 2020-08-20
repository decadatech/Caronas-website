$.ajax({
    url: 'assets/php/select-plans-plan.php',
    success: function(response) {
        $('.ajax-reponse-select-plan').html(response);        
    },
});