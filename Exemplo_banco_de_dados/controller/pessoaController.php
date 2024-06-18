<?php
/*importação de um arquivo para a página e 
verifica se o arquivo está funcionando e se ele de fato existe.
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/Exemplo_banco_de_dados/model/pessoa.php';

//classe pessoacontroller
class PessoaController{
    //variável private $pessoa
    private $pessoa;

    //metodo construtor
    public function __construct()
    {
        //cria um objeto da classe Pessoa
        $this->pessoa = new Pessoa();
        //if para comparar se o GET está com a acao no inserir 
        if($_GET['acao'] == 'inserir'){
            //faz a ação inserir com um metodo
            $this->inserir();
        }else if($_GET['acao'] == 'atualizar'){
            $this->atualizar($_GET['id']);
        }
        
    }

    //função inserir, aloca os dados nas variavéis
    public function inserir(){
        $this->pessoa->setNome($_POST['nome']);
        $this->pessoa->setEndereco($_POST['endereco']);
        $this->pessoa->setBairro($_POST['bairro']);
        $this->pessoa->setCep($_POST['cep']);
        $this->pessoa->setCidade($_POST['cidade']);
        $this->pessoa->setEstado($_POST['estado']);
        $this->pessoa->setTelefone($_POST['telefone']);
        $this->pessoa->setCelular($_POST['celular']);


        $this->pessoa->inserir();
    }
    //cria a função listar
    public function listar(){
        //retorna os valores alocados na funçõa listar
        return $this->pessoa->listar(); 
    }
    public function buscarPorId($id){
        return $this->pessoa->buscarPorId($id);
    }
    public function atualizar($id){
        $this->pessoa->setNome($_POST['nome']);
        $this->pessoa->setEndereco($_POST['endereco']);
        $this->pessoa->setBairro($_POST['bairro']);
        $this->pessoa->setCep($_POST['cep']);
        $this->pessoa->setCidade($_POST['cidade']);
        $this->pessoa->setEstado($_POST['estado']);
        $this->pessoa->setTelefone($_POST['telefone']);
        $this->pessoa->setCelular($_POST['celular']);


        $this->pessoa->atualizar($id);
    }
}
//cria um objeto
new PessoaController();
?>