<?php
  include_once("claa.Pessoa.php");

class Funcionario extends persist{
    static $local_filename = "funcionario.txt";
    static public function getFilename() {
    return get_called_class()::$local_filename;
    }
    
    private $CPF;
    private $nacionalidade;
    private $dataDeNascimento;
    private $email;
    private $CHT;
    private $endereco;