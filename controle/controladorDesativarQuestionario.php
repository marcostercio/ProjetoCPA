<?php
@$iddesativar=$_GET['iddq'];
if(isset($iddesativar)){
	$desativarQuestionarioDAO = new classeQuestionarioDAO();
	$desativar=$desativarQuestionarioDAO->atualizarStatusQuestionario($iddesativar);?>
	
	<?php
	if($desativar){
		?>

		<div class="alert alert-success my-3" role="alert">
			
			Status do questionario atualizado com sucesso! .
			<button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
	else{
		?>

		<div class="alert alert-danger" role="alert">
			Não foi atualizar o status do questionario!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		
		<?php

	}

}
?>