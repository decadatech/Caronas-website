$.ajax({
  url: 'assets/php/menu/select-menu.php',
  success: function(response) {
    $('.ajax-reponse-select-menu').html(response);
    if(window.location.href.split('/')[5] == "about.php"){
      $('#sobreMenu').addClass("active");
    }else if(window.location.href.split('/')[5] == "contact.php"){
      $('#contatoMenu').addClass("active");
    }else if(window.location.href.split('/')[5] == "index.php"){
      $('#homeMenu').addClass("active");
    }else if(window.location.href.split('/')[5] == "plans.php"){
      $('#planoMenu').addClass("active");
    }else if(window.location.href.split('/')[5] == "user.php"){
      $('#usuarioMenu').addClass("active");
    }else if(window.location.href.split('/')[5] == "work.php"){
      $('#trabalheMenu').addClass("active");
    }
  },
});