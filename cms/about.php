<?php
  include_once "../assets/php/conexao.php";
  include_once "assets/php/login/verificado-login.php";
  date_default_timezone_set('America/Sao_Paulo');

  if($_SESSION["categoria"] == 1){
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

      <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="container">
        <h2>Aviso na Home</h2>  

          <div class="form-group">
              <form method="POST" id="FormMessage">
                <label for="message">Mensagem</label>
                <?php
                  $query = "SELECT * FROM `tb04_sobre` WHERE 1 LIMIT 1";
                  $result = $conexao->query($query);
              
                  if($result->num_rows>0) { 
                    while ($linha = $result->fetch_assoc()){    
                      $mensagem = $linha['tb04_mensagem'];
                    }
                  }
                ?>
                <textarea class="form-control" id="message" rows="3" name="message" required><?php echo $mensagem; ?></textarea>
                <hr>
                <button type="submit" class="btn btn-success save">Editar</button>                                              
              </form>
          </div>          
        </div>
      </div>       

  </div>   

	<!-- MODAL ALERT -->
	<div id="alertModal" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Alteração feita!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<p>Seu alerta foi alterado com sucesso.</p>
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
  <!-- JQUERY MASK -->
  <script src="../assets/libs/jquery.mask.js"></script>
  <!-- FEATHER ICONS -->
  <script src="https://unpkg.com/feather-icons"></script>
  <!-- INDEX JS -->
  <script src="assets/js/aboutCMS.js"></script>
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