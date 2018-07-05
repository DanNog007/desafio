<?php

require_once 'produto.php';
require_once 'cliente.php';

class Compra
{

    //ATRIBUTOS
    private $idCompra;
    private $produto;
    private $cliente;
    private $quantidade;
    private $estado;
    
    //CONSTRUTOR
    public function __construct($idCompra, $produto, $cliente, $quantidade, $estado) {
        
        $this -> idCompra = $idCompra;
        $this -> produto = $produto;
        $this -> cliente = $cliente;
        $this -> quantidade = $quantidade;
        $this -> estado = $estado;
    }
    
    //METODOS GETTERS E SETTERS
    public function getIdCompra()
    {
        return $this->idCompra;
    }

    public function setIdCompra($idCompra)
    {
        $this->idCompra = $idCompra;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}

