<?php

require_once "../dao/clienteDao.php";

session_start();

//VARIAVEI PARA RECEBER OS VALORES DO POST
$login = "";
$senha = "";

//VERIFICA SE EXISTE VALORES NO POST, E OS ATRIBUEM AS VARIAVEIS
if(isset($_POST['login-input']) && isset($_POST['senha'])){
    $login = $_POST['login-input'];
    $senha = md5($_POST['senha']);
}

//INSTACIA DO OBJETO DE ACESSO DE DADOS, E REALIZAÇÃO DA CONSULTA DO USUARIO NO BANCO
$clienteDao = new ClienteDao();
$cliente = $clienteDao->BuscarUsuario($login, $senha);


//VALIDA SE O OBJETO RECEBIDO NÃO É NULO
if($cliente != null)
{
    //SETA VALORES NA SESSÃO
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['usuario'] = explode(" ",$cliente->getNome())[0];
    $_SESSION['id_usuario'] = $cliente->getIdCliente();
    //VERIFICA SE O CLIENTE ESTA TENTEANDO FAZER UMA COMPRA, E SETA OS DADOS DA COMPRA NA SESSÃO
    if(isset($_POST["id-produto"]) && isset($_POST["quant"]))
    {
        $_SESSION['id-produto'] = $_POST["id-produto"];
        $_SESSION['quant'] = $_POST["quant"];
        $_SESSION['acao'] = $_POST["acao"];
        header('location:../controller/compraC.php');
    }
    //CASO SEJA APENAS UM LOGIN SIMPLES, O CLIENTE SRA REDIRECIONADO PARA SUAS COMPRAS
    else{
        header('location:../../minhasCompras.php');
    }
}
//CASO O OBJETO RETORNADO SEJA NULO, ZERA OS DADOS GRVADOS NA SESSÃO E REDIRECIONA PARA TELA DE LOGIN
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    unset ($_SESSION['usuario']);
    unset ($_SESSION['id_usuario']);
    if(isset( $_SESSION["id-produto"]) && isset( $_SESSION["quant"]))
    {
        unset ($_SESSION['id-produto']);
        unset ($_SESSION['quant']);
        unset ($_SESSION['acao']);
    }
    header('location:../../login.php');
    
}
?>