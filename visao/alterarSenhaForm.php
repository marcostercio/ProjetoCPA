 <!--Formulário edição de senha-->
 <form method="post" action="" >
 	<div class="form-row" class="mx-auto">

 		<div class="form-group  col-md-6">
 			<label for="senhaantiga">Senha antiga</label>
 			<input type="password" name="senhaantiga" value="<?php echo @$selecionar['senha'];?>" class="form-control" id="inputSenha" required placeholder="Senha">
 		</div>
 	</div>
 	<div class="form-row" >
 		<div class="form-group  col-md-6">
 			<label for="senha">Senha</label>
 			<input type="password" name="senha" value="<?php echo @$selecionar['senha'];?>" class="form-control" id="inputSenha" required placeholder="Senha">
 			<!--Só para indicar que vai alterar uma senha pro controlador-->
 			<input type="hidden" name="alterarsenha" class="form-control">
 		</div>

 	</div>

 		<button type="submit" class="btn btn-primary p-2">Editar</button>
 	</form>

