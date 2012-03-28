<?php

require_once '../../bootstrap.php';

$categorias = new Categories();

$categoryRepo = $entityManager->getRepository("Categories");
$infoCategory = $categoryRepo->findAll();

function listarCategorias($infoCategory){
	foreach($infoCategory as $categories) {
		echo "<option value='".$categories->getId()."' >".$categories->getName()."</option>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Sub-Categoria:</title>
</head>

<body>
	<form action="resultCadastrar.php" name="form" method="post">
		<h1 align="center">Entre com as informações:</h1>
		<br>
		<p align="center">
		<table align="center">
			<tr>
				<td><label>Selecione uma categoria: </label></td>
				<td><select name="idCategoria">
						<option />
						<?php listarCategorias($infoCategory)?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Nome da Sub-Categoria:</label></td>
				<td><input type="text" size="100" maxlength="50" name="nomeSubCategoria" id="nomeSubCategoria" /></td>
			</tr>

		</table>
		</p>
		<br>
		<p align="center">
			<button type="submit" value="submit" name="Enviar">Enviar</button>

			<button type="button" value="Limpar" name="Limpar" onclick="limparCamposSubCategorias()">Limpar</button>
			
		</p>
	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
