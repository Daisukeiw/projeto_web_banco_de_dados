<?php
//parte 1
//nao precisa colocar a visibilidade da classe

class Conexao {
    //n tem tipo pq n existe
    //só pode ser usada na próprio classe pq é private
    //vai ser usada maria db
    private $host = "localhost"; //banco de dados será local
    private $usuario = "root"; // usuario padrao
    private $senha = "";
    private $banco = "exemplo_aula_pw";
    private $conexao;

                    //padrao metodo construtor __
    public function __construct(){ //método construto
        //conexao vai acessar todo banco de dados mysqli = responsavel por propriedades do sql ex: insert delete 
        //conexao é objeto do mysqli
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_error){ //caso ocorra erro vai retornar algo por causa do die
            die("Falha na conexão: " . $this->conexao->connect_error);
        }

    }
    //retorna valor do conexao
        public function getConexao(){
            return $this->conexao;
        }
    }

?>