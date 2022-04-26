<?php
require_once "Conexao.php";

class Disciplinas {
    public $numero;
    public $nome;
    public $turma;
    public $curso;

    public function listarTodos(){
        try {
            $bd = new Conexao();
            $con = $bd->Conectar();
            $sql = $con->prepare("select * from disciplinas");
            $sql->execute();

            if($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        }catch(PDOException $msg) {
            echo "Não foi possível listar as disciplinas: ".$msg->getMessage;
        }
    }

    public function inserir() {
        try {
            if(isset($_POST['nome']) && isset($_POST['conteudo'])){
                $this->nome = $_POST['nome'];
                $this->conteudo = $_POST['conteudo'];
                $this->turma = $_POST['turma'];
                $this->curso = $_POST['curso'];

                $bd = new conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into disciplinas(numero,nome,conteudo,turma,curso) values(null,?,?,?,?)");
                $sql->execute(array(
                    $this->nome,
                    $this->conteudo,
                    $this->turma,
                    $this->curso,
                ));

                var_dump($sql->errorInfo());
                if($sql->rowCount() > 0) {
                    header("location: index_disciplinas.php");
                }
            }else { 
                header("location: index_disciplinas.php");
            }

        }catch(PDOException $msg) {
            echo "Não foi possível inserir a disciplina: ".$msg->getMessage();
        }   
    }

    public function excluir($numero) {
        try {
            if(isset($numero)) {
                $this->numero = $numero;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("delete from disciplinas where numero = ?");
                $sql->execute(array($this->numero));
                if($sql->rowCount() > 0) {
                    header("location:index_disciplinas.php");
                }
            }else{
                header("location:index_disciplinas.php");
            }

        }catch(PDOException $msg) {
            echo "Não foi possível excluir as disciplinas: ".$msg->getMessage();
        }
    }

    public function alterar() {
        try{
            if(isset($_POST['Salvar'])) {
                $this->numero = $_GET['numero'];
                $this->nome = $_POST['nome'];
                $this->conteudo = $_POST['conteudo'];
                $this->turma = $_POST['turma'];
                $this->curso = $_POST['curso'];

                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("update disciplinas set nome = ?,conteudo = ?,turma = ?,curso = ? where numero = ?");
                $sql->execute(array(
                    $this->nome,
                    $this->conteudo,
                    $this->turma,
                    $this->curso,
                    $this->numero
                ));

                if($sql->rowCount() > 0) {
                    header("location:index_disciplinas.php");
                }
            }else { 
                header("location:index_disciplinas.php");
            }

        }catch(PDOException $msg) {
            echo "Não foi possível alterar as disciplinas: ".$msg->getMessage();
        }
    }

    public function listarID($numero) {
        try {
            if(isset($numero)) {
                $this->numero = $numero;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from disciplinas where numero = ?");
                $sql->execute(array($this->numero));
                if($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        }catch(PDOException $msg) {
            echo "Não foi possível listar as disciplinas: ".$msg->getMessage();
        }
    }
}
?>