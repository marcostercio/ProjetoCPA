<?php
class classeUsuario{
	private $cod_usuario;
    private $nome;
	private $sobrenome;
	private $matricula;
	private $status;
	private $senha;
	private $email;
	private $status_prova;
	private $cod_perfil;
public function getCod_usuario() {
    return $this->cod_usuario;
}
//só para fins de update pois é auto increment
public function setCod_usuario($cod_usuario) {
    $this->cod_usuario = $cod_usuario;
}
public function getNome() {
    return $this->nome;
}
 
public function setNome($nome) {
    $this->nome = $nome;
}
public function getSobrenome() {
    return $this->sobrenome;
}
 
public function setSobrenome($sobrenome) {
    $this->sobrenome = $sobrenome;
}
public function getMatricula() {
    return $this->matricula;
}
 
public function setMatricula($matricula) {
    $this->matricula = $matricula;
}
public function getStatus() {
    return $this->status;
}
 
public function setStatus($status) {
    $this->status = $status;
}
public function getSenha() {
    return $this->senha;
}
 
public function setSenha($senha) {
    $this->senha = $senha;
}
public function getEmail() {
    return $this->email;
}
 
public function setEmail($email) {
    $this->email = $email;
}
public function getStatus_prova() {
    return $this->status_prova;
}
 
public function setStatus_prova($status_prova) {
    $this->status_prova = $status_prova;
}
public function getCod_perfil() {
    return $this->cod_perfil;
}
 
public function setCod_perfil($cod_perfil) {
    $this->cod_perfil = $cod_perfil;
}

}