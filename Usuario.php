<?php
require_once "Conexao.php";

class Usuario{
    //Codigo / Nome / Email / Senha
    //Atributos
    public $codigo;
    public $nome;
    public $email;
    public $senha;

    public function inserir() {
        try {
            //Verificar se recebeu valores do formulário
            if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"])) {
                $this->nome = $_POST["nome"];
                $this->email = $_POST["email"];
                $this->senha = $_POST["senha"];
                //Instanciar classe conexão
                $bd = new Conexao();
                //Criar o objeto contento a conexao
                $con = $bd->conectar();
                //Cria o comando sql para enviar ao banco passando parametros ?
                $sql = $con->prepare("insert into usuario(codigo,nome,email,senha) values(null,?,?,?)");
                //Executar o comando passando os valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->email,
                    $this->senha
                ));
                var_dump($sql->errorInfo());
                //Testar se retornou valores
                if ($sql->rowCount() > 0) {
                    header("location:index.php");
                }
            }else { //Se o usuario não preencheu os valores devolver para o index
                header("location:index.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possível inserir o usuário: ".$msg->getMessage();
        }
    }
    
    public function login() {
        try {
            //Verificar se recebeu valores do formulário
            if (isset($_POST["email"]) && isset($_POST["senha"])) {
                $this->email = $_POST["email"];
                $this->senha = $_POST["senha"];
                //Instanciar classe conexão
                $bd = new Conexao();
                //Criar objeto contento a conexao
                $con = $bd->conectar();
                //Cria o comando sql para enviar ao banco passando paramentros ?
                $sql = $con->prepare("select * from usuario where email = ? and senha = ?");
                //Executar o comando passando os valores recebidos do formulário
                $sql->execute(array(
                    $this->email,
                    $this->senha
                ));
                //var_dump($sql->errorInfo());
                //Testar se retornou valores
                if ($sql->rowCount() > 0) { //Login correto
                    header("location:index_adm.php");
                }
            }else { //email ou senha errado voltar para index
                header("location:index.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possível logar com o usuário: ".$msg->getMessage();
        }
    }
}
?>