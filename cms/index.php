<?php
  include_once "../assets/php/conexao.php";
  include_once "assets/php/login/verificado-login.php";

  if($_SESSION["categoria"] == 1){

  if(!empty($_GET['f'])){
    $filtro = (int)($_GET['f']); 
  }
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
    <div class=" border-right" id="sidebar-wrapper">
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
          <form method="POST" id="formIndexPlans" action="assets/php/index/edit-index-plans.php">
            <h3> Destacar os planos na página inicial</h3>
            <div class="ajax-reponse-select-index-plan"></div>
            <br />
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </form>
        </div>
      </div>

  </div>   

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <!-- JQUERY MASK -->
  <script src="../assets/libs/jquery.mask.js"></script>
  <!-- FEATHER ICONS -->
  <script src="https://unpkg.com/feather-icons"></script>
  <!-- INDEX JS -->
  <script src="assets/js/indexCMS.js"></script>
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

<?php
  }else{
    header('Location: contact.php');
  }
?>