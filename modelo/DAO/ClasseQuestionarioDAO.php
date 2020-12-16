<?php
//adiciona a conexao
require_once 'conexao.php';
class ClasseQuestionarioDAO {
	 public function cadastrarQuestionario(classeQuestionario $novoQuestionario){
    $date = date('Y-m-d H:i:s');
    $pdo = conexao::getInstance();
    $cadastrarQuestionario = $pdo->prepare("INSERT into questionario ( cod_tipo_questionario,data_cadastramento,data_disponibilidade,data_encerramento,detalhe,cod_usuario,nome,status_questionario)values( :cod_tipo_questionario, :data,:data_disponibilidade,:data_encerramento,:detalhe,:cod_usuario,:nome,:status_questionario)");

    $cadastrarQuestionario->bindvalue(":cod_tipo_questionario",$novoQuestionario->getCod_tipo_questionario());
       // $cadastrarQuestionario->bindvalue(":data_cadastramento",'CURRENT_TIMESTAMP');
    $cadastrarQuestionario->bindvalue(":data",$date);
    $cadastrarQuestionario->bindvalue(":data_disponibilidade",$novoQuestionario->getData_disponibilidade());
    $cadastrarQuestionario->bindvalue(":data_encerramento",$novoQuestionario->getData_encerramento());
    $cadastrarQuestionario->bindvalue(":detalhe",$novoQuestionario->getDetalhe());
    $cadastrarQuestionario->bindvalue(":cod_usuario",$novoQuestionario->getCod_usuario());
    $cadastrarQuestionario->bindvalue(":nome",$novoQuestionario->getNome());
    $cadastrarQuestionario->bindvalue(":status_questionario",0);
    return $cadastrarQuestionario->execute();



  }
     //selecionar tipos de Questionários
  public function pesquisarTipos(){
    $pdo = conexao :: getInstance();
    $pesquisarPerfis = $pdo->prepare("select * from tipo_questionario");
    $pesquisarPerfis ->execute();
    $resultado = $pesquisarPerfis ->fetchall(PDO::FETCH_ASSOC);
    return $resultado;
  }

