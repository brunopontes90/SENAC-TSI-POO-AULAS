<?php
interface iPessoa {

	public function enviarCorrespondencia();
	public function receberCorrespondencia();
}

// NÃO PODE SER INSTANCIADA, SÓ PODE SER HERDADA
// NESSA CLASSE OBRIGATORIAMENTE PRECISA TER AS FUNÇÕES DE IPESSOA
abstract class Pessoa implements iPessoa{

	protected $nome;
	protected $endereco;

	public function enviarCorrespondencia(){

		echo "\n\ncarta --------------> destino\n\n";
	}

	public function receberCorrespondencia(){
	}
}

// HERDA DE PESSOA
class PessoaFisica extends Pessoa {

	private $cpf;
	private $imc;

	public function enviarCorrespondencia(){
		echo "\nVai até a agência dos Correios\n";
		echo "\nFica 45 horas na fila\n";
		echo "\nCarta ------------> destino (com sorte)\n";
	}

	public function praticarExercicio(){
	}

	public function comer(){
	}
}

// HERDA DE PESSOA
class PessoaJurica extends Pessoa {

	private $cnpj;
	private $nomeFantasia;

	public function abrirFilial(){

	}

	public function fecharFilial(){

	}
}

$joao = new PessoaFisica();

$joao->enviarCorrespondencia();
