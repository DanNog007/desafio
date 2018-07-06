<?php 
    require_once "../dao/compraDao.php";
    
    $compraDao = new CompraDao();
    $compras = $compraDao->ListarComprasCarrinho();
    
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
            echo "<h3>Compra de ".$c->getQuantidade()." unidades</h3>";
            echo "<h3>Total: R$ ".number_format(($c->getProduto()->getPreco()*$c->getQuantidade()), 2, ',', '.')."</h3>";
            echo "<h3>Data:  " . date("d/m/Y", strtotime($c->getDtCompra())) . "</h3>";
            echo "</div>";
            echo "<div class='produto-func'>";
            echo "<form class='form-right' action='src/controller/compraC.php' method='post'>";
            echo "<input name='id-compra' id='id-compra' type='hidden' value='".$c->getIdCompra()."'>";
            echo "<input name='acao' id='acao' type='hidden' value='2'>";
            echo "<input name='submit' id='submit' type='submit' value='Confirmar'>";
            echo "</form>";
            echo "<form class='form-right' action='src/controller/compraC.php' method='post'>";
            echo "<input name='id-compra' id='id-compra' type='hidden' value='".$c->getIdCompra()."'>";
            echo "<input name='acao' id='acao' type='hidden' value='3'>";
            echo "<input name='submit' id='submit' type='submit' value='Cancelar'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    }
    
?>
