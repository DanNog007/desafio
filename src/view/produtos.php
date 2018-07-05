<?php 
    require_once "../dao/produtoDao.php";
    
    $produtoDao = new ProdutoDao();
    $produtos = $produtoDao->ListarProdutos();
    
    $actionForm = "";
    
    session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
        $actionForm = "login.php";
    }
    else 
    {
        $actionForm = "login.php"; //a definir
    }
    
    if ($produtos != null){
        foreach ($produtos as $produto => $p) {
            echo "<div class='produto'>";
            echo "<div class='produto-dados'>";
            echo "<h3>".$p->getNome()."</h3>";
            echo "</div>";
            echo "<div class='produto-img'>";
            echo "<img style='width: 300px; height: 240px;' src='".$p->getImagemLink()."' />";
            echo "</div>";
            echo "<div class='produto-dados'>";
            echo "<h3>Disponiveis ".$p->getQuantidade()." unidades</h3>";
            echo "<h3>R$ ".str_replace(".", ",", $p->getPreco())."</h3>";
            echo "</div>";
            echo "<div class='produto-func'>";
            echo "<form action='$actionForm' method='post'>";
            echo "<input name='id-produto' id='id-produto' type='hidden' value='".$p->getIdProduto()."'>";
            echo "<input name='quant' id='quant' type='number' required min='".($p->getQuantidade() > 0 ? 1 : 0)."' max='".$p->getQuantidade()."' placeholder='Qauntidade'>";
            echo "<input name='submit' id='submit' type='submit' value='Comprar' ".($p->getQuantidade() > 0 ? "" : "disabled").">";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    }
    
?>
