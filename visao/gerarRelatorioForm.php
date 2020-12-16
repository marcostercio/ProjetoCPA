<!--Formulário  para Gerar relatório-->
<form method="post" action="">
	<div class="form-row" >
		<!--Relacionado a dimensão-->
		<div class="form-group col-md-6">
			<label for="tipoquestionario">Questionário a gerar relatório:</label>
			<select id="tipoquestionario" required="" class="form-control"  name="codigoquestionario">
				<option value="" required>--</option>
				<?php
				foreach($questionario as $nomequestionario){
					?>
					<option value="<?php echo $nomequestionario->cod_questionario;?>" >
						<?php echo $nomequestionario->status_questionario==1?'<span class="text-success">'. $nomequestionario->nome.' (Ativado)</span>':$nomequestionario->nome.' (Desativado)'?></option>

						<?php

					}
					?>

				</select>


			</div>


			<input type="hidden"  name="gerarrelatorio" class="form-control" placeholder="Gerar Relatório">
			<span class="form-group pt-2">
			<button type="submit" data-toggle="modal" data-target=".bd-example-modal-lg"class="btn btn-primary mt-4 py-1 ">
				Gerar relatório
			</button>
			</span>
		</div>



	</form>