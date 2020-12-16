<?php

 class classeQuestionario{
	//private $data_cadastramento;
	private $cod_questionario;
	private $cod_tipo_questionario;
	private $data_disponibilidade;
	private $data_encerramento;
	private $detalhe;
	private $cod_usuario; 
	private $nome; 


		public function getCod_questionario() {
		    return $this->cod_questionario;
		}
		 
		public function setCod_questionario($cod_questionario) {
		    $this->cod_questionario = $cod_questionario;
		}
		public function getCod_tipo_questionario() {
		    return $this->cod_tipo_questionario;
		}
		 
		public function setCod_tipo_questionario($cod_tipo_questionario) {
		    $this->cod_tipo_questionario = $cod_tipo_questionario;
		}
		public function getData_disponibilidade() {
		    return $this->data_disponibilidade;
		}
		 
		public function setData_disponibilidade($data_disponibilidade) {
		    $this->data_disponibilidade = $data_disponibilidade;
		}
		public function getData_encerramento() {
		    return $this->data_encerramento;
		}
		 
		public function setData_encerramento($data_encerramento) {
		    $this->data_encerramento = $data_encerramento;
		}
		public function getDetalhe() {
		    return $this->detalhe;
		}
		 
		public function setDetalhe($detalhe) {
		    $this->detalhe = $detalhe;
		}
		public function getCod_usuario() {
		    return $this->cod_usuario;
		}
		 
		public function setCod_usuario($cod_usuario) {
		    $this->cod_usuario = $cod_usuario;
		}
		public function getNome() {
		    return $this->nome;
		}
		 
		public function setNome($nome) {
		    $this->nome = $nome;
		}



}