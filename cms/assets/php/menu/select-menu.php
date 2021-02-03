<?php
    include_once "../login/verificado-login-for-php.php";
		include_once "../../../../assets/php/conexao.php"; 		   
	            
		if($_SESSION["categoria"] == 1){
			echo '<a id="homeMenu" href="index.php" class="list-group-item list-group-item-action">
								HOME
						</a>
						<a href="plans.php" id="planoMenu" class="list-group-item list-group-item-action">
								PLANOS
						</a>
						<a href="about.php" id="sobreMenu" class="list-group-item list-group-item-action">
								SOBRE NÓS
						</a>
						<a href="work.php" id="trabalheMenu" class="list-group-item list-group-item-action">
								TRABALHE CONOSCO
						</a> 
						<a href="contact.php" id="contatoMenu" class="list-group-item list-group-item-action">
								CONTATO
						</a>
						<a href="user.php" id="usuarioMenu" class="list-group-item list-group-item-action">
								USUÁRIO
						</a>';
		}else{
			echo '<a href="contact.php" id="contatoMenu" class="list-group-item list-group-item-action">
								CONTATO
						</a>';				
    }
?>