<?php
/*importação de um arquivo para a página e 
verifica se o arquivo está funcionando e se ele de fato existe.
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '../Exemplo_banco_de_dados/model/pessoa.php';

//classe pessoacontroller
class PessoaController{
    //variável private $pessoa
    private $pessoa;

    //metodo construtor
    public function __construct()
    {
        //cria um objeto da classe Pessoa
        $this->Pessoa = new Pessoa();
        //if para comparar se o GET está com a acao no inserir 
        if($_GET['acao'] == 'inserir'){
            //faz a ação inserir com um metodo
            $this->inserir();
        }
        
    }

    //função inserir, aloca os dados nas variavéis
    public function inserir(){
        $this->Pessoa->setNome($_POST['nome']);
        $this->Pessoa->setEndereco($_POST['endereco']);
        $this->Pessoa->setBairro($_POST['bairro']);
        $this->Pessoa->setCep($_POST['cep']);
        $this->Pessoa->setCidade($_POST['cidade']);
        $this->Pessoa->setEstado($_POST['estado']);
        $this->Pessoa->setTelefone($_POST['telefone']);
        $this->Pessoa->setCelular($_POST['celular']);


        $this->Pessoa->inserir();
    }
    //cria a função listar
    public function listar(){
        //retorna os valores alocados na funçõa listar
        return $this->Pessoa->listar(); 
    }
}
//cria um objeto
new PessoaController();
?>