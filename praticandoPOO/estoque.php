<?php
/*Tabelas: itens, estoques, movimentacoes, usuarios, fabricantes*/

require ('./classes/usuario.class.php');
require ('./classes/fabricante.class.php');
require ('./classes/estoque.class.php');
require ('./classes/movimentacao.class.php');

class Main {
    
    private $objUsuario;
    private $objFabricante;
    private $objEstoque;
    private $objMovimentacao;

    public function __construct(){

        echo "\n\n----- INICIO DO PROGRAMA -----\n\n";

        $this->objUsuario = new Usuario;
        $this->objFabricante = new Fabricante;
        $this->objEstoque = new Estoque;
        $this->objMovimentacao = new Movimentacao;
        $this->verificaSeExisteArg(1);

        //PEGA O SEGUNDO ARGUMENTO PASSADO PELO USER VIA TERMINAL(1º ARGUMENTO É O PROPRIO ARQUIVO)
        $this->executaOperacao($_SERVER['argv'][1]);
    }

    private function executaOperacao(string $operacao){

        switch($operacao) {
            case 'gravaUsuario':
                $this->gravaUsuario();
                break;
            case 'editaUsuario':
                $this->editarUsuario();
                break;
            case 'listaUsuario':
                $this->listaUsuario();
                break;
            case 'apagarUsuario':
                $this->apagaUsuario();
                break;
            default:
                echo "\nErro: Não existe a funcionalidade {$_SERVER['argv'][1]}\n";
        
        }
    }
    

    private function gravaUsuario(){
        $dados = $this->tratarDados();
        $this->$objUsuario->setDados($dados);
        if($this->$objUsuario->gravarDados()){
            echo "\nUsuario gravado com sucesso\n";
        }

    }

    private function apagaUsuario(){
        $dados = $this->tratarDados();
        $this->objUsuario->setdados($dados);
        if($this->objUsuario->delete()){
            echo "\nUsuario apagado com sucesso!\n";
        }else{
            echo "\nErro ao tentar apagar o usuário, você enviou o id?\n";
        }
    }

    private function listaUsuario(){
       $lista = $this->objUsuario->getAll();
       foreach ($lista as $usuario) {
           echo "{$usuario['id_usuario']}\t{$usuario['cpf']}\t{$usuario['nome']}\n";
       }
    }

    private function editarUsuario(){
        $dados = $this->tratarDados();
        $this->$objUsuario->setDados($dados);
        if($this->objUsuario->gravarDados()){
            echo "\nUsuario gravado com sucesso\n";
        }
    }

    
    private function verificaSeExisteArg($numArg){
        if(!isset($_SERVER['argv'][$numArg])){
            if($numArg == 1) {
                $msg = "para utilizar o programa digite: php estoque.php [operação]";
            }else {
                $msg = "para utilizar o programa digite: php estoque.php [operação] [dado=valor,dados2=valor2]";
            }
             
            echo "\n\nErro: $msg\n\n";
            exit();
        }
    }


    private function tratarDados(){
        $this->verificaSeExisteArgUm(2);
        $args = explode(',', $_SERVER['argv'][2]); // DADOS PASSADOS PELO USER NA LINHA DE COMANDO
                
        foreach($args as $valor){
            $arg = explode('=', $valor);
            $dados[$arg[0]] = $arg[1];
        }

        return $dados;
    }

    public function __destruct(){
        sleep(1);
        echo "\n\n----- FIM DO PROGRAMA -----\n\n";
    }
}

new Main;