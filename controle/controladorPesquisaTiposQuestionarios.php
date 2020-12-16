<?php
//include "modelo/DAO/ClasseQuestionarioDAO.php";
$tiposdequestionarios= new classeQuestionarioDAO();
$resultadotipos = $tiposdequestionarios->pesquisarTipos();

?>