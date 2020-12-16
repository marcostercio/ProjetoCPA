 <!--Formulário de cadastrado e edição-->
 <form method="post" action="">
 	<div class="form-row" >
 		<div class="form-group col-md-6">
 			<label for="inputEmail">Email</label>
 			<input type="email" value ="<?php echo @$selecionar['email'];?>"name="email" class="form-control" id="inputEmail" placeholder="Email">

 			<input type="hidden" value="<?php echo $selecionar['cod_usuario']?>" name="<?php echo ( isset($_GET['acao'])&& $_GET['acao']=='editar'? "editar":"cadastrar") ?>" class="form-control" placeholder="cadastrar">
 		</div>
 		<div class="form-group col-md-6">
 			<label for="inputSenha">Senha</label>
 			<input type="password" name="senha" value="<?php echo @$selecionar['senha'];?>" class="form-control" id="inputSenha" required placeholder="Senha">
 		</div>
 	</div>
 	<div class="form-group">
 		<label for="inputname">Nome</label>
 		<input type="text" name="nome" value="<?php echo @$selecionar['nome'];?>" class="form-control" id="inputNome" placeholder="Digite um nome">
 	</div>
 	<div class="form-group">
 		<label for="inputsobrenome">Sobrenome</label>
 		<input type="text" name="sobrenome" value="<?php echo @$selecionar['sobrenome'];?>" class="form-control" id="inputSobrenome" placeholder="Sobrenome">
 	</div>
 	<div class="form-row">
 		<div class="form-group col-md-6">
 			<label for="inputmatricula">Matricula</label>
 			<input type="text" name="matricula" value="<?php echo @$selecionar['matricula'];?>"class="form-control" id="inputMatricula">
 		</div>
 		<div class="form-group col-md-2">
 			<label for="inputStatus">Status</label>
 			<select id="inputStatus" name="status" required class="form-control">
 				<option value=""<?php echo (@$selecionar['status']== "" ? 'selected' : '');?>>--</option>

 				<option value="1"<?php echo (@$selecionar['status'] == true  & isset($_GET['acao']) ? 'selected' : '');?>>Ativado</option>
 				<option value="0" <?php echo (@$selecionar['status'] == false & isset($_GET['acao']) ? 'selected' :'');?>>Desativado</option>
 			</select>

 		</div>

 	<!-- forma diferente de ver q o usuario realizou a prova
 		<div class="form-group required col-md-2">
 			<label for="inputState_prova">Prova Status</label>
 			<select id="inputState_prova" name="status_prova" required class="form-control">

 				<option value="" selected>--</option>
 				<option value="1" <?php echo(@$selecionar['status_prova']==1  & isset($_GET['acao'])?'selected' :"")?>>Realizada</option>
 				<option value="0" <?php echo(@$selecionar['status_prova']==0 & isset($_GET['acao']) ?'selected' :"")?>>Pendente</option>
 			</select>
 		</div>-->
 		<div class="form-group col-md-2">
 			<label for="tipousuario">Tipo</label>
 			<select id="tipousuario" name="tipousuario" required="" class="form-control">
 				<option value="" required>--</option>
 				<?php
 				foreach($perfisresul as $perfil){
 					?>
 					<option value="<?php echo $perfil['cod_perfil']; ?>" <?php echo(@$selecionar['cod_perfil']==$perfil['cod_perfil']?'selected':'');?>>
 						<?php echo $perfil['tipo_perfil'];?></option>

 						<?php

 					}
 					?>-->
				<!--
				<option selected>Indefinido</option>
				<option value="1" >Administrador</option>
				<option value="2"<?php $usuarioBuscados->cod_perfil ==2 ? "selected" : ""?>>Auxiliar</option>
				<option value="3" <?php $usuarioBuscados->cod_perfil ==3 ? "selected" : ""?>>Aluno</option>
				<option value="4" <?php $usuarioBuscados->cod_perfil ==4 ? "selected" : ""?>>Professor</option>-->
			</select>
		</div>
	</div>
	

</div>
</div>
<button type="submit" class="btn btn-primary p-2"><?php echo (@$_GET['acao']!='editar' ?  'Cadastrar': 'editar')?></button>
</form>

