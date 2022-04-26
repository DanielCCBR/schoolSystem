<?php
require_once "Conexao.php";

class Funcionarios {
    public $numero;
    public $nome;
    public $sexo;
    public $email;
    public $endereco;
    public $setor;
    public $telefone;
    public $senha;

    public function listarTodos() {
        try {
            $bd = new Conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from funcionarios");
            $sql->execute();

            if($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        }catch(PDOException $msg) {
            echo "Não foi possível listar os funcionários: ".$msg->getMessage();
        }
    }

    public function inserir() {
        try {
            if(isset($_POST['nome']) && isset($_POST['sexo'])){
                $this->nome = $_POST['nome'];
                $this->sexo = $_POST['sexo'];
                $this->email = $_POST['email'];
                $this->endereco = $_POST['endereco'];
                $this->setor = $_POST['setor'];
                $this->telefone = $_POST['telefone'];
                $this->senha = $_POST['senha'];

                $bd = new conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into funcionarios(numero,nome,sexo,email,endereco,setor,telefone,senha) values(null,?,?,?,?,?,?,?)");
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->setor,
                    $this->telefone,
                    $this->senha,
                ));

                var_dump($sql->errorInfo());
                if($sql->rowCount() > 0) {
                    header("location: index_funcionarios.php");
                }
            }else { 
                header("location: index_funcionarios.php");
            }

        }catch(PDOException $msg) {
            echo "Não foi possível inserir o funcionario: ".$msg->getMessage();
        }   
    }

    public function excluir($numero) {
        try {
            if(isset($numero)) {
                $this->numero = $numero;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("delete from funcionarios where numero = ?");
                $sql->execute(array($this->numero));
                if($sql->rowCount() > 0) {
                    header("location:index_funcionarios.php");
                }
            }else{
                header("location:index_funcionarios.php");
            }

        }catch(PDOException $msg) {
            echo "Não foi possível excluir os funcionarios: ".$msg->getMessage();
        }
    }

    public function alterar() {
        try{
            if(isset($_POST['Salvar'])) {
                $this->numero = $_GET['numero'];
                $this->nome = $_POST['nome'];
                $this->sexo = $_POST['sexo'];
                $this->email = $_POST['email'];
                $this->endereco = $_POST['endereco'];
                $this->setor= $_POST['setor'];
                $this->telefone = $_POST['telefone'];
                $this->senha = $_POST['senha'];

                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("update funcionarios set nome = ?,sexo = ?,email = ?,endereco = ?,setor = ?,telefone = ?,senha = ? where numero = ?");
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->setor,
                    $this->telefone,
                    $this->senha,
                    $this->numero
                ));

                if($sql->rowCount() > 0) {
                    header("location:index_funcionarios.php");
                }
            }else { 
                header("location:index_funcionarios.php");
            }

        }catch(PDOException $msg) {
            echo "Não foi possível alterar o funcionarios: ".$msg->getMessage();
        }
    }

    public function listarID($numero) {
        try {
            if(isset($numero)) {
                $this->numero = $numero;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from funcionarios where numero = ?");
                $sql->execute(array($this->numero));
                if($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        }catch(PDOException $msg) {
            echo "Não foi possível listar o funcionarios: ".$msg->getMessage();
        }
    }
}
?>