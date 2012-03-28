<?php
require_once '../../bootstrap.php';


$functionsSub_Categories = new FunctionsSub_Categories();

$categoria = new Categories();

$categoriesRepo = $entityManager->getRepository("Categories");

$categoriesResult = $categoriesRepo->findAll();

$subCategoria = new Sub_Categories($categoria);

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$listSubCategories = $subCategoriesRepo->findAll();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Relat�rio de Sub-Categoria:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Sub-Categorias que foram cadastradas:</h1>
		<br>
		<table align="center" border=2>

			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Cria��o</td>
				<td>Modifica��o</td>
			</tr>
			
	<?php $functionsSub_Categories->listarTodasSubCategorias($listSubCategories);?>
</table>
	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
