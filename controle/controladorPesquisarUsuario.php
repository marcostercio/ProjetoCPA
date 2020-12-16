<?php
//Pesquisar por usuário
if(isset($_GET['id']) AND $_GET['id']!="" AND $_GET['acao'] == "editar"){
	$id=$_GET['id'];
	$selecionarUmUsuario = new classeUsuarioDAO();
	@$selecionar=$selecionarUmUsuario->selecionarUnicoUsuario($id);
	
	if($selecionar){
		$usuarioeditar = $selecionar;
	}
	//se não encontrar usuario com esse id
	else{
		?>

		<div class="alert alert-danger" role="alert">
			Não foi possivel encontrar este usuário!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<?php
	}
}