<?php

class LancamentosContabeis {

	public $Name, $Group_SubGroup, $DebitCred, $Value;
	public $GrupoDaConta =[
	"ATIVO_ATC","ATIVO_ANC" ,"PASSIVO_PC", "PASSIVO_PNC",
	"RESULTADO"];
	public $AtivoCirculante =["CAIXA", "DUPLICATAS A RECEBER", "OUTROS", "ESTOQUE"];
	public $Ativo_N_Circulante = ["DUPLICATAS A RECEBER", "INVESTIMENTO"];
	public $PassivoCirculante = ["FORNECEDORES", "SALÁRIOS A PAGAR", "FINANCIAMENTOS"];
	public $Passivo_N_Circulante =["EMPRESTIMO"];
	public $TipoDoLancamento = ["D", "C"]; 
	public $Valor;
	public $GetArr =[];

	
	//verifica ao qual grupo_subgrupo pertence
	public function ViweValue (){
		switch ($this->Group_SubGroup){
			case 'ATIVO_ATC':
				$this->GetArr = $this->AtivoCirculante;
				break;
			case 'ATIVO_ANC':
				$this->GetArr = $this->Ativo_N_Circulante;
				break;
			case 'PASSIVO_PC':
				$this->GetArr = $this->PassivoCirculante;
				break;
			case 'PASSIVO_PNC':
				$this->GetArr = $this->Passivo_N_Circulante;
				break;
			case 'RESULTADP':
				$this->GetArr = $this->AtivoCirculante;
				break;																
		}
	}

	//verifica se o nome é válido
	public function GetName (){
		$this->ViweValue();

		foreach($this->GetArr as $b){
			if($b == $this->Name){
				return true;
			}
				return false;
		}

	}

	//verifica se é debito ou credito
	public function GetTypeThrow (){
	foreach ($this->TipoDoLancamento as $c){
			if ($c == $this->DebitCred){
				return true;
			}
				return false;
		}		
	}

	//verifica se valor é válido
	public function GetValue (){
	if ($this->Value > 0 && $this->Value != ''){
				return true;
		}else{
				return false;
		}		
	}
	public function GetGroup (){
	foreach ($this->GrupoDaConta as $a){
			if ($a == $this->Group_SubGroup){
				return true;
			}
				return false;
		}		
	}

	//método de realizar efetivamente o lançamento
	public function Throw_account (){
		if ($this->GetName() && $this->GetGroup() && $this->GetValue() && $this->GetTypeThrow()){
			return true;
		}
		return false;

	}

	//método alternativo, possui somente a função de mostrar os dados
	public function view_data (){
		if ($this->Throw_account ()){ 
		echo "O nome da conta é: ".$this->Name."<br>";
		echo "Pertence ao grupo: ".$this->Group_SubGroup."<br>";
		echo "O tipo de lançamento: ".$this->DebitCred."<br>";
		echo "Valor do lançamento: R$ ".$this->Value."<br>";
		}
		else
		{
			echo "Falha no lançamento.";
		}
	}
}//fim de classe


//EXEMPLO
$conta = new LancamentosContabeis;

$conta->Group_SubGroup = "ATIVO_ATC";
$conta->Name="CAIXA";
$conta->DebitCred="D";
$conta->Value = 300;
$conta->Throw_account();
$conta->view_data();


?>