<?php
    
    require_once "../dao/compraDao.php";
    
    //OBJETO DE ACESSO DE DADOS
    $compraDao = new CompraDao();
    
    //VARIAVEL PARA INDENTIFICAR A AÇÃO, SEN 1 PARA INCLUSÃO, 2 PARA CONFIRMAÇÃO DA COMPRA, E 3 PARA CANCELAR A COMPRA
    $acao = 0;
    
    //VERIFICA SE A VARIAVEL DE AÇÃO TEM ALGUM VALOR ARMAZENADO, OU NA SESSÃO OU NO POST, CASO NÃO TENHA REDIRECIONA PARA PAGINA INICIAL
    if (isset($_POST['acao'])){
        $acao = $_POST['acao'];
    }
    else if (isset($_SESSION['acao'])){
        $acao = $_SESSION['acao'];
    }
    else{
        header("location:../../index.php");
    }
    
    //REALIZANDO A INCLUSÃO
    if($acao == 1){
        //VARIAVEIS PARA ARMAZENAR DADOS DO POST OU SESSÃO
        $idProduto = 0;
        $quant = 0;
        
        //ATRIBUNDO OS VALORES DAS VARIAVEIS ACIMA
        if (isset($_POST["id-produto"]) && isset($_POST["quant"])){
            $idProduto = $_POST["id-produto"];
            $quant = $_POST["quant"];
        }
        else if (isset($_SESSION["id-produto"]) && isset($_SESSION["quant"])){
            $idProduto = $_SESSION["id-produto"];
            $quant = $_SESSION["quant"];
        }
        
        //INTANCIA DE UM NOVO OBJETO PARA SER GRAVADO NO BANCO, OBS: VALORES QUE NÃO SERÃO GRAVADOS FICARAM EM BRANCO OU NULOS
        $compra = new Compra(null, new Produto($idProduto, "", "", "", "", ""), new Cliente($_SESSION["id_usuario"], "", "", "", "", "", ""), $quant, "p", "");
        
        //EXECUTA O METODO DE INSERÇÃO, E VERIFICA O RESULTADO
        $result = $compraDao->InserirCompra($compra);
        if($result == true){
            unset ($_SESSION["id-produto"]);
            unset ($_SESSION["quant"]);
            unset ($_SESSION["acao"]);
            header("location:../../carrinhoCompras.php");
        }
        else {
            echo "<div style='width: 500px; margin: 50px auto; text-align: center;'><p>".$result."</p></div>";
        }
    }
    
    //CONFIRMANDO A COMPRA
    else if($acao == 2){
        //EXECUTA O METODO DE CONFIRMAÇAÕ, E VERIFICA O RESULTADO
        $result = $compraDao->ConfirmarCompra($_POST["id-compra"]);
        if($result == true){
            header("location:../../minhasCompras.php");
        }
        else {
            echo "<div style='width: 500px; margin: 50px auto; text-align: center;'><p>".$result."</p></div>";
        }
    }
    
    //CANCELANDO A COMPRA
    else if($acao == 3){
        //EXECUTA O METODO DE CANCELAMENTO, E VERIFICA O RESULTADO
        $result = $compraDao->CancelarCompra($_POST["id-compra"]);
        if($result == true){
            header("location:../../carrinhoCompras.php");
        }
        else {
            echo "<div style='width: 500px; margin: 50px auto; text-align: center;'><p>".$result."</p></div>";
        }
    }
    
    //CASO O VALOR DA VARIAVEL DE SESSAO SEJA DIFERENTE DOS VERIFICADOS, REDIRECIONA PARA PAGINA INICIAL
    else{
        header("location:../../index.php");
    }
    
?>