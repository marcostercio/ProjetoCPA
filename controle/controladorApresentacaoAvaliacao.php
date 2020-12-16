<?php 
require_once "modelo/DAO/ClasseQuestionarioDAO.php";
//variaveis
$idUsuario =$_SESSION['cod_usuario'];

	//verifica tipo de questionário o usuario logado ira realizar
if ($_SESSION['cod_perfil']==ADMINISTRADOR or $_SESSION['cod_perfil']==PROFESSORES or $_SESSION['cod_perfil']==AUXILIAR){
	$tipo_questionario=4;
}
else{
	$tipo_questionario=3;	
}

//verifica

$verificaQuestionarioDAO = new classeQuestionarioDAO();
$verificacao =$verificaQuestionarioDAO->verificarFezAvaliacao($tipo_questionario,$idUsuario);

if(!$verificacao){
include "visao/apresentarAvaliacao.php";
}
else{
echo "Você já realizou o questionário atual, aguarde o próximo.";
}




