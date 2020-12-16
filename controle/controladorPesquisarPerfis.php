<?php
require_once 'modelo/DAO/ClasseUsuarioDAO.php';
$trazerperfis = new classeUsuarioDAO();
$perfisresul = $trazerperfis->pesquisarPerfis();
?>