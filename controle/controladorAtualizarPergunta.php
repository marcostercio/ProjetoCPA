
<?php
//Editar Qustionario-
require_once "modelo/DAO/ClassePerguntaDAO.php";

if(isset($_POST['editar']) ){
	/*incluo os metodos da classe classeUsuario*/
	//require_once "modelo/classeUsuario.php";

	//Pergunta
	$cod_pergunta = $_REQUEST['id'];
	$dimensao = $_REQUEST['tipopergunta'];
	
	$pergunta = $_REQUEST['pergunta'][0];

	require_once "modelo/classePergunta.php";
	$objetoPergunta = new ClassePergunta();
	//$objetoPergunta->setCod_Pergunta($nomePergunta);
	$objetoPergunta->setCod_dimensao($dimensao);
	$objetoPergunta->setPergunta($pergunta);
	

	$editarPergunta = new classePerguntaDAO;
	$editarPergunta->editarPergunta($objetoPergunta, $cod_pergunta);
	

	if($editarPergunta){

		?>

		<div class="alert alert-success my-3" role="alert">

			Pergunta atualizada com sucesso!
			<button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
	else{
		?>

		<div class="alert alert-danger" role="alert">
			Não foi possivel atualizar a Pergunta!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<?php
	}

}