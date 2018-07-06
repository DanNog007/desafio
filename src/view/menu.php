<!-- PREPARAS OS DADOS PARA SEMREM APRESENTADOS AO USUARIO-->
<div id="menu-sup">
	<div class="comp-menu" id="comp-esquerdo">
		<a href="index.php"><h1>Desafio.com</h1></a>
	</div>
	<div class="comp-menu" id="comp-centro">
		<h2><?php if(isset($_GET["tela"])){
					echo $_GET["tela"];
				  } else{
					echo "Veja nosso produtos abaixo";
				  }
			?>
		</h2>
	</div>
	<div class="comp-menu" id="comp-direito">
		<?php
			session_start();
			if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
			{
				echo "<div id='login'>";
				echo "<a href='login.php'>Login</a>";
				echo "</div>";
			}else
			{
				echo "<div id='cliente'>";
				echo "<div id='cliente-id'>";
				echo "<p>".$_SESSION['usuario']."</p>";
				echo "</div>";
				echo "<div id='cliente-func'>";
				echo "<a href='minhasCompras.php'>Compras</a>";
				echo "<a href='carrinhoCompras.php'>Carrinho</a>";
				echo "<a href='src/util/validacaoUsuario.php'>Sair</a>";
				echo "</div>";
				echo "</div>";
			}
		?>
		<!--<div id="login">
			<a href="#">Login</a>
		</div>
		<div id="cliente">
			<div id="cliente-id">
				<p>Nome Cliente</p>
			</div>
			<div id="cliente-func">
				<a href="#">Minha Conta</a>
				<a href="#">Sair</a>
			</div>
		</div>-->
	</div>
</div>