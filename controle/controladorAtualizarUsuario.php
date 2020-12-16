
<?php
//Editar Usuario-
require_once "modelo/DAO/ClasseUsuarioDAO.php";

if(isset($_POST['editar']) ){
	/*incluo os metodos da classe classeUsuario*/
	//require_once "modelo/classeUsuario.php";

	$id = $_POST['editar'];
	$nome = $_REQUEST['nome'];
	$sobrenome = $_REQUEST['sobrenome'];
	$matricula = $_REQUEST['matricula'];
	$status = $_REQUEST['status'];
	//$status_prova = $_REQUEST['status_prova'];
	$email = $_REQUEST['email'];
	$senha = $_REQUEST['senha'];
	$perfil = $_REQUEST['tipousuario'];

	/*incluo os metodos da classe classeUsuario*/
	require_once "modelo/classeUsuario.php";
	//instancio a classe criando assim um objeto
	$objetoUsuario = new classeUsuario();
	$objetoUsuario->setNome($nome);
	$objetoUsuario->setMatricula($matricula);
	$objetoUsuario->setSobrenome($sobrenome);
	$objetoUsuario->setStatus($status);
	//$objetoUsuario->setStatus_prova($status_prova);
	$objetoUsuario->setEmail($email);
	$objetoUsuario->setSenha($senha);
	$objetoUsuario->setCod_perfil($perfil);
	$objetoUsuario->setCod_usuario($id);


	$editarUsuarioDAO = new classeUsuarioDAO();

	$editar = $editarUsuarioDAO->atualizarUsuario($objetoUsuario,$id);
	if($editar){

		?>

		<div class="alert alert-success my-3" role="alert">

			Usuário atualizado com sucesso! .
			<button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
	else{
		?>

		<div class="alert alert-danger" role="alert">
			Não foi possivel atualizar o Usuário!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<?php
	}

}