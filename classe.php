<?php


class Club {


	private $nome, $presidente, $titulos, $sede, $estadio, $numJogadores=0, $tecnico, $serie, $regularizar, 
	$jogando=false;


	#métodos get
	public function getNome (){
		return $this->nome;
	}
	
	public function getPresidente (){
		return $this->presidente;
	}
	public function getTitulos (){
		return $this->titulos;
	}
	public function getSede (){
		return $this->sede;
	}
	public function getEstadio (){
		return $this->estadio;
	}
	public function getNumJogadores (){
		return $this->numJogadores;
	}
	public function getTecnico (){
		return $this->tecnico;
	}
	public function getSerie (){
		return $this->serie;
	}
	public function getJogando (){
		return $this->jogando;
	}
	public function getRegularizar (){
	//se o club não atender a esses requisitos, não poderá jogar 	
		if  ($this->nome == '' || $this->presidente == '' || 
			$this->sede == '' || $this->numJogadores ==0 || 
			$this->tecnico == '' || $this->serie == '' ){
			return false;
		}
		
		return true;
	}
	//método set

	public function setNome ($nome){
		$this->nome = $nome;
	}
	public function setPresidente ($presidente){
		$this->presidente = $presidente;
	}
	public function setTitulos ($titulos){
		$this->titulos = $titulos;
	}
	public function setSede ($sede){
		$this->sede = $sede;
	}
	public function setEstadio ($estadio){
		$this->estadio = $estadio;
	}
	public function setNumJogadores ($numJogadores){
		$this->numJogadores = $numJogadores;
	}
	public function setTecnico ($tecnico){
		$this->tecnico = $tecnico;
	}
	public function setSerie ($serie){

		if ($serie == 'A' || $serie == 'B' || $serie == 'C'){
			$this->serie = $serie;
			
		}else{
			echo '<br> A serie informada é inválida. Por favor verifcar se a letra é minuscula ou não corresponde a uma série válida.<br>';
		}
	}
	public function setJogando ($stade){
		return $this->jogando = $stade;
	}
	//métodos que eu listarei: disputar partida/jogar; 


	public function jogar (){

		if ($this->getRegularizar()){
			echo "<br> O time está jogando neste momento...<br>";
			$this->setJogando = true;
		}else{
			echo "<br> O time ainda não pode disputar nenhuma partida.<br>";
		}


	}









}






?>
