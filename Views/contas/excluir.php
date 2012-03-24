<?php
require_once '../../bootstrap.php';

$postRepo = $entityManager->getRepository("Accounts");
$accounts = $postRepo->findAll();

function listarContas($accounts){
	foreach($accounts as $post) {
		echo "<option >".$post->getName()."</option>";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Excluir Conta:</title>
</head>

<body>
	<form action="resultExcluir.php" name="form" method="post">
		<h1 align="center">Conta à Excluir:</h1>
		<br>
		<p align="center">
			<label align="center">Conta:</label> 
			
					<select name="nomeConta">
		<option />

			<?php listarContas($accounts)?>
			</select>
			</p>
		<p align="center">
			<button type="submit" value="submit" name="Enviar">Enviar</button>

			<button type="button" value="Limpar" name="Limpar"
				onclick="limparCamposContas()">Limpar</button>
			<br>
		</p>
	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
