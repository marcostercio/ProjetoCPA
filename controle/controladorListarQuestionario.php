<?php

//é chamado aqui para excluir antes de listar novamente sem precisar atualizar a pagina
include "controladorDeletarQuestionario.php";
include "controladorDesativarQuestionario.php";
require_once 'modelo/DAO/ClasseQuestionarioDAO.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Listar todos usuários

$novoQuestionarioDAO = new classeQuestionarioDAO();
$questionario =$novoQuestionarioDAO->listarQuestionario();
//quantidade e perguntas tem
function qtdpergunta($idquestionario){
$pgtQuestionarioDAO = new classeQuestionarioDAO();
$qtdpgt =$pgtQuestionarioDAO->qtdpergunta($idquestionario);
return $qtdpgt['quantidadepergunta'];
}
//include "visao/listarUsuarioTab.php";

  define ('nomedapagina','dashboard.php');
include 'visao/listarQuestionarioTab.php';