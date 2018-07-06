<?php 
    require_once "../dao/clienteDao.php";
    
    session_start();
    
    $clienteDao = new ClienteDao(); 
    $cliente = $clienteDao->BuscarUsuario($_SESSION['login'], $_SESSION['senha']);
    
    //PREPARAS OS DADOS PARA SEMREM APRESENTADOS AO USUARIO
    if ($cliente != null){
        echo "<div id='dados-cliente'>";
        echo "<div id='dados-head'>";
        echo "<h3>Endereço de Entrega</h3>";
        echo "</div>";
        echo "<div id='dados-body'>";
        echo "<p><b>Destinatario:</b> ".$cliente->getNome()."</p>";
        echo "<p><b>Endereço:</b> ".$cliente->getEndereco()."</p>";
        echo "<p><b>Cep:</b> ".$cliente->getCep()." <b>Cidade:</b> ".$cliente->getCidade()."</p>";
        echo "</div>";
        echo "</div>";
    }
    
?>

