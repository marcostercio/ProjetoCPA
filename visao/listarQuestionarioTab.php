
<!--Listar usuários-->
<h5 class="pt-4">Somente ative o questionário a ser aplicado (somente será permitido um questionario ativado por tipo).</h5>
<hr>
<div class="table-responsive ">
	<table class="table  table-hover ">
		<thead class="back-color text-light">
			<tr class="text-center">
				<th scope="col">#</th>
				<th scope="col">Nome</th>
				<th scope="col">Status</th>
				<th scope="col">Tipo Questionário</th>
				<th scope="col">Data Início</th>
				<th scope="col">Data Fim</th>
				<th scope="col" colspan="11">Ações</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			if(isset($questionario)){
//varre os objetos
				$flag=0;
				foreach($questionario as $questionarioBuscados){
					$flag+=1;	

					?>
					
					<tr>
						<th scope="row"><?php echo $flag; ?></th>
						<td >
							<!--Link para pagina de perguntas-->
							<a href="<?=nomedapagina?>?pag=pergunta&idq=<?=$questionarioBuscados->cod_questionario?>" data-toggle="popover" title="<?=$questionarioBuscados->nome?>" data-content="<?=$questionarioBuscados->detalhe?>Clique para adicionar perguntas a este questionário." class="example-popover alert-link" data-trigger="hover" data-container="body">
								<span class="row text-dark" ><?php echo $questionarioBuscados->nome."</span></a> <div class='row'>
									<span class='badge  badge-secondary mr-2'>".qtdpergunta($questionarioBuscados->cod_questionario)."</span><small>".$questionarioBuscados->data_cadastramento."</small></div>"?>

							</td>
							<!--Status do questionário-->
							<td><a href='<?=nomedapagina?>?pag=questionario&iddq=<?=$questionarioBuscados->cod_questionario; ?>'

								data-toggle="popover" title="Clique aqui para ativar ou desativar questionario" data-content="Clique para adicionar para desativar ou ativar." class="example-popover " data-trigger="hover" data-container="body">


								<?php echo ($questionarioBuscados->status_questionario == 0 ? "<span class='text-secondary'>Desativado</span>":"<span class='text-success'>Ativado</span>")?></a></td>
								<td><?php echo ($questionarioBuscados->cod_tipo_questionario==4 ?'<span class="text-info">'.$questionarioBuscados->nometipo.'</span>':$questionarioBuscados->nometipo); ?>
							</td>

							<td><?php echo $questionarioBuscados->data_disponibilidade ?></td>
							<td><?php echo $questionarioBuscados->data_encerramento ?></td>
							<td><a href="<?=nomedapagina?>?pag=questionario&id=<?php echo $questionarioBuscados->cod_questionario ?>&acao=editar">
								<button id="editarquestionario" class="btn btn-outline-primary">Editar</button>
							</a></td>
							<td><a href="<?=nomedapagina ?>?pag=questionario&id=<?php echo $questionarioBuscados->cod_questionario ?>&acao=deletar"><button class="btn btn-outline-danger">Excluir</button></a></td>

						<?php } ?>




					</tr>
				</a>
				<?php
			}   


			//}

			else{
				echo "Nenhum usuario para listar";
			}

			?>

				<!-- <tr>
					<th scope="row">2</th>
					<td>Jacob</td>
					<td>Thornton</td>
					<td>JS developer</td>
					<td>JS developer</td>
					<td>JS developer</td>
					<td>JS developer</td>
					<td>JS developer</td>

				</tr>
				<tr>
					<th scope="row">3</th>
					<td>Larry</td>
					<td>Bird</td>
					<td>Back-end developer</td>
					<td>Back-end developer</td>
					<td>Back-end developer</td>
					<td>Back-end developer</td>
					<td>Back-end developer</td>
				</tr>
				<tr>
					<th scope="row">4</th>
					<td>Martin</td>
					<td>Smith</td>
					<td>Back-end developer</td>
					<td>Back-end developer</td>
					<td>Back-end developer</td>
					<td>Back-end developer</td>
					<td>Back-end developer</td>
				</tr>
				<tr>
					<th scope="row">5</th>
					<td>Kate</td>
					<td>Mayers</td>
					<td>Scrum master</td>
					<td>Scrum master</td>
					<td>Scrum master</td>
					<td>Scrum master</td>
					<td>Scrum master</td>

				</tr> -->
			</tbody>
		</table>
	</div>
</hr>