  public function listarQuestionario(){
   try{
     $pdo = conexao::getInstance();
     $listarquestionario=$pdo->prepare("SELECT tq.tipo_questionario as nometipo, 
       qs.* from tipo_questionario as tq 
       LEFT JOIN questionario as qs
       ON tq.cod_tipo_questionario=qs.cod_tipo_questionario


       order by qs.data_cadastramento DESC");
     $listarquestionario->execute();
     $questionariolist= array();
     while($questionarioObj=$listarquestionario->fetchObject(__CLASS__) ){
       $questionariolist[]=$questionarioObj;
     }
     return $questionariolist;
   }   
   catch(PDOException $erro){
     echo $erro->getTraceAsString();
   }

 }
     //deletar Questionário
 public function deletarQuestionario($id){
  $pdo = conexao::getInstance();
  $deletarquestionario = $pdo->query("DELETE from questionario where cod_questionario='$id'");
  return $deletarquestionario->execute();
}
     //selecionarUnicoQuestinario
public function selecionarUnicoQuestionario($id){
  $pdo = conexao::getInstance();
  $selecionarUnicoQuestionario = $pdo->prepare("SELECT * from Questionario where cod_questionario=:id");
  $selecionarUnicoQuestionario->bindvalue(":id",$id);
  $selecionarUnicoQuestionario->execute();
        //fetchall() seria se fosse mais de um Questionario
        $resultado = $selecionarUnicoQuestionario -> fetch(PDO::FETCH_ASSOC);//apenas nome das colunas
        return $resultado;
      }
    //Atualizar Questionarios
      public function atualizarQuestionario(classeQuestionario $questatualizar){
        $pdo = conexao::getInstance();

        $atualizarQuestionario = $pdo ->prepare("UPDATE questionario SET cod_tipo_questionario=:cod_tipo_questionario,data_disponibilidade=:data_disponibilidade,data_encerramento=:data_encerramento,detalhe=:detalhe,nome=:nome WHERE cod_questionario=:cod_questionario");

        $atualizarQuestionario->bindvalue(":cod_tipo_questionario",$questatualizar->getCod_tipo_questionario());
       // $atualizarQuestionario->bindvalue(":data_cadastramento",'CURRENT_TIMESTAMP');
        $atualizarQuestionario->bindvalue(":data_disponibilidade",$questatualizar->getData_disponibilidade());
        $atualizarQuestionario->bindvalue(":data_encerramento",$questatualizar->getData_encerramento());
        $atualizarQuestionario->bindvalue(":detalhe",$questatualizar->getDetalhe());
       // $atualizarQuestionario->bindvalue(":cod_Questionario",$questatualizar->getCo//d_Questionario());
        $atualizarQuestionario->bindvalue(":nome",$questatualizar->getNome());
        $atualizarQuestionario->bindvalue(":cod_questionario",$questatualizar->getCod_questionario());

        return $atualizarQuestionario->execute();
      }

      public function qntQuestionario($cod_questionario){
        $pdo = conexao::getInstance();
        $resultado = $pdo->prepare ("SELECT count(p.pergunta)
          qtdpergunta,cod_tipo_questionario,status_questionario  from pergunta_questionario pq 
          inner join pergunta p on p.cod_pergunta = pq.cod_pergunta 
          inner join questionario q  on  pq.cod_questionario= q.cod_questionario
          where q.cod_questionario = :cod_questionario");
        $resultado -> bindvalue(':cod_questionario',$cod_questionario);
        $resultado->execute();
        $tiporesultado=$resultado->fetch(PDO::FETCH_ASSOC);
        return $tiporesultado;
      }

    //Atualizar Status questionario
      public function atualizarStatusQuestionario($cod_questionario){

        $pdo = conexao::getInstance();
      //1 passo procuro qual resultado do questionário com esse id
        $tiporesultado = ClasseQuestionarioDAO::qntQuestionario($cod_questionario); 

      //verifica se vai retornar algum valor e so executa se retonar
        if($tiporesultado['qtdpergunta']>15){
      //se o status tiver 1 ele alterado pra 0 e se tiver 0 alterado pra 1
          $status=$tiporesultado['status_questionario']==1?0:1;

        //atualize o status atribuido a cima para o questionario com codigo recebido no parametro
          $atualizarStatus = $pdo ->prepare("UPDATE questionario SET status_questionario=:status_questionario where cod_questionario=:cod_questionario");
          $atualizarStatus->bindvalue(":status_questionario",$status);
          $atualizarStatus->bindvalue(":cod_questionario",$cod_questionario); 
          $atualizarStatus->execute();
        //Desativo os demais questionario que tem o mesmo tipo de questionário assim evitando que dois questionarios do mesmo tipo fiquem ativos.
          $desativarOutros = $pdo->prepare("UPDATE questionario set status_questionario=:status_questionario where cod_questionario!=:cod_questionario and cod_tipo_questionario=:cod_tipo_questionario");
          $desativa=0;
          $desativarOutros->bindvalue(":status_questionario",$desativa);
          $desativarOutros->bindvalue(":cod_questionario",$cod_questionario);
          $desativarOutros->bindvalue(":cod_tipo_questionario",$tiporesultado['cod_tipo_questionario']);
       // $atualizarQuestionario->bindvalue(":tipo",$tipo);
          $desativarOutros->execute();
          return $atualizarStatus->execute();
        }
        else{
          ?>


          <div class="alert alert-danger mt-3" role="alert">
            Não é possivel ativar questionarios com menos de 15 perguntas.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
        }
      }
      public function gerarRelatorio($codigoquestionario){
        $pdo=conexao::getInstance();
        $relatorio = $pdo->prepare("SELECT  GROUP_CONCAT(p.pergunta order by p.cod_pergunta ASC separator ';') nomepergunta,GROUP_CONCAT(p.cod_pergunta order by p.cod_pergunta ASC separator ';') codigopergunta, q.nome nomequestionario, d.titulo titulo from pergunta p 

          INNER JOIN dimensao d ON d.cod_dimensao=p.cod_dimensao
          INNER JOIN pergunta_questionario as pq ON p.cod_pergunta=pq.cod_pergunta



          INNER JOIN (SELECT * FROM questionario WHERE cod_questionario=:codigoquestionario) q on q.cod_questionario=pq.cod_questionario

          GROUP BY p.cod_dimensao

          ");
        $relatorio->bindvalue(":codigoquestionario",$codigoquestionario);
        $relatorio->execute();
        $relatoriolist= array();
        while($relatorioObj=$relatorio->fetchObject(__CLASS__) ){
         $relatoriolist[]=$relatorioObj;
       }
       return $relatoriolist;

     }
     public function qtdpergunta($cod_questionario){
      $pdo=conexao::getInstance();
      $qtdpergunta = $pdo->prepare("SELECT COUNT(p.pergunta) as quantidadepergunta from pergunta p
        INNER JOIN pergunta_questionario as pq ON p.cod_pergunta=pq.cod_pergunta
        WHERE
        pq.cod_questionario = :cod_questionario");
      $qtdpergunta->bindvalue(":cod_questionario",$cod_questionario);
      $qtdpergunta->execute();
      $resultado = $qtdpergunta->fetch(PDO::FETCH_ASSOC);
      return $resultado;
    }

    public function listarResposta($id){
      $pdo=conexao::getInstance();
      $selecionarUnicaResposta = $pdo->prepare("SELECT GROUP_CONCAT(ar.alternativa_resposta separator ';')tipoalt,
        sum(case when ar.alternativa_resposta = 'CT' then 1 else 0 end) AS CTCount,
        sum(case when ar.alternativa_resposta = 'CP' then 1 else 0 end) AS CPCount,
        sum(case when ar.alternativa_resposta = 'DT' then 1 else 0 end) AS DTCount,
        sum(case when ar.alternativa_resposta = 'DP' then 1 else 0 end) AS DPCount

        from resposta r
        INNER JOIN pergunta p ON p.cod_pergunta=r.cod_pergunta
        right JOIN alternativa_resposta ar ON ar.cod_alternativa_resposta=r.cod_alternativa_resposta where r.cod_pergunta=:cod_pergunta
        GROUP BY p.cod_pergunta ");
      $selecionarUnicaResposta->bindvalue(":cod_pergunta",$id);
      $selecionarUnicaResposta->execute();
        //fetchall() seria se fosse mais de um Questionario
        $resultado = $selecionarUnicaResposta -> fetch(PDO::FETCH_ASSOC);//apenas nome das colunas
        return $resultado;

      }
      public function listarAvaliacao($tipo_questionario){
        $pdo=conexao::getInstance();
        $relatorio = $pdo->prepare("SELECT GROUP_CONCAT(p.pergunta order by p.cod_pergunta ASC separator ';') pergunta, GROUP_CONCAT(p.cod_pergunta order by p.cod_pergunta ASC separator ';') codpergunta, q.nome nomequestionario, d.titulo titulo from pergunta p 

          INNER JOIN dimensao d ON d.cod_dimensao=p.cod_dimensao
          INNER JOIN pergunta_questionario as pq ON p.cod_pergunta=pq.cod_pergunta

          INNER JOIN (SELECT * FROM questionario WHERE status_questionario= 1 and cod_tipo_questionario = :tipo_questionario) q on q.cod_questionario=pq.cod_questionario

          GROUP BY p.cod_dimensao

          ");
        $relatorio->bindvalue(":tipo_questionario",$tipo_questionario);
        $relatorio->execute();
        $relatoriolist= array();
        while($relatorioObj=$relatorio->fetchObject(__CLASS__) ){
         $relatoriolist[]=$relatorioObj;
       }
       return $relatoriolist;
     }
     public function verificarFezAvaliacao($tipo_questionario,$id){
      $pdo=conexao::getInstance();
      $relatorio = $pdo->prepare("SELECT r.cod_alternativa_resposta, GROUP_CONCAT(p.pergunta order by p.cod_pergunta ASC separator ';') pergunta, q.nome nomequestionario, d.titulo titulo from pergunta p 

        INNER JOIN dimensao d ON d.cod_dimensao=p.cod_dimensao
        INNER JOIN pergunta_questionario as pq ON p.cod_pergunta=pq.cod_pergunta
        INNER JOIN (SELECT * FROM resposta  WHERE cod_usuario=:cod_usuario) r ON r.cod_pergunta=p.cod_pergunta

        INNER JOIN (SELECT * FROM questionario WHERE status_questionario= 1 and cod_tipo_questionario = :tipo_questionario) q on q.cod_questionario=pq.cod_questionario

        GROUP BY p.cod_dimensao

        ");
      $relatorio->bindvalue(":cod_usuario",$id);
      $relatorio->bindvalue(":tipo_questionario",$tipo_questionario);
      $relatorio->execute();
      $relatoriolist= array();
      while($relatorioObj=$relatorio->fetchObject(__CLASS__) ){
       $relatoriolist[]=$relatorioObj;
     }
     return $relatoriolist;
   }
   public function cadastrarRespostas($cod_pergunta,$resposta){
    $pdo = conexao::getInstance();
    $cadastrar = $pdo->prepare("INSERT into resposta (cod_usuario,cod_pergunta,cod_alternativa_resposta,data)values(:cod_usuario,:cod_pergunta,:cod_alternativa_resposta,NOW())");
    $cadastrar->bindvalue(':cod_usuario',$_SESSION['cod_usuario']);
    $cadastrar->bindvalue(':cod_pergunta',$cod_pergunta);
    $cadastrar->bindvalue(':cod_alternativa_resposta',$resposta);
    $resultado = $cadastrar->execute();
    return $resultado;

   }
 }
