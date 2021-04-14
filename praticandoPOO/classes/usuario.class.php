<?php

require (__DIR__ . '/../interfaces/usuario.interface.php');
require_once (__DIR__ . './abstratas/tipoPessoa.class.php');

class Usuario extends TipoPessoa implements iUsuario {
    protected $cpf;
    protected $nome;
    protected $id;

    public function __contruct(){
        parent::__contruct();
    }

    public function setDados(array $dados): bool {

        $this->id = $dados['id'] ?? null;
        $this->cpf = $dados['cpf'] ?? null;
        $this->nome = $dados['nome'] ?? null;
        return true;

    }

    public function gravarDados(){
        
        if(empty($this->id)){
            return $this->insert();
        }else {
            return $this->update();
        } 

    }

    
    public function update(){

        $stmt = $this->prepare('UPDATE usuarios set cpf = :cpf, nome = :nome WHERE id_usuario = :id_usuario');
        if($stmt->execute([':cpf' => $this->cpf, ':nome' => $this->nome, ':id_usuario' => $this->id])){
            return true;
        }else {
            return false;
        }

    }

    public function insert(){

        $stmt = $this->prepare('INSERT INTO usuarios (cpf, nome) VALUES (:cpf, :nome)');
        if($stmt->execute([':cpf' => $this->cpf, ':nome' => $this->nome])){
            return true;
        }else {
            return false;
        }
    }


    public function getDados(int $id_usuario): array {

    }
}