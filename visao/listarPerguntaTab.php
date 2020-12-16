<!--Listar Perguntas-->

<h3><?php 
$flag=0;
foreach($Pergunta as $perguntasBuscadas){

}
if(isset($perguntasBuscadas)){
	echo @$perguntasBuscadas->nomedoquestionario;
	echo "(".@$perguntasBuscadas->descricao.")";
}
?>

</h3>
<hr>
<div class="table-responsive">
	<table class="table">
		<thead class="back-color text-light text-center">
			<tr>
				<th scope="col">#</th>
				<th scope="col" colspan="11" >Pergunta</th>
				<th scope="col" >Ações</th>
				
			</tr>
		</thead>
		<tbody>

			<?php
			//separo a consulta de perguntas juntas separadas por virgula
			function explodir($variavel){
				$alt =explode(";" ,$variavel);
				return $alt;
			}	function explodircod($variavel){
				$alt =explode("," ,$variavel);
				return $alt;
			}

			if($Pergunta){
//varre os objetos
				
				foreach($Pergunta as $perguntasBuscadas){
					$flag+=1;	



					?>
					<tr>
						<td class="table-active text-center" colspan="14" ><dt><?=($perguntasBuscadas->dimensao)?></dt></td>
					</tr>
					<tr>
						
						
						
						

						
						<?php 
						
						$numeropexp = explodircod($perguntasBuscadas->codigopergunta);

						$nomepexp = explodir($perguntasBuscadas->nomedapergunta);
						//varro as perguntas separadas por virgula 
						foreach ($nomepexp as $key => $value) {
							
							$indice=$key+1;
							//$quantidade=count($npexp);
							?>
							<tr>

								<?php
								echo "<td>".$indice."</td>";
								//quebra linha se for maior que 80 palavras
								echo "<td >".wordwrap($value,80,"<br>\n",TRUE)."</td>";
								?>
								
								<!--botoes-->

								<td >
									

									<a href="<?=nomedapagina?>?pag=pergunta&idq=<?=$_GET['idq']?>&id=<?php echo @$numeropexp[$key] ?>&acao=editar">
										<button id="editarpergunta" class="btn btn-outline-primary">Editar</button>
									</a>
									<a href="<?=nomedapagina ?>?pag=pergunta&idq=<?=$_GET['idq']?>&id=<?php echo @$numeropexp[$key] ?>&acao=deletar"><button class="btn btn-outline-danger">Excluir</button></a>
								</td>

							</tr>
							<?php
						}
						

					} ?>




				</tr>
			</a>
			<?php
		}   


			//}

		else{
			echo "	<tr ><td colspan='16' class='text-center'>Nenhuma Pergunta para listar</td></tr>";
		}

		?>


	</tbody>
</table>
</div>
</hr>