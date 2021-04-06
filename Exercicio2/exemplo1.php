<?php
// INFORMA O MINIMO QUE UMA CLASSE TEM QUE TER
interface iCerveja {

	public function setMarca(string $marca);
	public function getMarca();
}

class Cerveja implements iCerveja{

	protected $marca;
	protected $nome;
	public $quantidade = 23;

	public function setMarca( string $marca ): bool
	{
		$this->marca = $marca;
		return true;
	}

	public function getMarca(): string
	{
		return $this->marca;
	}
}// PARA BAIXO ESTA FORA DA CLASSE

class Stout extends Cerveja {

	private $torraMalte;

	public function setTorra( int $nivel): bool
	{
		$this->torraMalte = $nivel;
		return true;
	}
} 

class CervejasEscuras {

	private $objStout;

    // INICIALIZADOR: EXECUTADO AUTOMATICAMENTE QUANDO INSTANCIADO A CLASSE
	public function __construct($objStout){

		echo "\nConstrutor executado!\n";

		$this->objStout = $objStout;
	}

	public function servir(){

	}

    // INICIALIZADOR: QUANDO TERMINA O SCRIPT TUDO É DESTRUIDO, NADA FICA NA MEMORIA
	public function __destruct(){
		echo "\nDestrutor executado!\n";		
	}
}

class Garcon {

	private $nome;

	public function pegarPedido(){

	}
	public function tirarDuvidas(){

	}
	public function servirCervejasEscuras($objCervejasEscuras){

		$objCervejasEscuras->sevir();
	}
}

$guinness = new Stout;

$guinness->setMarca('Guinness');

$degCervejasEscuras = new CervejasEscuras($guinness);

$james = new Garcon;

echo "\n\nA marca é " . $guinness->getMarca() . "\n\n";

// DESTROI O OBJETO PASSADO E MESMO ASSIM CONTINUA EXECUTUANDO O SCRIPT
unset($degCervejasEscuras);

echo "\n\nAinda executando\n\n";
