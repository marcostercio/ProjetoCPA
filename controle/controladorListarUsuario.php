<?php
//e chamado aqui em cima para deletar arquivos antes de listar para n precidar att a pagina após deletar
include "controladorDeletarUsuario.php";
require_once 'modelo/DAO/ClasseUsuarioDAO.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function fezprova($tipousuario,$idUsuario){
require_once "modelo/DAO/ClasseQuestionarioDAO.php";

//verifica
if ($tipousuario==ADMINISTRADOR or $tipousuario==PROFESSORES or $tipousuario==AUXILIAR){
	$tipo_questionario=4;
}
else{
	$tipo_questionario=3;	
}

$verificaQuestionarioDAO = new classeQuestionarioDAO();
$verificacao =$verificaQuestionarioDAO->verificarFezAvaliacao($tipo_questionario,$idUsuario);
return $verificacao;
}
//Listar todos usuários

$novoUsuarioDAO = new classeUsuarioDAO();
$usuario =$novoUsuarioDAO->listarUsuario();

include "visao/listarUsuarioTab.php";




