<?php

// require_once "banco.php";

class Nome {
    public $nome = 'Bruno';
    protected $sobreNome = 'Pontes';
    private $idade = 30;

    public function imprimeDados(){
        echo $this->nome;
        echo $this->sobreNome;
        echo $this->idade;
    }
}

$obj = new Nome();
$obj->imprimeDados();