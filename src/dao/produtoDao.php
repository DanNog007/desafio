<?php
    
    require_once "conexao.php";
    require_once "../model/produto.php";
    
    
    class ProdutoDao { 
        
        private $conexao;
        private $produtos = array();
        private $produto;
        
        //METODO PARA LISTAR TODOS OS PRODUTOS, E TRAZAER AS QUANTIDADES ATUALIZADAS
        public function ListarProdutos(){
            
            $this->conexao = new Conexao();
            $this->conexao->CriarConexao();
            
            $sql = "SELECT p.idProduto, p.nome, p.preco, p.imagemLink, COALESCE(e.quantidade,0) - COALESCE(c.quantidade,0) as quant
                    FROM produto p
                    left join (select idProduto, sum(quantidade) as quantidade
                               from entradaproduto 
                               group by idProduto) e on e.idProduto = p.idProduto
                    left join (select idProduto, sum(quantidade) as quantidade
                               from compra
                               group by idProduto) c on c.idProduto = p.idProduto
                    ORDER BY p.nome";
            $result = mysqli_query($this->conexao->getConn(), $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $this -> produtos[] = new Produto($row["idProduto"], $row["nome"], "", $row["preco"], $row["imagemLink"], $row["quant"]);
                }
            } else {
                return null;
            }            
            
            $this->conexao->FecharConexao();
            return $this -> produtos;
        }
        
        //METODO PARA LISTAR APENAS UM PRODUTO, E TRAZAER A QUANTIDADE ATUALIZADA
        public function ProdutoPorId($id){
            
            $this->conexao = new Conexao();
            $this->conexao->CriarConexao();
            
            $sql = "SELECT p.idProduto, p.nome, p.preco, p.imagemLink, COALESCE(e.quantidade,0) - COALESCE(c.quantidade,0) as quant
                    FROM produto p
                    left join (select idProduto, sum(quantidade) as quantidade
                               from entradaproduto 
                               group by idProduto) e on e.idProduto = p.idProduto
                    left join (select idProduto, sum(quantidade) as quantidade
                               from compra
                               group by idProduto) c on c.idProduto = p.idProduto
                    WHERE p.idProduto = $id
                    ORDER BY p.nome";
            $result = mysqli_query($this->conexao->getConn(), $sql);
            
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $this -> produto = new Produto($row["idProduto"], $row["nome"], "", $row["preco"], $row["imagemLink"], $row["quant"]);
            } else {
                return null;
            }
            
            $this->conexao->FecharConexao();
            return $this -> produto;
        }
        
    }
?>