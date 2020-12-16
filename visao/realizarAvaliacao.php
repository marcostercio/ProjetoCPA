
<div class="form-row" >
	<!--Relacionado a dimensão-->
	<div class="form-group col-md-12">
		<h3 class="text-center">			
			<?=$Avaliacao[0]->nomequestionario?>
		</h3>
	</div>	

</div>
<form method="post" action="">
	<div class="form-row" >
		<div class="form-group col-md-12  ">
			
			<?php
			foreach ( $Avaliacao as $key ) {
				
				?>
				<!--dimensao-->
				<div class='table-active py-2 text-center'>
					<dt><?=$key->titulo?></dt>
				</div>
			</div>

		</div>	

		<?php
					//ler perguntas
		$Avaliacaoexp=explodir($key->pergunta);
		//ler codigo pegunta
		$codAvaliacaoexp=explodir($key->codpergunta);
		foreach ($Avaliacaoexp as $chave => $valor) {
			$indice=$chave+1;
			@$contador = $contador+1;

			?>

			<div class="form-row">
				<div class="form-group col-md-10">


					<label for="tipoquestionario"><strong><?=$indice?></strong>.
						<?=wordwrap($valor,100,"<br>\n",TRUE)?>
					</label>
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<!--manda cod_pergunta o id da pergunta-->
						<input type="hidden" name="codigopergunta[]" value="<?=$codAvaliacaoexp[$chave]?>">
						<label class="btn btn-outline-success">
							<input type="radio" name="options[<?=$contador?>]" class="" value="19" id="option1" required > Concordo totalmente
						</label>
						<label class="btn btn-outline-primary">



							<input type="radio" name="options[<?=$contador?>]" value="20" id="option2"> Concordo parcialmente
						</label>
						<label class="btn btn-outline-secondary">
							<input type="radio" name="options[<?=$contador?>]" value="21" id="option3"> Discordo parcialmente
						</label>
						<label class="btn btn-outline-danger">
							<input type="radio" name="options[<?=$contador?>]" value="22" id="option4"> Discordo totalmente

						</label>

					</div>



				</div>
			</div>


			<?php
		}
	}



	?>



	<button type="submit" name="enviar" onclick=" confirm('Após confirmar o envio não sera possivel alterar a avaliação')" class="btn btn-primary p-2">Enviar Avaliação	
	</button>
</form>
