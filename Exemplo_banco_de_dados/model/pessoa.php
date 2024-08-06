<?php
/*importação de um arquivo para a página e 
verifica se o arquivo está funcionando e se ele de fato existe.
*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/Exemplo_banco_de_dados/controller/conexao.php';

class Pessoa{
    //cria variáveis para armazenar os dados
    private $id; 
    private $nome;
    private $endereco;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $telefone;
    private $celular;
    private $conexao;
    
    //Getters e setters para receber e alocar as variáveis
    public function getId(){
        //retorna o valor que está na id
        return $this->id;
    }
    public function setId($id){
        //aloca o valor que está na id na variavel $id
        $this-> id = $id;
    }

    public function getNome(){
        //retorna o valor que está na nome
        return $this->nome;
    }
    public function setNome($nome){
        //aloca o valor que está no nome na variavel $nome
        $this-> nome = $nome;
    }

    public function getEndereco(){
        //retorna o valor que está no endereco
        return $this->endereco;
    }
    public function setEndereco($endereco){
        //aloca o valor que está no endereco na variavel $endereco
        $this-> endereco = $endereco;
    }

    public function getBairro(){
        //retorna o valor que está no bairro
        return $this->bairro;
    }
    public function setBairro($bairro){
        //aloca o valor que está no no bairro na variavel $bairro
        $this-> bairro = $bairro;
    }

    public function getCep(){
        //retorna o valor que está no cep
        return $this->cep;
    }
    public function setCep($cep){
        //aloca o valor que está no cep na variavel $cep
        $this-> cep = $cep;
    }
    
    public function getCidade(){
        //retorna o valor que está no cidade
        return $this->cidade;
    }
    public function setCidade($cidade){
        //aloca o valor que está no cidade na variavel $cidade
        $this-> cidade = $cidade;
    }

    public function getEstado(){
        //retorna o valor que está no estado
        return $this->estado;
    }
    public function setEstado($estado){
        //aloca o valor que está no noestadome na variavel $estado
        $this-> estado = $estado;
    }

    public function getTelefone(){
        //retorna o valor que está no telefone
        return $this->telefone;
    }
    public function setTelefone($telefone){
        //aloca o valor que está no telefone na variavel $telefone
        $this-> telefone = $telefone;
    }

    public function getCelular(){
        //retorna o valor que está no celular
        return $this->celular;
    }
    public function setCelular($celular){
        //aloca o valor que está no celular na variavel $celular
        $this-> celular = $celular;
    }
    //metodo construtor
    public function __construct(){
        //cria objeto da classe conexao
        $this->conexao = new Conexao();
    }
    //função feita para inserir os dados no banco de dados
    public function inserir(){
        //faz o comando insert no SQL
        $sql = "INSERT INTO pessoa (`nome`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `telefone`, `celular` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        /*Um “prepared statement”, ou “declaração preparada”, é um recurso do SQL. Basicamente, 
        ele faz dois passos: primeiro ele prepara a query com os espaços para alocar os dados e 
        o segundo ele coloca os dados nos espaços vazios. 
        Ou seja ela prepara o banco de dados para receber os dados.
        */
        
        //variavel stmt = referencia a conexao -> utiliza o metodo pegar conexao -> prepara o SQL
        $stmt = $this->conexao->getconexao()->prepare($sql);

        
        /*Esta função vincula os parâmetros ao SQL e informa ao banco de dados quais são os parâmetros. 
        O argumento "sss" lista os tipos de dados que são os parâmetros. O caractere s informa ao SQL que o parâmetro é uma string.
        
        Resumindo: ele referecia os parametros e vincula ao sql, 
        e os 's' são para mostrar o tipo dos parametros então tem 8 's' pois tem 8 parametros.
        */
        //esse statement fac com que os dados sejam inseridos, como explicado no segundo passo.
        $stmt->bind_param('ssssssss', $this->nome, $this->endereco, $this->bairro, $this->cep, 
        $this->cidade, $this->estado, $this->telefone, $this->celular);
        
        //Executa os statements
        return $stmt->execute();
        //
    }
    //funcção para dar select nos dados que foram alocados no banco de dados
    public function listar(){
        //faz o comando select no SQL
        $sql = "SELECT * FROM pessoa";

        //variavel stmt = referencia a conexao e estabelece ela -> utiliza o metodo pegar conexao -> prepara o sql
        $stmt = $this->conexao->getConexao()->prepare($sql);

        //Executa os statements
        $stmt->execute();
        
        //atribui os valores a variavel result
        $result = $stmt->get_result();
        
        //cria um vetor chamado $pessoas
        $pessoas = [];
        //esse while serve para continuar atribuindo os dados a variavel pessoa até acabar, 
        //quem faz isso acontecer é o fetch_assoc() 
        while($pessoa = $result->fetch_assoc()){
            //atribui os dados que a variavel pessoa recebeu ao vetor $pessoas
            $pessoas[] = $pessoa;
        }
        
        //vai retornar os valores dentro do vetor $pessoas
        return $pessoas;
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM pessoa WHERE id = ?";

        //variavel stmt = referencia a conexao e estabelece ela -> utiliza o metodo pegar conexao -> prepara o sql
        $stmt = $this->conexao->getConexao()->prepare($sql);

        $stmt->bind_param('i', $id);

        //Executa os statements
        $stmt->execute();
        
        //atribui os valores a variavel result
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function atualizar($id){
                //faz o comando update no SQL
                $sql = "UPDATE pessoa SET nome = ?, endereco = ?, bairro = ?, cep = ?, cidade = ?, estado = ?, telefone = ?, celular = ?  WHERE id = ?";
        
                /*Um “prepared statement”, ou “declaração preparada”, é um recurso do SQL. Basicamente, 
                ele faz dois passos: primeiro ele prepara a query com os espaços para alocar os dados e 
                o segundo ele coloca os dados nos espaços vazios. 
                Ou seja ela prepara o banco de dados para receber os dados.
                */
                
                //variavel stmt = referencia a conexao -> utiliza o metodo pegar conexao -> prepara o SQL
                $stmt = $this->conexao->getconexao()->prepare($sql);
        
                
                /*Esta função vincula os parâmetros ao SQL e informa ao banco de dados quais são os parâmetros. 
                O argumento "sss" lista os tipos de dados que são os parâmetros. O caractere s informa ao SQL que o parâmetro é uma string.
                
                Resumindo: ele referecia os parametros e vincula ao sql, 
                e os 's' são para mostrar o tipo dos parametros então tem 8 's' pois tem 8 parametros.
                */
                //esse statement faz com que os dados sejam inseridos, como explicado no segundo passo.
                $stmt->bind_param('ssssssssi', $this->nome, $this->endereco, $this->bairro, $this->cep, 
                $this->cidade, $this->estado, $this->telefone, $this->celular, $id);    
                
                //Executa os statements
                return $stmt->execute();
    }
    //mesma coisa das outras funções, a unica coisa que muda é adicionar a função de delete
    public function excluir($id){
        $sql = "DELETE FROM pessoa WHERE id = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>