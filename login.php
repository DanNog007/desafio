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
				<form action="" method="post">
					<?php
					if((isset ($_POST['id-produto']) == true) and (isset ($_POST['quant']) == true))
			             {
			                 echo "<input name='id-produto' id='id-produto' type='hidden' value='".$_POST['id-produto']."'>";
			                 echo "<input name='quant' id='quant' type='hidden' value='".$_POST['quant']."'>";
			             }
			        ?>
					<input name="login-input" id="login-input" type="text" placeholder="Email"><br>
					<input name="senha" id="senha" type="password" placeholder="Senha"><br>
					<input name="submit" id="submit" type="submit" value="Entrar"> 
				</form>
			</div>
		</div>
	</body>
</html>