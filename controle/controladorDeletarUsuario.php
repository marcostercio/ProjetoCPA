<?php
if(isset($_GET['id'])AND $_GET['acao'] == "deletar"){
	$deletarUsuarioDAO = new classeUsuarioDAO();
	$deletar=$deletarUsuarioDAO->deletarUsuario($_GET['id']);
	if($deletar){
		?>

		<div class="alert alert-success my-3" role="alert">
			
			Usuário excluido com sucesso! .
			<button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
	else{
		?>

		<div class="alert alert-danger" role="alert">
			Não foi possivel excluir o Usuário!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		
		<?php

	}

}