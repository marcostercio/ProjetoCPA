<?php

//é chamado aqui para excluir antes de listar novamente sem precisar atualizar a pagina
//depois coloco essa opção
require_once 'modelo/DAO/ClasseQuestionarioDAO.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//pega da url o id do questionário
//$cod_questionario = $_REQUEST['idq'];
//Listar todos usuários
//separo a consulta de perguntas juntas separadas por virgula

function explodir($variavel){
	$alt =explode(";",$variavel);
	return $alt;
}
	//verifica tipo de questionário o usuario logado ira realizar
if ($_SESSION['cod_perfil']==ADMINISTRADOR or $_SESSION['cod_perfil']==PROFESSORES or $_SESSION['cod_perfil']==AUXILIAR){
	$tipo_questionario=4;
}
else{
	$tipo_questionario=3;	
}

//lista se o questionário tiver perguntas
$listarQuestionarioDAO = new classeQuestionarioDAO();
$Avaliacao =$listarQuestionarioDAO->listarAvaliacao($tipo_questionario);

if(count($Avaliacao)!=NULL ){
	include 'visao/realizarAvaliacao.php';
}
else{
	
		?>
		<div class="alert alert-warning" role="alert">
			Questionário indisponivel no momento.</a>. 
		</div>
		<?php
	}
//Pega codigo do questionario
//Enviar avaliacao
if(isset($_REQUEST['enviar'])){

$codigopergunta = $_REQUEST['codigopergunta'];
$resposta = $_POST['options'];
echo "<pre>";
	//uni as duas arrays
	$juncao = array_combine($codigopergunta,$resposta);
	echo "<pre>";
foreach ($juncao as $pergunta=>$resposta) {
	# code...
	$instanciar = new classeQuestionarioDAO();
	$cadastrarpergunta = $instanciar->cadastrarRespostas($pergunta,$resposta);
}



//se cadastrar
if($cadastrarpergunta){
	?>
	<div class="alert alert-success my-3" role="alert">
			Avaliação enviada com sucesso!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<script type="text/javascript">
		window.location.href = "dashboard.php?pag=apresentacaoAvaliacao";
	</script>	
		<?php
	}
	else{
		?>
		
		<div class="alert alert-danger" role="alert">
			Não foi possivel enviar a avaliação!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
}

//include "controladorDeletarUsuario.php";

//include "visao/listarUsuarioTab.php";

//  define ('nomedapagina','dashboard.php');
