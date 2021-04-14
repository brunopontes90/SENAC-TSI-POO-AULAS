<?php
/*Tabelas: itens, estoques, movimentacoes, usuarios, fabricantes*/

require ('./classes/usuario.class.php');
require ('./classes/fabricante.class.php');
require ('./classes/estoque.class.php');
require ('./classes/movimentacao.class.php');

class Main {
    
    public function __construct(){

        echo "\n\n----- INICIO DO PROGRAMA -----\n\n";

        $objUsuario = new Usuario;
        $objFabricante = new Fabricante;
        $objEstoque = new Estoque;
        $objMovimentacao = new Movimentacao;

        //PEGA O SEGUNDO ARGUMENTO PASSADO PELO USER VIA TERMINAL(1º ARGUMENTO É O PROPRIO ARQUIVO)
        
        switch($_SERVER['argv'][1]) {

            case 'gravaUsuario':

                $this->gravaUsuario($objUsuario);

                break;

            case 'editaUsuario':

                $this->editarUsuario($objUsuario);

                break;
            default:
                echo "\nNão existe a funcionalidade {$_SERVER['argv'][1]}\n";
        
        }
    }

    

    public function gravaUsuario($objUsuario){
        $dados = $this->tratarDados($objUsuario);
        $objUsuario->setDados($dados);
        if($objUsuario->gravarDados()){
            echo "\nUsuario gravado com sucesso\n";
        }

    }

    public function editarUsuario($objUsuario){

        $dados = $this->tratarDados($objUsuario);
        $objUsuario->setDados($dados);
        if($objUsuario->gravarDados()){
            echo "\nUsuario gravado com sucesso\n";
        }

    }

    public function tratarDados(){
        $args = explode(',', $_SERVER['argv'][2]); // DADOS PASSADOS PELO USER NA LINHA DE COMANDO
                
        foreach($args as $indice => $valor){
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