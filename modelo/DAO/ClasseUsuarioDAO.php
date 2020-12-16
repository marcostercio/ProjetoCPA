<?php
//adiciona a conexao
require_once 'conexao.php';

//classe
class ClasseUsuarioDAO {

	 public function listarUsuario(){
     try{
         $pdo = conexao::getInstance();
         $listarusuario=$pdo->prepare("SELECT * FROM usuario order by cod_usuario desc");
         $listarusuario->execute();
         $usuariolist= array();
         while($usuarioObj=$listarusuario->fetchObject(__CLASS__) ){
             $usuariolist[]=$usuarioObj;
         }
         return $usuariolist;
     }   
     catch(PDOException $erro){
         echo $erro->getTraceAsString();
     }
    }
    public function cadastrarUsuario(classeUsuario $novousuario){
        $pdo = conexao::getInstance();
        $cadastrarUsuario = $pdo->prepare("INSERT into usuario (cod_perfil,nome,sobrenome,matricula,senha,email,status)values(:cod_perfil,:nome, :sobrenome,:matricula,md5(:senha),:email,:status)");
        $cadastrarUsuario->bindvalue(":cod_perfil",$novousuario->getCod_perfil());
        $cadastrarUsuario->bindvalue(":nome",$novousuario->getNome());
        $cadastrarUsuario->bindvalue(":sobrenome",$novousuario->getSobrenome());
        $cadastrarUsuario->bindvalue(":matricula",$novousuario->getMatricula());
        $cadastrarUsuario->bindvalue(":senha",$novousuario->getSenha());
        $cadastrarUsuario->bindvalue(":email",$novousuario->getEmail());
        $cadastrarUsuario->bindvalue(":status",$novousuario->getStatus());
      //  $cadastrarUsuario->bindvalue(":status_prova",$novousuario->getStatus_prova());
        return $cadastrarUsuario->execute();



    }

    //Atualizar Usuários
    public function atualizarUsuario(classeUsuario $usuarioatualizar,$id){
      $pdo = conexao::getInstance();
      $atualizarUsuario = $pdo ->prepare("UPDATE usuario set  cod_perfil=:cod_perfil,nome=:nome,sobrenome=:sobrenome,matricula=:matricula,senha=md5(:senha),email=:email,status=:status where cod_usuario=:cod_usuario");  
        $atualizarUsuario->bindvalue(":cod_perfil",$usuarioatualizar->getCod_perfil());
        $atualizarUsuario->bindvalue(":nome",$usuarioatualizar->getNome());
        $atualizarUsuario->bindvalue(":sobrenome",$usuarioatualizar->getSobrenome());
        $atualizarUsuario->bindvalue(":matricula",$usuarioatualizar->getMatricula());
        $atualizarUsuario->bindvalue(":senha",$usuarioatualizar->getSenha());
        $atualizarUsuario->bindvalue(":email",$usuarioatualizar->getEmail());
        $atualizarUsuario->bindvalue(":status",$usuarioatualizar->getStatus());
       
        $atualizarUsuario->bindvalue(":cod_usuario",$id);
        return $atualizarUsuario->execute();
    }
    //Alterar Senha
    public function alterarSenha(classeUsuario $senhaAtualizar){
      $pdo = conexao::getInstance();
      $atualizarSenha = $pdo ->prepare("UPDATE usuario set senha=md5(:senha) where cod_usuario=:cod_usuario");  
        $atualizarSenha->bindvalue(":senha",$senhaAtualizar->getSenha());     $atualizarSenha->bindvalue(":cod_usuario",$senhaAtualizar->getCod_usuario());
        return $atualizarSenha->execute();
    }
    //deletar Usuário
    public function deletarUsuario($id){
        $pdo = conexao::getInstance();
        $deletarUsuario = $pdo->query("delete from usuario where cod_usuario='$id'");
        return $deletarUsuario->execute();
    }
    //selecionarUnicoUsuario
    public function selecionarUnicoUsuario($id){
        $pdo = conexao::getInstance();
        $selecionarUnicoUsuario = $pdo->prepare("select * from usuario where cod_usuario=:id");
        $selecionarUnicoUsuario->bindvalue(":id",$id);
        $selecionarUnicoUsuario->execute();
        //fetchall() seria se fosse mais de um usuario
        $resultado = $selecionarUnicoUsuario -> fetch(PDO::FETCH_ASSOC);//apenas nome das colunas
        return $resultado;
    }

       //logar
    public function logar($login,$senha){
        $pdo = conexao::getInstance();
        $logar = $pdo->prepare("select cod_usuario, cod_perfil, status from usuario where (email=:login OR  matricula=:login)  AND senha=:senha");
        $logar->bindvalue(":login",$login);
        $logar->bindvalue(":senha",$senha);
        $logar->execute();
        //fetchall() seria se fosse mais de um usuario
        $resultado = $logar -> fetch(PDO::FETCH_ASSOC);//apenas nome das colunas
        return $resultado;
    }
      //logar
    public function verificaCadastro($email,$matricula){
        $pdo = conexao::getInstance();
        $logar = $pdo->prepare("select email, matricula from usuario where email=:email or matricula=:matricula");
        $logar->bindvalue(":email",$email);
        $logar->bindvalue(":matricula",$matricula);
        $logar->execute();
        //fetchall() seria se fosse mais de um usuario
        $resultado = $logar -> fetch(PDO::FETCH_ASSOC);//apenas nome das colunas
        return $resultado;
    }
       //verificar se senha já existe
    public function verificarSenha(classeUsuario $senhaverificar,$senhaantiga){
        $pdo = conexao::getInstance();
        $verificar = $pdo->prepare("select senha from usuario where cod_usuario=:cod_usuario  and senha=:senha");
        $verificar->bindvalue(":cod_usuario",$senhaverificar->getCod_usuario());
        $verificar->bindvalue(":senha",$senhaantiga);
        $verificar->execute();
        //fetchall() seria se fosse mais de um usuario
        $resultado = $verificar -> fetch(PDO::FETCH_ASSOC);//apenas nome das colunas
        return $resultado;
    }
    //selecionar perfis do usuário
    public function pesquisarPerfis(){
        $pdo = conexao :: getInstance();
        $pesquisarPerfis = $pdo->prepare("select * from perfil");
        $pesquisarPerfis->execute();
        $resultado = $pesquisarPerfis ->fetchall(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
?>