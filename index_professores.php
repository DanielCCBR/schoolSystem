<?php
header("Content-type:text/html; charset=utf8");

require_once "Classes(config)/Professores.php";
$Professores = new Professores();
$listaProfessores = $Professores->listarTodos();

if (isset($_GET["numero"])) {
    $Professores->excluir($_GET["numero"]);
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="index_adm.php">Sistema Escolar - Painel Administrativo</a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index_alunos.php">Alunos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_professores.php">Professores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_funcionarios.php">Funcionários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_cursos.php">Cursos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index_disciplinas.php">Disciplinas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Sair</a>
            </li>
        </ul>
    </nav>

    <div class="container lista">
        <div class="row coluna">
            <div class="col-md-10">
                <h3>Lista de Professores</h3>
            </div>
            <div class="col-md-2">
                <a href="cadastrar_professor.php" class="btn btn-primary">Novo</a>
            </div>
        </div>

        <!--Tabela para listar os dados do banco de dados-->
        <table class="table table-dark">
            <!--Cabecalho com as colunas do banco de dados-->
            <thead>
                <tr>
                    <!--Linha-->
                    <th>Número</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Endereço</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Matéria</th>
                    <th></th><!-- Coluna em branco para os botoes editar/excluir-->
                </tr>
            </thead>
            <!--Corpo da tabela com os dados do banco de dados-->
            <tbody>
                <?php if ($listaProfessores) :
                    foreach ($listaProfessores as $professor) : ?>
                        <tr>
                            <td><?php echo $professor->numero; ?></td>
                            <td><?php echo $professor->nome; ?></td>
                            <td><?php echo $professor->sexo; ?></td>
                            <td><?php echo $professor->endereco; ?></td>
                            <td><?php echo $professor->email; ?></td>
                            <td><?php echo $professor->telefone; ?></td>
                            <td><?php echo $professor->materia; ?></td>
                            <td>
                                <a href="alterar_professor.php?numero=<?php echo $professor->numero; ?>" class="btn btn-outline-success"><img src="img/edit.png"></a>
                                <a href="index_professores.php?numero=<?php echo $professor->numero; ?>" class="btn btn-outline-danger"><img src="img/delete.png"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">Nenhum professor cadastrado!!!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html