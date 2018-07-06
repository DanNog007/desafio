<?php
    
    require_once "conexao.php";
    require_once "../model/compra.php";
    session_start();
    
    class CompraDao { 
        
        private $conexao;
        private $compras = array();
        
        //METODO PARA LISTAR AS COMPRAS EFETUADAS
        public function ListarCompras(){
            
            $this->conexao = new Conexao();
            $this->conexao->CriarConexao();
            
            //session_start();
            $sql = "SELECT c.idCompra, p.nome, p.preco, p.imagemLink, c.dtCompra, c.quantidade, if(c.estado = 'f', 'Finalizado', 'Pendente') as estado
                    FROM compra c
                    inner join cliente cl on cl.idCliente = c.idCliente
                    inner join produto p on p.idProduto = c.idProduto
                    where cl.idCliente = '".$_SESSION['id_usuario']."' and c.estado = 'f'";
            $result = mysqli_query($this->conexao->getConn(), $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $this -> compras[] = new Compra($row["idCompra"], new Produto(null, $row["nome"], "", $row["preco"], $row["imagemLink"], null), null, $row["quantidade"], $row["estado"], $row["dtCompra"]);
                }
            } else {
                $this->conexao->FecharConexao();
                return null;
            }            
            
            $this->conexao->FecharConexao();
            return $this -> compras;
        }
        
        //METODO PARA LISTAR COMPRAS QUE AINDA NÃO FORAM CONFIRMADAS
        public function ListarComprasCarrinho(){
            
            $this->conexao = new Conexao();
            $this->conexao->CriarConexao();
            
            //session_start();
            $sql = "SELECT c.idCompra, p.nome, p.preco, p.imagemLink, c.dtCompra, c.quantidade, if(c.estado = 'f', 'Finalizado', 'Pendente') as estado
                    FROM compra c
                    inner join cliente cl on cl.idCliente = c.idCliente
                    inner join produto p on p.idProduto = c.idProduto
                    where cl.idCliente = '".$_SESSION['id_usuario']."' and c.estado = 'p'";
            $result = mysqli_query($this->conexao->getConn(), $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $this -> compras[] = new Compra($row["idCompra"], new Produto(null, $row["nome"], "", $row["preco"], $row["imagemLink"], null), null, $row["quantidade"], $row["estado"], $row["dtCompra"]);
                }
            } else {
                $this->conexao->FecharConexao();
                return null;
            }
            
            $this->conexao->FecharConexao();
            return $this -> compras;
        }
        
        //METODO PARA INSERÇÃO DE UMA NOVA COMPRA
        public function InserirCompra($c){
            
            $this->conexao = new Conexao();
            $this->conexao->CriarConexao();
           
            $sql = "insert into compra (idCliente, idProduto, quantidade, estado, dtCompra) values (".$c->getCliente()->getIdCliente().",".$c->getProduto()->getIdProduto().",".$c->getQuantidade().",'p', current_date())";
            if (mysqli_query($this->conexao->getConn(), $sql) === TRUE) {
                return true;
            } else {
                return "Erro: " . $sql . "<br>" . $this->conexao->getConn()->error;
            }
            
            $this->conexao->FecharConexao();            
        }
        
        //METODO PARA CONFIRMAR COMPRA
        public function ConfirmarCompra($id){
            
            $this->conexao = new Conexao();
            $this->conexao->CriarConexao();
            
            $sql = "update compra set estado = 'f', dtCompra = current_date() where idCompra = $id";
            if (mysqli_query($this->conexao->getConn(), $sql) === TRUE) {
                return true;
            } else {
                return "Erro: " . $sql . "<br>" . $this->conexao->getConn()->error;
            }
            
            $this->conexao->FecharConexao();
        }
        
        //METODO PARA CANCELAMENTO DE COMPRAS
        public function CancelarCompra($id){
            
            $this->conexao = new Conexao();
            $this->conexao->CriarConexao();
            
            $sql = "delete from compra where idCompra = $id";
            if (mysqli_query($this->conexao->getConn(), $sql) === TRUE) {
                return true;
            } else {
                return "Erro: " . $sql . "<br>" . $this->conexao->getConn()->error;
            }
            
            $this->conexao->FecharConexao();
        }
        
    }
?>