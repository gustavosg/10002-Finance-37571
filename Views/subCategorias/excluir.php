<?php 
require_once '../../bootstrap.php';

$pageMaker = new PageMaker();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Excluir Sub-Categoria:</title>
</head>

<body>
<form action="resultExcluir.php" name="form" method="post">
	<h1 align="center">Sub-Categoria à Excluir:</h1>
	<br>
	<p align="center">
		<label align="center">Sub-Categoria:</label> <input type="text" size="100"
			maxlength="50" name="nomeSubCategoria" id="nomeSubCategoria" />
	</p>
	<br>
	<p align="center">
		<button type="submit" value="submit" name="Enviar"
			>Enviar</button>

		<button type="button" value="Limpar" name="Limpar"
			onclick="limparCamposSub-Categorias()">Limpar</button>
		<br>
	</p>
	</form>
</body>
<?php 
//Imprime o Footer da página
$pageMaker->printFooter();

?>
</html>
