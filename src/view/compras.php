<?php 
    require_once "../dao/compraDao.php";
    
    $compraDao = new CompraDao();
    $compras = $compraDao->ListarCompras();
    
    //PREPARAS OS DADOS PARA SEMREM APRESENTADOS AO USUARIO
    if ($compras != null){
        foreach ($compras as $compra => $c) {
            echo "<div class='produto'>";
            echo "<div class='produto-dados'>";
            echo "<h3>".$c->getProduto()->getNome()." - " . number_format($c->getProduto()->getPreco(), 2, ',', '.') ."</h3>";
            echo "</div>";
            echo "<div class='produto-img'>";
            echo "<img style='width: 300px; height: 240px;' src='".$c->getProduto()->getImagemLink()."' />";
            echo "</div>";
            echo "<div class='produto-dados'>";
            echo "<h3>Você comprou ".$c->getQuantidade()." unidades</h3>";
            echo "<h3>Total: R$ ".number_format(($c->getProduto()->getPreco()*$c->getQuantidade()), 2, ',', '.')."</h3>";
            echo "<h3>Data:  " . date("d/m/Y", strtotime($c->getDtCompra())) . "</h3>";
            echo "</div>";
            echo "</div>";
        }
    }
    
?>
