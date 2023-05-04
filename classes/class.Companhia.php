<?php
  include_once("class.Aeronave.php");
  include_once("class.Voo.php");
  include_once("class.Passagem.php");
  include_once("persist.php");
  
  class Companhia extends persist{
    
    private $_nome;
    private $_codigo;
    private $_razsocial;
    private $_CNPJ;
    private $_sigla;
    private $_aeronaves = array();
    private $_voos = array();
    private $_passagens = array(); 
    static $local_filename = "companhia.txt";

    
    public function __construct(string $nome, string $cod, string $razsocial, int $CNPJ, string $sigla) {
      if(strlen($sigla)>2){
        throw new Exception("Código invalido");
      }elseif(strlen($sigla)<2){
        throw new Exception("Código invalido");
      }
      for($ii=0;$ii<2;$ii++){
        $teste3 = ord($sigla[$ii]);
        if($teste3<65 || $teste3>90){
          throw new Exception("Registro invalido");
        }  
      }
      $this->_nome = $nome;
      $this->_codigo = $cod;
      $this->_razsocial = $razsocial;
      $this->_CNPJ = $CNPJ;
      $this->_sigla = $sigla;
    }

    static public function getFilename() {
      return get_called_class()::$local_filename;
    }

    public function adicionaAeronave(string $fab, string $mod, int $capPsg, float $capCarg, string $reg) {

      $aeronave = new Aeronave($fab, $mod, $capPsg, $capCarg, $reg);
      $this->_aeronaves[] = $aeronave;
    }

    public function removeAeronave(Aeronave $aeronave){

      for($i = 0; $i < sizeof($this->_aeronaves); $i++) {
          
          if($this->_aeronaves[$i] == $aeronave)  {
            unset($this->_aeronaves[$i]);
            print_r("Removeu a Aeronave.");
            echo ("</p>");
          }
      }
    }
    public function getAeronaves(){
      print_r($this->_aeronaves);
      echo("</p>");
    }
    public function getAeronave(int $o){
      return($this->_aeronaves[$o]);
    }
    public function setVoo($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Destino){
      $voo = new Voo($_duracao, $_horarioPartida, $_horarioChegada, $_codigoDeVoo, $_Origem, $_Destino);
      $this->_voos[] = $voo;
    }
    public function getVoo(int $o){
      return($this->_voos[$o]);
    }
    public function getVoos(){
      print_r($this->_voos);
      echo("</p>");
    }
    public function removeVoo(Voo $_voo){
      for($i = 0; $i < sizeof($this->_voos); $i++) {
          if($this->_voos[$i] == $_voo) {
            unset($this->_voos[$i]);
            print_r("Removeu o Voo.");
            echo ("</p>");
          }
      }
    }
    public function __destruct(){}
  }