<?php
//definição de variaveis de perfis
include "controladorPesquisarPerfis.php";
foreach($perfisresul as $perfil){
	//ADMINISTRADOR, DISCENTES,DOSCENTES,PROFESSORES varre e define
	DEFINE($perfil['tipo_perfil'],$perfil['cod_perfil']);
	
}
session_start();
//função para sair
function sair(){
	session_unset();
}
//Deslogar
@$sair=$_GET['sair'];
if(isset($sair)){
	sair();
}
//verifica se esta logado se sim busca o nome do usuário
if(!isset($_SESSION['cod_usuario'])){
	?>
	
	<script type="text/javascript">
		window.location.href = "index.php";
	</script>
	<?php
}
else{
	$selecionarUmUsuario = new classeUsuarioDAO();
	@$usuarioinformacao=$selecionarUmUsuario->selecionarUnicoUsuario($_SESSION['cod_usuario']);
}
//proteção página administrativa
function protecaoADM(){
	if($_SESSION['cod_perfil']!=ADMINISTRADOR){
		?>

		<div class="alert alert-danger" role="alert">
			Acesso permitido somente para administradores!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<script type="text/javascript">
			window.location.href = "index.php?dashboard.php";
		</script>
		<?php
	}
}
class controladorLinks{
	//criei uma função construtiva    

	function __construct() {
	}

	public static function index(){
		?>
		<h3> Olá! tudo bem? </h3>
		<?php
		include "controle/controladorApresentacaoAvaliacao.php";		
	}
	
	public static  function administrarUsuario(){
		protecaoADM();
		?>
		<h3>Usuários</h3>
		<?php

			//Formulário de cadastrado e edição-
		
		include "controle/controladorCadastrarUsuario.php";

		//Listar usuários
		
		include "controle/controladorListarUsuario.php";

	}
	public static function questionario(){
		protecaoADM();
		?>

		<h3>Cadastrar Questionário</h3>
		<?php

		include "controle/controladorCadastrarQuestionario.php";
		include 'controle/controladorListarQuestionario.php';
		
		
	}
	public static function pergunta(){
		protecaoADM();
		?>
		<h3>Cadastrar Perguntas</h3>
		<?php
		include "controle/controladorCadastrarPergunta.php";
		include "controle/controladorListarPergunta.php";
	}
	public static function alterarSenha(){
		include "controle/controladorAlterarSenha.php";	
	}
	public static function relatorio(){
		protecaoADM();
		?>
		<h3>Gerar relatório de questionário</h3>
		<?php
		include "controle/controladorGerarRelatorio.php";	
	}

	public static function apresentacaoAvaliacao(){		
		?>
		<h3> Olá! tudo bem? </h3>
		<?php
		include "controle/controladorApresentacaoAvaliacao.php";
	}
	public static function avaliacao(){
		include "controle/controladorAvaliacao.php";
	}

}