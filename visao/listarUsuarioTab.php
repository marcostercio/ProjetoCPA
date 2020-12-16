<!--Listar usuários-->
<hr>
<div class="table-responsive">
	<table class="table  table-hover table-striped">
		<thead class="back-color text-light">
			<tr class="text-center">
				<th scope="col">#</th>
				<th scope="col">Nome</th>
				<th scope="col">Sobrenome</th>
				<th scope="col">Prova</th>
				<th scope="col">Email</th>
				<th scope="col">Matrícula</th>
				<th scope="col">Status</th>
				<th scope="col" colspan="">Tipo</th>
				<th scope="col" colspan="4" >Ações</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			if(isset($usuario)){
//varre os objetos
				$flag=0;
				foreach($usuario as $usuarioBuscados){
					$flag+=1;	

					?>

					<tr>
						<th scope="row"><?php echo $flag; ?></th>
						<td><?php echo $usuarioBuscados->nome ?></td>
						<td><?php echo $usuarioBuscados->sobrenome ?></td>
						<td><?php echo fezprova($usuarioBuscados->cod_perfil,$usuarioBuscados->cod_usuario)==TRUE? '<span class="text-success">Feita</span>':'<span class="text-secondary">Pendente</span>'?></td>
						<td><?php echo $usuarioBuscados->email ?></td>
						<td><?php echo $usuarioBuscados->matricula ?></td>
						<td><?php echo ($usuarioBuscados->status==0?'<span class="text-secondary">Desativado</span>':'<span class="text-success">Ativado</span>') ?></td>
						
						<td>
						<?php
						//varre a tabela perfil e compara qual perfil perntence
						foreach($perfisresul as $perfis){
							?>
						
						
						<?php echo substr(($usuarioBuscados->cod_perfil==$perfis['cod_perfil']? $perfis['tipo_perfil']:''),0,4);
						?>
						
					<?php } ?>
						</td>
						<td><a href="?pag=administrarUsuario&id=<?php echo $usuarioBuscados->cod_usuario ?>&acao=editar"><button id="editarUsuario" class="btn btn-outline-primary">Editar</button></a></td>
						<td><a href="?pag=administrarUsuario&id=<?php echo $usuarioBuscados->cod_usuario ?>&acao=deletar"><button class="btn btn-outline-danger">Excluir</button></a></td>



					</tr>

					<?php
				}   


			}

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