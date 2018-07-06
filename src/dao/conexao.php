 <?php
 
 class Conexao { 
	//DADOS PARA CONEX�O COM O BANCO
    private $servername = "localhost";
    private $username = "root";
    private $password = "0411";
    private $dbname = "desafio";
    
    //VARIAVEL DE CONEXAO
    private $conn;
    
    public function CriarConexao(){
        //ABRE A CONEXÃO COM O BANCO
        $this -> conn = mysqli_connect($this -> servername, $this -> username, $this -> password, $this -> dbname);
        
        //VERIFICA SE A CONEXÃO FOI BEM SUCEDIDA
        if (!$this -> conn) {
            die("Falha na conexão com o banco: " . mysqli_connect_error());
        }
    }
    
    public function FecharConexao(){
        //FECHA A CONEXÃO COM O BANCO
        mysqli_close($this->conn);
    }
    
    //GETTERS E SETTERS
    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }
    	
 }
?>