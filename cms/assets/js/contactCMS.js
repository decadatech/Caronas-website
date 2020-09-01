$.ajax({
    url: 'assets/php/contact/select-contact.php',
    success: function(response) {
        $('.ajax-reponse-select-contact').html(response);        
    },
});