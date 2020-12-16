 <!--Formulário de cadastrado e edição-->
 <form method="post" action="">
 	<div class="form-row" >
 		<!--Relacionado a questionario-->
 		<div class="form-group col-md-6">
 			<label for="inputNomeQuestionario">Nome Questionario</label>
 			<input type="text" value ="<?=@$selecionar['nome'];?>"name="nomequestionario" class="form-control" id="inputquestionario" placeholder="Nome do Questionario">
 		</div>
 			<div class="form-group col-md-6">
 				<label for="inputDescQuestionario">Descrição do Questionario</label>
 				<input type="text" value ="<?=@$selecionar['detalhe'];?>"name="descquestionario" class="form-control" id="inputdescquestionario" placeholder="Descrição do Questionario">
			</div>
			<div class="form-group col-md-6">
 				<label for="tipoquestionario">Tipo do Questionario (direcionado a quem?)</label>
 				<select id="tipoquestionario" required="" class="form-control"  name="tipoquestionario">
 				<option value="" required>--</option>
 				<?php
 				foreach($resultadotipos as $tpquest){
 					?>
 					<option value="<?php echo $tpquest['cod_tipo_questionario'];?>" <?php echo ($tpquest['cod_tipo_questionario']==@$selecionar['cod_tipo_questionario']?'selected':'');?>>
 						<?php echo $tpquest['tipo_questionario'];?></option>

 						<?php

 					}
 					?>
				
			</select>
			</div>
			
 			
			<div class="form-group col-md-3">
 				<label for="inputDescQuestionario">Data Início</label>
 				<input type="datetime-local" value ="<?=$data_disponibilidade?>"name="datainicioquestionario" class="form-control" id="inputdtinicioquestionario" placeholder="Para quem será aplicado">
 				</div>
			<div class="form-group col-md-3">
 				<label for="inputdtfimQuestionario">Data Fim</label>
 				<input type="datetime-local" value ="<?=$data_encerramento?>" name="datafimquestionario" class="form-control" id="inputdtfimquestionario" placeholder="Para quem ser aplicado">
 			</div>
 			
 			<input type="hidden" value="<?php echo $selecionar['cod_questionario'];?>" name="<?php echo (isset($_GET['acao']) && $_GET['acao']=='editar'? "editar":"cadastrar") ?>" class="form-control" placeholder="cadastrar">
 		
 	

<!-- relacionado e dimensão
	<div class="form-group col-md-6">
		<h3>Pergunta</h3>
	</div>
	<div class="form-group col-md-6">
	</div>
	
 	<div class="form-group col-md-3">
 		
 		<label for="dimensao">Dimensão</label>
 		<input type="text" name="senha" value="" class="form-control" id="dimensao" required placeholder="Senha">
 	</div>
 <div class="form-group col-md-6">
 </div>
 	<!--Relacionado a perguntas
	 	<div class="col-md-6">
	
	 		<label for="pergunta">Pergunta</label>
	 		<textarea class="form-control" name="pergunta" id="pergunta" rows="3">
	 			
	 		</textarea>-->
	
 	</div>

<button type="submit" class="btn btn-primary p-2"><?php echo (@$_GET['acao']!='editar' ?  'Cadastrar': 'editar')?>	
</button>
</div>

 

</form>


