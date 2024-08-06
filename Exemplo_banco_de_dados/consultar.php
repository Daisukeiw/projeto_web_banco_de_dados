<?php
/*importação de um arquivo para a página e 
verifica se o arquivo está funcionando e se ele de fato existe.
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/Exemplo_banco_de_dados/controller/pessoaController.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tela de Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class = "bg-body-tertiary">
    <header>
        <div class="row fixed-top bg-dark">
            <div class="col">
                <div class="container m-auto">
                    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.php">Banco de Dados</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="index.php">Cadastrar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="consultar.php?acao=consultar">Consultar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <br><br><br>

    <div class="container m-auto mb-2">
        <h3 class="mb-3">Consulta de Dados</h3>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php
            //cria um objeto para referenciar a classe
            $pessoaController = new PessoaController();
            //faz a variavel pessoas receber o método listar da pessoaController
            $pessoas = $pessoaController->listar();
            //o foreach serve para atribuir os valores do vetor $pessoas na variavel $pessoa.
            foreach ($pessoas as $pessoa) {
            ?>
                <tr>
                    <!--echo para mostrar os valores dentro das variavel $pessoa-->
                    <th><?php echo $pessoa['nome']; ?></th>
                    <th><?php echo $pessoa['telefone']; ?></th>
                    <th><?php echo $pessoa['celular']; ?></th>
                    <th><a href="editar.php?id=<?php echo $pessoa['id']; ?>&acao=editar">Editar</a></th>
                    <th><a class = "text-danger" href="excluir.php?id=<?php echo $pessoa['id']; ?>&acao=editar">Excluir</a></th>
                </tr>
            <?php } ?>
        </tbody>
        </thead>
    </table>
    </div>
</body>

</html>