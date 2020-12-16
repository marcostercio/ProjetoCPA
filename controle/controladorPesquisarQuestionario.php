<?php
//Pesquisar por usuário
if(isset($_GET['id']) AND $_GET['id']!="" AND $_GET['acao'] == "editar"){
	$id=$_GET['id'];
	$selecionarUmQuestionario = new classeQuestionarioDAO();
	$selecionar=$selecionarUmQuestionario->selecionarUnicoQuestionario($id);
	
	if($selecionar){
		$Questionarioeditar = $selecionar;
	}
	//se não encontrar Questionario com esse id
	else{
		?>

		<div class="alert alert-danger" role="alert">
			Não foi possivel encontrar este Questionário!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<?php
	}
}