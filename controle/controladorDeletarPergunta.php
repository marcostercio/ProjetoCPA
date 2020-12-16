<?php
if(isset($_GET['id'])AND $_GET['acao'] == "deletar" AND !isset($_POST['cadastrar'])){
	$deletarPerguntaDAO = new classePerguntaDAO();
	$deletar=$deletarPerguntaDAO->deletarPergunta($_GET['id']);
	if($deletar){
		?>

		<div class="alert alert-success my-3" role="alert">
			
			Pergunta excluida com sucesso! .
			<button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
	else{
		?>

		<div class="alert alert-danger" role="alert">
			Não foi possivel excluir a Pergunta!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		
		<?php

	}

}
?>