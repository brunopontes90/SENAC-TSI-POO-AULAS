<?php
require_once 'dataBase.class.php';


abstract class TipoPessoa extends DataBase{
    protected $id;
    protected $nome;

    public function __construct(){
        parent::__construct();
    }
}