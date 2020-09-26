<?php
  include_once "../assets/php/conexao.php";
  include_once "assets/php/login/verificado-login.php";
  date_default_timezone_set('America/Sao_Paulo');
?>

<html>
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#A9A9A9">
  <meta name="apple-mobile-web-app-status-bar-style" content="#A9A9A9">
  <meta name="theme-color" content="#A9A9A9">

  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">

  <title>Planos - CMS</title> 
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class=" border-right" id="sidebar-wrapper">
      <div style="display: flex; justify-content: center; align-items: center; padding: 30px auto; margin: 15px auto;">
        <h3>Páginas</h3>
      </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action">
          HOME
        </a>
        <a style="background-color: #242424; color: white" href="plans.php" class="list-group-item list-group-item-action">
          PLANOS
        </a>
        <a href="about.php" class="list-group-item list-group-item-action">
          SOBRE NÓS
        </a>
        <a href="contact.php" class="list-group-item list-group-item-action">
          CONTATO
        </a>
        <a href="user.php" class="list-group-item list-group-item-action">
          USUÁRIO
        </a>
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
          <h2>Adicionar Plano</h2>  
        </div>
      </div>

      <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <form method="POST" id="FormPlan" enctype="multipart/form-data"> 
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" required/>
            </div>
            <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <textarea class="form-control" id="text" rows="3" id="descricao" name="descricao" required></textarea>
              </div>   
            <div class="form-group">
              <label for="photo">Foto</label>
              <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg" onchange="verificaExtensao(this)" />
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Adicionar</button>                                                                   
          </form>
        </div>
      </div>   
      
      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <h2>Planos Inseridos</h2>  
          <div class="ajax-reponse-select-plan"></div>
        </div>
      </div>  

    </div>

    <div class="modal fade" id="editPlanModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Editar Produto</h5>
            <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="FormModalPlan" enctype="multipart/form-data">
              <div class="form-row">                                
                <div class="form-group col-md-12">
                  <label for="edit-titulo">Título</label>
                  <input type="text" class="form-control" name="edit-titulo" id="edit-titulo" required>
                </div>  
                <div class="form-group col-md-12">
                  <label for="edit-descricao">Descrição</label>
                  <textarea class="form-control" name="edit-descricao" id="edit-descricao"></textarea>
                </div>  
                <div class="form-group col-md-12">
                  <label for="edit-image">Imagem (opcional)</label>
                  <input type="file" class="form-control" name="edit-image" id="edit-image">
                </div>              
              </div>             
              <button type="submit" class="btn btn-success save">Editar</button>           
            </form>
          </div>
          <div class="modal-footer">                         
            <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>   

    <!-- MODAL ALERT -->
    <div id="editConfirmPlanModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edição feita!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <p>Seu plano foi editado com sucesso.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> 

    <!-- MODAL ALERT -->
    <div id="addBrandModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Adição feita!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <p>Seu plano foi inserida com sucesso.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>    

    

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <!-- INDEX JS -->
    <script src="assets/js/planCMS.js"></script>

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