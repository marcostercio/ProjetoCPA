
<?php
//Editar Usuario-
require_once "modelo/DAO/ClasseUsuarioDAO.php";

if(isset($_POST['alterarsenha']) ){
	/*incluo os metodos da classe classeUsuario*/
	//require_once "modelo/classeUsuario.php";

	//sera posteriormente pegada pela sessão
	$id = $_SESSION['cod_usuario'];
	$senhaAntiga = $_REQUEST['senhaantiga'];
	$senha = $_REQUEST['senha'];
	

	/*incluo os metodos da classe classeUsuario*/
	require_once "modelo/classeUsuario.php";
	//instancio a classe criando assim um objeto
	$objetoSenha = new classeUsuario();
	$objetoSenha->setSenha($senha);
	$objetoSenha->setCod_usuario($id);

	$editarUsuarioDAO = new classeUsuarioDAO();
	//somente se a senha existir ele cadastra
	$verificar = $editarUsuarioDAO->verificarSenha($objetoSenha,$senhaAntiga);
	if($verificar){

					$editar = $editarUsuarioDAO->alterarSenha($objetoSenha);
					if($editar){

						?>

						<div class="alert alert-success my-3" role="alert">

							Senha atualizada com sucesso! .
							<button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php
					}
					else{
						?>

						<div class="alert alert-danger" role="alert">
							Não foi possivel alterar sua senha!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<?php
					}
	}
	else{
		?>
		<div class="alert alert-danger" role="alert">
							Senha antiga invalida!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
		<?php
	}

}
include "visao/alterarSenhaForm.php";