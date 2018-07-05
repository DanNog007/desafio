<?php 
class Produto { 
    
    //ATRIBUTOS
	private $idProduto;
    private $nome;
	private $descricao;
	private $preco;
	private $imagemLink;
	private $quantidade;
	
	//CONSTRUTOR
	public function __construct($idProduto, $nome, $descricao, $preco, $imagemLink, $quantidade) {

        $this -> idProduto = $idProduto;
		$this -> nome = $nome;
		$this -> descricao = $descricao;
		$this -> preco = $preco;
		$this -> imagemLink = $imagemLink;
		$this -> quantidade = $quantidade;
    }
	
    //METODOS GETTERS E SETTERS
    public function getIdProduto() {
        return $this->idProduto;
    }
	
    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }
	
    public function getNome() {
        return $this->nome;
    }
	
    public function setNome($nome) {
        $this->nome = $nome;
    }
	
    public function getDescricao() {
        return $this->descricao;
    }
	
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
	
    public function getPreco() {
        return $this->preco;
    }
	
    public function setPreco($preco) {
        $this->preco = $preco;
    }
    public function getImagemLink()
    {
        return $this->imagemLink;
    }

    public function setImagemLink($imagemLink)
    {
        $this->imagemLink = $imagemLink;
    }
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
} 
?> 