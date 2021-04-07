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
    
    }

    public function __destruct(){
        echo "\n\n----- FIM DO PROGRAMA -----\n\n";
    }
}

new Main;