<?php
	require_once "modelo/DAO/ClassePerguntaDAO.php";

	if(isset($_POST['cadastrar'])){
	//Pergunta
	$cod_questionario = $_REQUEST['idq'];
	$dimensao = $_REQUEST['tipopergunta'];
	$perguntas= $_REQUEST['pergunta'];

	require_once "modelo/classePergunta.php";
	//$objetoPergunta->setCod_Pergunta($nomePergunta);
	foreach($perguntas as $pergunta){
	$objetoPergunta = new ClassePergunta();
	$objetoPergunta->setCod_dimensao($dimensao);
	$objetoPergunta->setPergunta($pergunta);
	$cadastrarPergunta = new classePerguntaDAO;
	$cadastrarPergunta->cadastrarPergunta($objetoPergunta, $cod_questionario);
	}
	if($cadastrarPergunta){
		?>
		<div class="alert alert-success my-3" role="alert">
			Pergunta Cadastrada com sucesso!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		
		<?php
	}
	else{
		?>
		
		<div class="alert alert-danger" role="alert">
			Não foi possivel Cadastrar a Pergunta!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}

	}
	//incluir visão da pergunta
	include "controladorPesquisarDimensoes.php";
	include "controladorPesquisarPergunta.php";
	include 'controladorAtualizarPergunta.php';
	include "visao/cadastrarPerguntaForm.php";