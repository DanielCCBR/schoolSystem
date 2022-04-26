<?php
header("Content-type:text/html; charset=utf8");
//Importar a classe Alunos
require_once "Classes(config)/Usuario.php";
//Instanciar a classe usuario
$Usuarios = new Usuario();
//Criar lista de alunos
if (isset($_POST["Entrar"])) {
    //Chamar a função inserir
    $Usuarios->login();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema Escolar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="tudo">
        <div class="login">
            <!--Logo da Empresa-->
            <div align="center">
                <img src="img/logo.png">
            </div>
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="email@gmail.com.br" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" minlenght="6" maxlength="15" required>
                </div>
                <div align="center">
                    <button class="btn btn-success" type="submit" name="Entrar">Entrar</button>
                    <a href="cadusuario.php" class="btn btn-outline-primary">Registrar</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html