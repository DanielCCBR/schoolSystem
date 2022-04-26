<?php
require_once "Conexao.php";

class Cursos {
    public $codigo;
    public $nome;
    public $serie;

    public function listarTodos(){
        try {
            $bd = new Conexao();
            $con = $bd->Conectar();
            $sql = $con->prepare("select * from cursos");
            $sql->execute();

            if($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        }catch(PDOException $msg) {
            echo "Não foi possível listar os cursos: ".$msg->getMessage;
        }
    }

    public function inserir() {
        try {
            if(isset($_POST['nome']) && isset($_POST['serie'])){
                $this->nome = $_POST['nome'];
                $this->serie = $_POST['serie'];

                $bd = new conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into cursos(codigo,nome,serie) values(null,?,?)");
                $sql->execute(array(
                    $this->nome,
                    $this->serie,
                ));

                var_dump($sql->errorInfo());
                if($sql->rowCount() > 0) {
                    header("location: index_cursos.php");
                }
            }else { 
                header("location: index_cursos.php");
            }

        }catch(PDOException $msg) {
            echo "Não foi possível inserir o curso: ".$msg->getMessage();
        }   
    }

    public function excluir($codigo) {
        try {
            if(isset($codigo)) {
                $this->codigo = $codigo;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("delete from cursos where codigo = ?");
                $sql->execute(array($this->codigo));
                if($sql->rowCount() > 0) {
                    header("location:index_cursos.php");
                }
            }else{
                header("location:index_cursos.php");
            }

        }catch(PDOException $msg) {
            echo "Não foi possível excluir os cursos: ".$msg->getMessage();
        }
    }

    public function alterar() {
        try{
            if(isset($_POST['Salvar'])) {
                $this->codigo = $_GET['codigo'];
                $this->nome = $_POST['nome'];
                $this->serie = $_POST['serie'];

                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("update cursos set nome = ?,serie = ? where codigo = ?");
                $sql->execute(array(
                    $this->nome,
                    $this->serie,
                    $this->codigo
                ));

                if($sql->rowCount() > 0) {
                    header("location:index_cursos.php");
                }
            }else { 
                header("location:index_cursos.php");
            }

        }catch(PDOException $msg) {
            echo "Não foi possível alterar os cursos: ".$msg->getMessage();
        }
    }

    public function listarID($codigo) {
        try {
            if(isset($codigo)) {
                $this->codigo = $codigo;
                $bd = new Conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from cursos where codigo = ?");
                $sql->execute(array($this->codigo));
                if($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        }catch(PDOException $msg) {
            echo "Não foi possível listar os cursos: ".$msg->getMessage();
        }
    }
}
?>