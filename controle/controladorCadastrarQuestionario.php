<?php

	require_once "modelo/DAO/ClasseQuestionarioDAO.php";

	if(isset($_POST['cadastrar'])){
	//Questionario
	$cod_usuario = $_SESSION['cod_usuario'];
	$nomequestionario = $_REQUEST['nomequestionario'];
	$descricao = $_REQUEST['descquestionario'];
	$tipoquestionario = $_REQUEST['tipoquestionario'];
	$datainicio = $_REQUEST['datainicioquestionario'];
	$datafim = $_REQUEST['datafimquestionario'];

	require_once "modelo/classeQuestionario.php";
	//instancio a classe criando assim um objeto
	$objetoQuestionario = new classeQuestionario();
	//$objetoQuestionario->setCod_questionario($nomequestionario);
	$objetoQuestionario->setCod_tipo_questionario($tipoquestionario);
	$objetoQuestionario->setData_disponibilidade($datainicio);
	$objetoQuestionario->setData_encerramento($datafim);
	$objetoQuestionario->setCod_usuario($cod_usuario);
	$objetoQuestionario->setNome($nomequestionario);
	

		$cadastrarquestionario = new classeQuestionarioDAO;
		$cadastrarquestionario->cadastrarQuestionario($objetoQuestionario);
		//Se for cadastrado
	if($cadastrarquestionario){
		?>
		<div class="alert alert-success my-3" role="alert">
			Questionário Cadastrado com sucesso!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		
		<?php
	}
	else{
		?>
		
		<div class="alert alert-danger" role="alert">
			Não foi possivel Cadastrar o Questionário!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}

	
	}


	
	
	
	include 'controladorPesquisarQuestionario.php';

	//Referência a data disponibilidade
	@$data = new DateTime($selecionar["data_disponibilidade"]);
	$data_disponibilidade =  $data->format('Y-m-d\TH:i:s');
	//Referência a data encerramento
	@$dataf = new DateTime($selecionar["data_encerramento"]);
				$data_encerramento =  $dataf->format('Y-m-d\TH:i:s');
	
	include 'controladorAtualizarQuestionario.php';
	include 'controladorPesquisaTiposQuestionarios.php';
	include 'visao/cadastrarQuestionarioForm.php';
?>