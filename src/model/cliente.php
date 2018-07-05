<?php 
class Cliente { 
    
    //ATRIBUTOS
	private $idCliente;
    private $nome;
	private $email;
	private $senha;
	private $endereco;
	private $cep;
	private $cidade;
	
	//CONSTRUTOR
	public function __construct($idCliente, $nome, $email, $senha, $endereco, $cep, $cidade) {

        $this -> idCliente = $idCliente;
		$this -> nome = $nome;
		$this -> email = $email;
		$this -> senha = $senha;
		$this -> endereco = $endereco;
		$this -> cep = $cep;
		$this -> cidade = $cidade;
    }
	
    //METODOS GETTERS E SETTERS
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
} 
?> 