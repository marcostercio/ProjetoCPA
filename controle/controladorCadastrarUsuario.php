<?php
//quero que esteja logado
//quero que o usuario 1 

require_once "modelo/DAO/ClasseUsuarioDAO.php";

//<!-- Recupera os dados do formulário -->
if(isset($_POST['cadastrar'])AND !isset ($_GET['acao'])=='editar'){
	$nome = $_REQUEST['nome'];
	$sobrenome = $_REQUEST['sobrenome'];
	$matricula = $_REQUEST['matricula'];
	$status = $_REQUEST['status'];
	//$status_prova = $_REQUEST['status_prova'];
	$email = $_REQUEST['email'];
	$senha = $_REQUEST['senha'];
	$perfil = $_REQUEST['tipousuario'];
	
	//verifico usuario
	$verificaCadastrarUsuario = new classeUsuarioDAO();
	$verificar=$verificaCadastrarUsuario->verificaCadastro($email,$matricula);
	//se ja existir esse email ou matricula
	if($verificar){
		?>
		<div class="alert alert-danger" role="alert">
			Email ou matrícula já existentes!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php

	}
	else{
		/*incluo os metodos da classe classeUsuario*/
		include "modelo/classeUsuario.php";


	//instancio a classe criando assim um objeto
		$objetoUsuario = new classeUsuario();
		$objetoUsuario->setNome($nome);
		$objetoUsuario->setMatricula($matricula);
		$objetoUsuario->setSobrenome($sobrenome);
		$objetoUsuario->setStatus($status);
	//$objetoUsuario->setStatus_prova($status_prova);
		$objetoUsuario->setEmail($email);
		$objetoUsuario->setSenha($senha);
		$objetoUsuario->setCod_perfil($perfil);

	//instancio a classe (transformo a classe em objeto=objetoCadastrarUsuario)
		$objetoCadastrarUsuario = new classeUsuarioDAO();
		$cadastrar=$objetoCadastrarUsuario->cadastrarUsuario($objetoUsuario);
		
	//Se for cadastrado
		if($cadastrar){
			?>
			<div class="alert alert-success my-3" role="alert">
				Usuário Cadastrado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
// the message
			$msg = "Olá ".$nome." você foi Cadastrado no sistema CPA da FAC DF!\n
			Logue com seu Email: ".$email." ou Matricula: ".$matricula."\n sua senha:".$senha;

// use wordwrap() if lines are longer than 70 characters
			$msg = wordwrap($msg,70);

// send email
			$enviaremail = mail("projetocpa2020@gmail.com","Cadastro CPA FACDF",$msg);
			if($enviaremail){
				echo "Email enviado para usuário!";
			}
			?>
			<?php
		}
		else{
			?>
			
			<div class="alert alert-danger" role="alert">
				Não foi possivel Cadastrar o Usuário!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
		}

	}

}
//incluo esse controlador para o formulario reconhcera a pesquisa
include 'controladorPesquisarUsuario.php';
include 'controladorAtualizarUsuario.php';
//vai ser utilizado
include "controladorPesquisarPerfis.php";
include "visao/cadastrarUsuarioForm.php";