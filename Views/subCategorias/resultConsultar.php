<?php

require_once "../../bootstrap.php";

$pageMaker = new PageMaker();

$nomeSubCategoria = $_POST['nomeSubCategoria'];

$categoria = new Categories();

$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategories = $subCategoriesRepo->findBy(array ('name'=> $nomeSubCategoria));

$idCategoria = 0;

$categoriesRepo = $entityManager->getRepository("Categories");
$categories = $categoriesRepo->findBy(array ('id' => $idCategoria));

$functionsSub_Categories = new FunctionsSub_Categories();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Informações da Sub-Categoria:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Informações da Sub-Categoria Cadastrada:</h1>
			<?php $functionsSub_Categories->exibirSubCategorias($subCategories); ?>
	</form>
</body>
<?php 
//Imprime o Footer da página
$pageMaker->printFooter();
?>
</html>
