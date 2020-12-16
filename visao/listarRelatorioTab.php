

<!--Legenda-->
<table Dlass="table table-borderless ">

	<div class=" text-center " >
		<tr  class="text-center table-sm mr-2  p3">
			<th scope="col" class="border "  >Concordo Totalmente </th><th scope="col" class="back-color text-center  text-light">CT</th>
			<th ></th>
			<th  scope="col" class="border">Concordo Parcialmente </th><th scope="col" class="back-color text-center text-light">CP</th>
			<th ></th>
			<th scope="col"  class="border">Discordo Parcialmente</th><th scope="col" class="back-color border-bottom text-center text-light"> DP</th>
			<th ></th>
			<th scope="col" class="border"  >Discordo Totalmente</th><th scope="col" class="back-color text-center text-light"> DT</th>
		</tr>
	</div>

</table>
<!--<h2 class="sub-header">Subtitle</h2>-->
<!--tabela Quesito-->
<div class="row mt-3">
	<div class="col">
		<div class="table-responsive ">
			<!--Tabela pergunta e quesito-->
			<table class="table">
				<thead class="back-color text-light">
					<tr>
						<th colspan="11" class="text-center"><?=$Relatorio[0]->nomequestionario?>
						<?php

						?>
					</th>
				</tr>
				<tr>
					<th class="text-center" colspan="11">Quesito</th>
				</tr>

			</thead>
			<tbody>
				<tr class="text-center">
					<?php
					foreach ( $Relatorio as $key ) {
						$transforma=get_object_vars($key);


						$dimensao[] = $transforma['titulo'] ;

						?>
						<td scope="col" class="table-active w-100 text-center"  colspan="11"><dt><?=$key->titulo?></dt></td>
					</tr>
					<?php
					//ler perguntas
					$relatorioexp=explodir($key->nomepergunta);
					
					foreach ($relatorioexp as $chave => $valor) {
						$indice=$chave+1;
					//	$respostas[] =trazerResposta($respostaexp[$chave]);
						?>

						<tr style="height:120px;">
							<td><dt><?=$indice?></dt></td>
							<td><dd><?=wordwrap($valor,80,"<br>\n",TRUE)?></dd></td>

						</tr>

						<?php
					}
				}

				?>


			</tbody>
		</table>
	</div>
</div>
<!--outra table-->
<div class="col">
	<div class="table-responsive ">
		<table class="table table-bordered  ">
			<thead class="back-color table-dark">
				<tr >
				<!--<th scope="col">#</th>
					<th scope="col" rowspan="2">Quesito</th>-->
					<th scope="col" colspan="4" class="text-center">Número de Alunos</th>
					<th></th>
					<th scope="col" colspan="4" class="text-center">Porcentagem de Alunos</th>


				</tr>
				<tr class="text-center">
					<th>CT</th>
					<th>CP</th>
					<th>DP</th>
					<th>DT</th>
					<th></th>
					<th>CT</th>
					<th>CP</th>
					<th>DP</th>
					<th>DT</th>	
				</tr>
				

			</thead>
			<tbody >
				<?php
				
				//$respostaexp=explodir($key);
				foreach ( $Relatorio as $k ) {
						//$transforma=get_object_vars($key);

					

					
					?>
					<td scope="col" class="table-active w-100 text-center"  colspan="11"><dt><?=$k->titulo?></dt></td>

					<?php
					//ler respostas
					$indice=$chave+1;
					

						//$teste = $valor;

					?>

				</tr>
				<?php

				//$relatorioresp=explodir($key->resposta);
				$relatoriocodexp=explodir($k->codigopergunta);

				foreach ( $relatoriocodexp as $i=>$r ) {
					$resp=trazerResposta($r);
					
						//VALORES
					$CT = $resp["CTCount"];
					$CP = $resp["CPCount"];
					$DP=$resp["DPCount"];
					$DT=$resp["DTCount"];
					?>

					<tr style="height:120px;" >

						<td><?=$CT!=0?$CT:''?></td>
						<td><?=$CP!=0?$CP:''?></td>
						<td><?=$DP!=0?$DP:''?></td>
						<td ><?=$DT!=0?$DT:''?></td>
						<td></td>
						<!--Se n for 0 a contagem de cada ele faz a conta-->
						<td><?=$CT!=0 ? round(($CT/($CT+$CP+$DP+$DT)*100))."%" : '';?></td>
						<td><?=$CP!=0 ? round(($CP/($CT+$CP+$DP+$DT)*100))."%" : '';?></td>
						<td><?=$DP!=0 ? round(($DP/($CT+$CP+$DP+$DT)*100))."%" : '';?></td>
						<td><?=$DT!=0 ? round(($DT/($CT+$CP+$DP+$DT)*100))."%" : '';?></td>
					</tr>
				<?php }}?>	

			</tbody>
		</table>
	</div>
</div>
</div>
</hr>
