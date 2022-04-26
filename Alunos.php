<?php
//Importar arquivos (include / require)
//Include importa o arquivo e da mensagem de erro, não quebra a execução
//Require importa o arquivo da mensagem de erro e quebra a execução
//once -> importar apenas uma única vez
require_once "Conexao.php";

class Alunos {
    //Atributos
    public $matricula;
    public $nome;
    public $sexo;
    public $email;
    public $endereco;
    public $telefone;
    public $senha;

    //Metodos
    //Metodo para listar todos alunos (select * from alunos)
    public function listarTodos(){
        //Validar a execução do codigo
        try{
            //Instanciar a classe de conexao
            $bd = new Conexao();

            //Criar um objeto com conexao PDO
            $con = $bd->conectar();

            //Criar o comando sql para enviar para o banco
            $sql = $con->prepare("select * from alunos");

            //Executar o comando
            $sql->execute();

            //Testar se retornou valores
            if($sql->rowCount() > 0) {
                //Se tem valores devolver o resultado para o html
                return $result = $sql->fetchAll(PDO::FETCH_CLASS); //fetchALL (Devolve o resultado  em formato array=>linha/colunas) fetch_ASOC - Quando não tem classe com os atributos/nomes dos BD
            }

        }catch(PDOException $msg){
            echo "Não foi possível listar os alunos: ".$msg->getMessage();
        }
    }

    public function inserir() {
        try {
            //Verificar se recebeu valores do formulário
            if(isset($_POST['nome']) && isset($_POST['sexo'])){
                $this->nome = $_POST['nome'];
                $this->sexo = $_POST['sexo'];
                $this->email = $_POST['email'];
                $this->endereco = $_POST['endereco'];
                $this->telefone = $_POST['telefone'];
                $this->senha = $_POST['senha'];

                //Instanciar classe conexao
                $bd = new conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into alunos(matricula,nome,sexo,email,endereco,telefone,senha) values(null,?,?,?,?,?,?)");
                //Executar o comando passando os valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->telefone,
                    $this->senha,
                ));
                //var_dump($sql->errorInfo()); Variável pra verificar qual o tipo do erro no banco
                //Testar se retornou valores
                if($sql->rowCount() > 0) {
                    //Se conseguiu gravar no banco de dados retornar para página index_alunos.php
                    header("location: index_alunos.php");
                }
            }else { //Se o usuário não preencheu os valores devolver para o index_alunos
                header("location: index_alunos.php");
            }
        }catch(PDOException $msg) {
            echo "Não foi possível inserir o aluno: ".$msg->getMessage();
        }   
    }

    public function excluir($matricula) {
        try {
            //Verificar se recebeu a matrícula
            if(isset($matricula)) {
                //Preencher o atributo com o valor enviado pelo formulário
                $this->matricula = $matricula;
                //Instanciar classe conexao
                $bd = new Conexao();
                //Criar o objeto contento a conexao
                $con = $bd->conectar();
                //Criar o comando sql para enviar ao banco
                $sql = $con->prepare("delete from alunos where matricula = ?");
                //Executar o comando passando o parametro matricula
                $sql->execute(array($this->matricula));
                //Testar se retornou valores
                if($sql->rowCount() > 0) {
                    //Se o aluno foi excluido retornar para a tela index_alunos.php
                    header("location:index_alunos.php");
                }
            }else{//Se o usuario não selecionou no codigo para excluir,
                //Retornar para index_alunos.php
                header("location:index_alunos.php");
            }
        }catch(PDOException $msg) {
            echo "Não foi possível excluir os alunos: ".$msg->getMessage();
        }
    }

    public function alterar() {
        try{
            //Verificar se recebeu valores do formulário
            if(isset($_POST['Salvar'])) {
                $this->matricula = $_GET['matricula'];
                $this->nome = $_POST['nome'];
                $this->sexo = $_POST['sexo'];
                $this->email = $_POST['email'];
                $this->endereco = $_POST['endereco'];
                $this->telefone = $_POST['telefone'];
                $this->senha = $_POST['senha'];
                //Instanciar classe conexao
                $bd = new Conexao();
                //Criar objeto contento a conexao
                $con = $bd->conectar();
                //Cria o comando sql para enviar ao banco pssando parametros ?
                $sql = $con->prepare("update alunos set nome = ?,sexo = ?,email = ?,endereco = ?,telefone = ?,senha = ? where matricula = ?");
                //Executar o comando passando os valores recebidos do formulario
                $sql->execute(array(
                    $this->nome,
                    $this->sexo,
                    $this->email,
                    $this->endereco,
                    $this->telefone,
                    $this->senha,
                    $this->matricula
                ));
                //Testar se retornou valores
                if($sql->rowCount() > 0) {
                    //Se conseguiu alterar no banco de dados retornar para página index_alunos.php
                    header("location:index_alunos.php");
                }
            }else { //Se o usuario não preencheu os valores devolver para o index_alunos.php
                header("location:index_alunos.php");
            }
        }catch(PDOException $msg) {
            echo "Não foi possível alterar o aluno: ".$msg->getMessage();
        }
    }
    
    public function listarID($matricula) {
        try {
            if(isset($matricula)) {
                $this->matricula = $matricula;
                //Instanciar classe conexao
                $bd = new Conexao();
                //Criar objeto contento a conexao
                $con = $bd->conectar();
                //Cria o comando sql para enviar ao banco pssando parametros ?
                $sql = $con->prepare("select * from alunos where matricula = ?");
                //Executar o comando
                $sql->execute(array($this->matricula));
                //Testar se retornou valores
                if($sql->rowCount() > 0) {
                    //Se tem resultado devolver os dados do aluno ao HTML
                    return $result = $sql->fetchObject();
                    //FetchAll -> linhas / colunas
                }
            }
        }catch(PDOException $msg) {
            echo "Não foi possível listar o aluno: ".$msg->getMessage();
        }
    }
}
?>