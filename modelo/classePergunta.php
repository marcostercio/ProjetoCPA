<?php
 class ClassePergunta{
	private $cod_dimensao;
	private $cod_pergunta;
	private $pergunta;

	public function getCod_dimensao() {
	    return $this->cod_dimensao;
	}
	 
	public function setCod_dimensao($cod_dimensao) {
	    $this->cod_dimensao = $cod_dimensao;
	}
	public function getCod_pergunta() {
	    return $this->cod_pergunta;
	}
	 
	public function setCod_pergunta($cod_pergunta) {
	    $this->cod_pergunta = $cod_pergunta;
	}
	public function getPergunta() {
	    return $this->pergunta;
	}
	 
	public function setPergunta($pergunta) {
	    $this->pergunta = $pergunta;
	}
}