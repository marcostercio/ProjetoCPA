<?php
require_once 'conexao.php';
class ClassePerguntaDAO{

	   //selecionar tipos de Questionários
    public function pesquisarDimensao(){
        $pdo = conexao :: getInstance();
        $pesquisarDimensao = $pdo->prepare("select * from dimensao");
        $pesquisarDimensao ->execute();
        $resultado = $pesquisarDimensao ->fetchall(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function cadastrarPergunta(classePergunta $novaPergunta,$cod_questionario){
        $pdo = conexao::getInstance();
        $cadastrarPergunta = $pdo->prepare("INSERT into Pergunta (cod_dimensao, pergunta) values (:cod_dimensao,:pergunta)");

        $cadastrarPergunta->bindvalue(":cod_dimensao",$novaPergunta->getCod_dimensao());
        $cadastrarPergunta->bindvalue(":pergunta",$novaPergunta->getPergunta());

        $cadastrarPergunta->execute();

       // 
        $cod_pergunta=$pdo->lastInsertId();
        //insere na tabela pergunta_questionario
        $cadastrarPerguntaQuestionario = $pdo->prepare("INSERT into pergunta_questionario (cod_questionario, cod_pergunta)values(:cod_questionario, :cod_pergunta)");

        $cadastrarPerguntaQuestionario->bindvalue(":cod_questionario",$cod_questionario);
        $cadastrarPerguntaQuestionario->bindvalue(":cod_pergunta",$cod_pergunta);
        return $cadastrarPerguntaQuestionario->execute();




    }
    public function editarPergunta(classePergunta $novaPergunta, $cod_pergunta){
        $pdo = conexao::getInstance();
        $editarPergunta = $pdo->prepare("UPDATE pergunta SET  cod_dimensao=:cod_dimensao, pergunta=:pergunta where cod_pergunta=:cod_pergunta");

        $editarPergunta->bindvalue(":cod_dimensao",$novaPergunta->getCod_dimensao());
        $editarPergunta->bindvalue(":pergunta",$novaPergunta->getPergunta());
        $editarPergunta->bindvalue(":cod_pergunta",$cod_pergunta);

       $editar = $editarPergunta->execute();


        return $editar;

    }
	//listar quais perguntas pertence a tal questionario pela tabela pergunta_resposta inner join
    public function listarPergunta($cod_pergunta){
       try{
           $pdo = conexao::getInstance();
           $listarpergunta=$pdo->prepare("SELECT q.nome as nomedoquestionario, q.detalhe descricao,d.titulo dimensao, GROUP_CONCAT(p.pergunta order by p.cod_pergunta ASC separator ';') as nomedapergunta,GROUP_CONCAT(p.cod_pergunta order by p.cod_pergunta ASC) as codigopergunta, pq.cod_questionario,pq.cod_pergunta from questionario as q, dimensao as d, pergunta p,pergunta_questionario  as pq where pq.cod_questionario=q.cod_questionario AND pq.cod_pergunta=p.cod_pergunta AND pq.cod_questionario=:cod_questionario AND p.cod_dimensao=d.cod_dimensao group by p.cod_dimensao 

            ");
           $listarpergunta->bindvalue(":cod_questionario",$cod_pergunta);
           $listarpergunta->execute();
           $perguntalist= array();
           while($perguntaObj=$listarpergunta->fetchObject(__CLASS__) ){
               $perguntalist[]=$perguntaObj;
           }
           return $perguntalist;
       }   
       catch(PDOException $erro){
           echo $erro->getTraceAsString();
       }

   }
    //selecionarUnicaUsuario
    public function selecionarUnicaPergunta($id){
        $pdo = conexao::getInstance();
        $selecionarUnicaPergunta = $pdo->prepare("select pergunta,cod_dimensao from pergunta where cod_pergunta=:id");
        $selecionarUnicaPergunta->bindvalue(":id",$id);
        $selecionarUnicaPergunta->execute();
        //fetchall() seria se fosse mais de um usuario
        $resultado = $selecionarUnicaPergunta -> fetch(PDO::FETCH_ASSOC);//apenas nome das colunas
        return $resultado;
    }

       //deletar Pergunta
   public function deletarPergunta($id){
    $pdo = conexao::getInstance();
    $deletarpergunta = $pdo->query("DELETE from pergunta where cod_pergunta='$id'");
    return $deletarpergunta->execute();
}
}