<?php
  include_once "assets/php/login/verificado-login.php";
?>

<html>

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">

  <title>CMS</title>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div style="display: flex; justify-content: center; align-items: center; padding: 30px auto; margin: 15px auto;">
        <h3>Páginas</h3>
      </div>
      <div class="list-group list-group-flush ajax-reponse-select-menu">
        
      </div>
    </div>
    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light  border-bottom">
      <button style="margin: 2px" class="btn btn-secondary" id="menu-toggle"> <span class="navbar-toggler-icon"></span> </button>
        <a style="margin: 2px" href="assets/php/login/logout.php" class="btn btn-danger"> Sair </a>
      </nav>

      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <h2>Contato</h2>  
          <div class="ajax-reponse-select-contact"></div>
        </div>
      </div>
    </div>

  </div>

  <div class="modal fade" id="ModalViewContact" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">                
                    <div class="form-group col-md-6">
                        <label for="view-saida"><b>Saída</b></label>
                        <p id="view-saida"></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="view-chegada"><b>Chegada</b></label>
                        <p id="view-chegada"></p>
                    </div>   
                </div>
                <div class="form-row">              
                    <div class="form-group col-md-6">
                        <label for="view-horario"><b>Horário Saída</b></label>
                        <p id="view-horario"></p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="view-quant"><b>Quantidade</b></label>
                        <p id="view-quant"></p>
                    </div>                                            
                </div>      
                <div class="form-row">                 
                    <div class="form-group col-md-12">
                        <label for="view-desc"><b>Observações</b></label>
                        <p id="view-desc"></p>
                    </div>               
                </div>
                <div class="form-row" style="border-top: 1px solid black">                 
                    <div class="form-group col-md-12">
                        <label for="view-desc"><b>Horário Volta</b></label>
                        <p id="view-volta"></p>
                    </div>               
                </div>
            </div>
            <div class="modal-footer">                         
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
  </div>

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <!-- CONTACT JS  -->
  <script src="assets/js/contactCMS.js"></script>
  <!-- MENU JS -->
  <script src="assets/js/menuCMS.js"></script>

  <script>
    $(document).ready(function() {
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });     
    });
  </script>
</body>

</html>