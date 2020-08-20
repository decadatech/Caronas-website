$.ajax({
    url: 'assets/php/select-plans-index.php',
    success: function(response) {
        $('.ajax-reponse-select-plan').html(response);        
    },
});