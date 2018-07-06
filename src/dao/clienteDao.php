<?php
    
    require_once "conexao.php";
    require_once "../model/cliente.php";
    
    
    class ClienteDao { 
        
        private $conexao;
        private $cliente;
        
        //METODO PARA BUSCAR USUARIOS NO BANCO, E CONFIMAR A EXISTENCIA DOS MESMOS
        public function BuscarUsuario($l, $s){
            
            //ABRE A CONEXÃO COM O BANCO
            $this->conexao = new Conexao();
            $this->conexao->CriarConexao();
            
            //QUERY SQL A SER EXECUTADA
            $sql = "SELECT c.idCliente, c.nome, c.email, c.senha, c.endereco, c.cep, c.cidade 
                    FROM cliente c
                    WHERE c.email = '$l' and c.senha = '$s'";
            $result = mysqli_query($this->conexao->getConn(), $sql);
            
            //VERIFICA OS RESULTADOS OBITIDOS DA CONSULTA, OU RETORNA UM VALOR NULO
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $this -> cliente = new Cliente($row["idCliente"], $row["nome"], $row["email"], $row["senha"], $row["endereco"], $row["cep"], $row["cidade"]);  
            } else {
                $this->conexao->FecharConexao();
                return null;
            }            
            
            //FECHA A CONEXÃO COM O BANCO E RETORNA UM OBJETO CLIENTE
            $this->conexao->FecharConexao();
            return $this -> cliente;
        }
        
    }
?>