$.ajax({
    url: 'assets/php/select-message-about.php',
    success: function(response) {
        $('#message').html(response);        
    },
});