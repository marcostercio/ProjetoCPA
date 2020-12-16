<?php

//é chamado aqui para excluir antes de listar novamente sem precisar atualizar a pagina
//depois coloco essa opção
include "controladorDeletarPergunta.php";
require_once 'modelo/DAO/ClassePerguntaDAO.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//pega da url o id do questionário
$cod_questionario = $_REQUEST['idq'];
//Listar todos usuários

$novoPerguntaDAO = new classePerguntaDAO();
$Pergunta =$novoPerguntaDAO->listarPergunta($cod_questionario);

//include "controladorDeletarUsuario.php";

//include "visao/listarUsuarioTab.php";

  define ('nomedapagina','dashboard.php');
include 'visao/listarPerguntaTab.php';