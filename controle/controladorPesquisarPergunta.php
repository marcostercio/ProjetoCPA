<?php
//Pesquisar por pergunta
if(isset($_GET['id']) AND $_GET['id']!="" AND $_GET['acao'] == "editar"){
	$id=$_GET['id'];
	$selecionarUmaPergunta = new classePerguntaDAO();
	@$selecionar=$selecionarUmaPergunta->selecionarUnicaPergunta($id);
	
	if($selecionar){
		$usuarioeditar = $selecionar;
	}
	//se não encontrar pergunta com esse id
	else{
		?>

		<div class="alert alert-danger" role="alert">
			Não foi possivel encontrar esta pergunta!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<?php
	}
}