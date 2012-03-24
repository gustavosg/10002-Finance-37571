<?php
require_once '../../bootstrap.php';

$conta = new Categories();

$repoCategories = $entityManager->getRepository("Categories");
$selectCategories = $repoCategories->findAll();



function listarTodasCategorias($categories){

	foreach ($categories as $categorie)
	{
		echo "<tr>";
		echo "<td>".$categorie->getId()."</td>";
		echo "<td>". $categorie->getName(). "</td>";
		echo "<td>". $categorie->getCreated() . "</td>";
		echo "<td>". $categorie->getModified(). "</td>";
		echo "</tr>";
		
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Relatório de Categoria:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Categorias que foram cadastradas:</h1>
		<br>
		<p align="center">
		<table border=1 align=center>
		<tr>
		<td>ID: </td>
		<td>Nome:</td>
		<td>Criado em:</td>
		<td>Modificado em:</td>
		</tr>

		<?php listarTodasCategorias($selectCategories); ?>
		</table>
</p>
	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
