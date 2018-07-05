<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Produtos</title>	
</head>
	<body>
		<div id="menu-view">
		</div>
		<div id="produtos">
			<!--<div class="produto">
				<div class="produto-dados">
					<h3>Nome Produto</h3>
				</div>
				<div class="produto-img">
					<img style="width: 300px; height: 240px;" src="https://www.pichau.com.br/media/catalog/product/5/5/5577_big.jpg" />
				</div>
				<div class="produto-dados">
					<h3>Disponiveis x unidades</h3>
					<h3>R$ 20,00</h3>
				</div>
				<div class="produto-func">
					<form action="" method="post">
						<input name="id-produto" id="id-produto" type="hidden" value="id-produto">
						<input name="quant" id="quant" type="number" min="1" max="31" placeholder="Qauntidade">
						<input name="submit" id="submit" type="submit" value="Comprar">
					</form>
				</div>
			</div>-->
		</div>
		
		<!--Criar Script separado-->
		<script>
			$(document).ready(function(){
				$("#menu-view").load("src/view/menu.php?tela="+document.getElementsByTagName("title")[0].innerHTML);
				$("#produtos").load("src/view/produtos.php");
			});
		</script>
	</body>
</html>