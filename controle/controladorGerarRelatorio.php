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

//Pega codigo do questionario
@$codigoquestionario=$_REQUEST['codigoquestionario'];
$gerarQuestionarioDAO = new classeQuestionarioDAO();
$Relatorio =$gerarQuestionarioDAO->gerarRelatorio($codigoquestionario);

//listar o questionário e seu id para mostrar no select
$novoQuestionarioDAO = new classeQuestionarioDAO();
$questionario =$novoQuestionarioDAO->listarQuestionario();
 function trazerResposta($cod_pergunta){
//listar resposta individual
$respostadoQuestionarioDAO = new classeQuestionarioDAO();
$questionario =$respostadoQuestionarioDAO->listarResposta($cod_pergunta);
return $questionario;
}
//include "controladorDeletarUsuario.php";

//include "visao/listarUsuarioTab.php";

//  define ('nomedapagina','dashboard.php');
include 'visao/gerarRelatorioForm.php';
if(count($Relatorio)!=NULL ){
include 'visao/listarRelatorioTab.php';
}
else{
	if($codigoquestionario!=NULL){
	?>
	<div class="alert alert-warning" role="alert">
 Questionário sem perguntas<a href="?pag=pergunta&idq=<?=$codigoquestionario?>" class="alert-link"> Clique aqui para adicionar perguntas a ele.</a>. 
</div>
<?php
}
}