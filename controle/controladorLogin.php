<?php

@$login = $_REQUEST["login"];
@$password = md5($_REQUEST["password"]);
include "visao/loginForm.php";
if (isset ($login) and isset ($password)) {
	require_once "modelo/DAO/ClasseUsuarioDAO.php";
	$logar = new classeUsuarioDAO();
	$resultado = $logar->logar($login,$password);


	if($resultado){
	//se n tiver desativado
		if($resultado['status']!=0){
			session_start();
			
			$_SESSION['cod_usuario'] = $resultado['cod_usuario'];
			$_SESSION['cod_perfil'] = $resultado['cod_perfil'];

			?>
			<div class="alert alert-success mt-3" role="alert">
				Login efetuado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
	<script>
			
				window.location.href = "dashboard.php";
			</script>
			<?php
		}
		else{
			?>

			<div class="alert alert-danger mt-3" role="alert">
				Sua conta esta Inativa.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php
		}

	}

	else{
		?>
		
		<div class="alert alert-danger mt-3" role="alert">
			Usuário ou senha incorretos!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
}


?>