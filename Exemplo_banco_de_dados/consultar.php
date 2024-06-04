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
</head>

<body>
    <div class="container">
        <h2>Consulta</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
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
                        <th>Ações</th>
                    </tr>
                <?php } ?>
            </tbody>
            </thead>
        </table>
    </div>
</body>

</html>