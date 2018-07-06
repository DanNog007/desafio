<?php

session_start();
//VERIFICA SE O USUARIO JÁ ESTÁ LOGADO, E REDIRECIONA
if ((isset ($_SESSION['login']) == true) && (isset ($_SESSION['senha']) == true))
{
    header("location:minhasCompras.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Login</title>	
</head>
	<body> 
		<div id="login-div">
			<div id="login-head">
				<h3>Login</h3>
			</div>
			<div id="login-form">
				<form action="src/util/validacaoUsuario.php" method="post">
					<?php
					//CASO O CLIENTE ESTIVER LOGANDO PARA FAZER UMA COMPRA, SERÃO CRIADOS INPUTS OCULTOS
					if((isset ($_POST['id-produto']) == true) and (isset ($_POST['quant']) == true))
			             {
			                 echo "<input name='id-produto' id='id-produto' type='hidden' value='".$_POST['id-produto']."'>";
			                 echo "<input name='quant' id='quant' type='hidden' value='".$_POST['quant']."'>";
			                 echo "<input name='acao' id='acao' type='hidden' value='".$_POST['acao']."'>";
			             }
			        ?>
					<input name="login-input" id="login-input" type="text" placeholder="Email" required><br>
					<input name="senha" id="senha" type="password" placeholder="Senha" required><br>
					<input name="submit" id="submit" type="submit" value="Entrar"> 
				</form>
			</div>
		</div>
	</body>
</html>