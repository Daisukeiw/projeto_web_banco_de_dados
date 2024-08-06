<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Exemplo_banco_de_dados/controller/pessoaController.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excluir</title>
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
    <!--Form criado com o metodo post para receber as variaveis e a ação foi designada para o pessoaController-->
    <?php
    //cria objeto PessoaController
    $pessoaController = new PessoaController();
    $pessoa = $pessoaController->buscarPorId($_GET['id']);

    ?>
    <form method="POST" action="controller/pessoaController.php?acao=excluir&id= <?php echo $pessoa['id'] ?>">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $pessoa['nome']; ?>">
        </div>

        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $pessoa['endereco']; ?>">
        </div>

        <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $pessoa['bairro']; ?>">
        </div>

        <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $pessoa['cep']; ?>">
        </div>

        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $pessoa['cidade']; ?>">
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $pessoa['estado']; ?>">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $pessoa['telefone']; ?>">
        </div>

        <div class="form-group">
            <label for="celular">Celular:</label>
            <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $pessoa['celular']; ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-outline-danger">Excluir</button>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>