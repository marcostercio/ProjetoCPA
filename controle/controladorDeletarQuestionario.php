<?php
if(isset($_GET['id'])AND $_GET['acao'] == "deletar"){
	$deletarQuestionarioDAO = new classeQuestionarioDAO();
	$deletar=$deletarQuestionarioDAO->deletarQuestionario($_GET['id']);
	if($deletar){
		?>

		<div class="alert alert-success my-3" role="alert">
			
			questionario excluido com sucesso! .
			<button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
	else{
		?>

		<div class="alert alert-danger" role="alert">
			Não foi possivel excluir o questionario!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		
		<?php

	}

}
?>