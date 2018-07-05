<?php
    
    require_once "conexao.php";
    require_once "../model/produto.php";
    
    
    class ProdutoDao { 
        
        private $conexao;
        private $produtos = array();
        
        function ListarProdutos(){
            
            $this->conexao = new Conexao();
            $this->conexao->CriarConexao();
            
            $sql = "SELECT p.idProduto, p.nome, p.preco, p.imagemLink, SUM(COALESCE(e.quantidade,0) - COALESCE(c.quantidade,0)) as quant 
                    FROM produto p 
                    left join entradaproduto e on e.idProduto = p.idProduto 
                    left join compra c on c.idProduto = p.idProduto 
                    GROUP BY 1,2,3,4
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
        
    }
?>