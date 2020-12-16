<!--Formulário de cadastrado e edição-->
<form method="post" action="">
	<div class="form-row" >
		<!--Relacionado a dimensão-->
		<div class="form-group col-md-6">
			<label for="tipoquestionario">Dimensão a qual pertence(Sobre)</label>
			<select id="tipoquestionario" required="" class="form-control"  name="tipopergunta">
				<option value="" required>--</option>
				<?php
				foreach($dimensaoresul as $dimensao){
					?>
					<option value="<?php echo $dimensao['cod_dimensao'];?>" <?php echo ($dimensao['cod_dimensao']==@$selecionar['cod_dimensao']?'selected':'');?>>
						<?php echo ( $dimensao['titulo']);?></option>

						<?php

					}
					?>

				</select>


			</div>

			<?php
				@$acao=$_GET['acao'];
			?>
			<input type="hidden"  name="<?php echo $acao=="editar"? "editar":"cadastrar"; ?>" class="form-control" placeholder="cadastrar">


	 	</div>
	 	<!--outra linha-->
	 	<div class="form-row" id="cadastrarlinhaform">
	 		<!--Pergunta a ser cadastrada-->
	 		
	 		<div class="form-group col-md-6" id="formcadastrarpergunta">
	 			<label for="pergunta">Pergunta a ser cadastrada</label>
	 			<input type="text" class="form-control" id="pergunta" name="pergunta[]" value="<?=@$selecionar['pergunta']?>">
	 		</div>
	 		<div class="form-group pt-4 ">	
	 		<button type="button" class="mt-2 py-1 px-2"  id="addcampo" >  +</button>
	 		
	 	</div>
	 
	 	
	 	</div>


	 	<button type="submit" class="btn btn-primary p-2"><?php echo $acao=='editar' ? 'editar' : 'Cadastrar';?>	
	 </button>
	</div>



</form>