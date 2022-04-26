<?php
class Conexao { //Classe - Reperesentação do objeto, private = ninguém fora da classe vai ver;
    //Atributos
    private $servidor;
    private $banco;
    private $usuario;
    private $senha;

    //Metodos
    function __construct(){ //Toda vez que instanciar a classe executa essa função
        //Definir os valores dos atributos
        $this->servidor = "localhost"; //$this-> pra acessar o atributo (classe.atributo)
        $this->banco = "sistema_escolar2c2";
        $this->usuario = "root";
        $this->senha = "";
    }

    //Metodo para conectar com MYSQL via PDO
    public function conectar(){
        //Validar a execução do código
        try{ //Tenta executar o primeiro bloco, caso não consigo solta exceção com erro
            //Criar a conexão com o PDO
            $con = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco.";charset=utf8",$this->usuario,$this->senha);
            return $con;
            
        }catch(PDOException $msg){
            echo "Erro ao conectar com o banco de dados: ".$msg->getMessage();
        }
    }
}
?>