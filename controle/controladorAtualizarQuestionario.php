
<?php
//Editar Qustionario-
require_once "modelo/DAO/ClasseQuestionarioDAO.php";

if(isset($_POST['editar']) ){
	/*incluo os metodos da classe classeUsuario*/
	//require_once "modelo/classeUsuario.php";

	$id = $_POST['editar'];
	//Questionario
	//$cod_usuario = 23;
	$nomequestionario = $_REQUEST['nomequestionario'];
	$detalhe = $_REQUEST['descquestionario'];
	$tipoquestionario = $_REQUEST['tipoquestionario'];
	$datainicio = $_REQUEST['datainicioquestionario'];
	$datafim = $_REQUEST['datafimquestionario'];

	include "modelo/classeQuestionario.php";
	//instancio a classe criando assim um objeto
	$objetoQuestionario = new classeQuestionario();
	$objetoQuestionario->setCod_questionario($id);
	$objetoQuestionario->setNome($nomequestionario);
	$objetoQuestionario->setDetalhe($detalhe);
	$objetoQuestionario->setCod_tipo_questionario($tipoquestionario);
	$objetoQuestionario->setData_disponibilidade($datainicio);
	$objetoQuestionario->setData_encerramento($datafim);
	//$objetoQuestionario->setCod_usuario($cod_usuario);
	

	$editarquestionarioDAO = new classeQuestionarioDAO();

	$editar = $editarquestionarioDAO->atualizarQuestionario($objetoQuestionario);
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