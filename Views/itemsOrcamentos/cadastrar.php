<?php 

require_once '../../bootstrap.php';

$orcamento = new Budgets();

$subCategoria = new SubCategories();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Items no Or�amento:</title>
</head>

<body>
<form action="" name="form" method="post">
	<h1 align="center">Entre com as informa��es:</h1>
	<br>
	<p align="center">
		<label align="center">Or�amentos:</label> 
		
		
		<input type="text" size="100"
			maxlength="50" name="NomeItemOrcamento" id="NomeItemOrcamento" />
	</p>
	<br>
	<p align="center">
		<button type="submit" value="submit" name="Enviar"
			>Enviar</button>

		<button type="button" value="Limpar" name="Limpar"
			onclick="limparCamposOrcamentoss()">Limpar</button>
		<br>
	</p>
	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
