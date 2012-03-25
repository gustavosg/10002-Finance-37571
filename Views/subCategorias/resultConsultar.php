<?php

require_once "../../bootstrap.php";

$nomeSubCategoria = $_POST['nomeSubCategoria'];

$subCategoria = new Sub_Categories();

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategories = $subCategoriesRepo->findBy(array ('name'=> $nomeSubCategoria));

$idCategoria = 0;

foreach ($subCategories as $subCategorie)
	$idCategoria = $subCategorie->getCategoryId();

$categoriesRepo = $entityManager->getRepository("Categories");
$categories = $categoriesRepo->findBy(array ('id' => $idCategoria));

function listarSubCatorias($listCategories){
	foreach ($listCategories as $categorie){
		exibirRegistrosSubCategorias($categorie);
	}
}

function exibirRegistrosSubCategorias($categorie){
	echo "Informações da SubCategoria: <br />";
	echo "Id : ".$categorie->getId(). "<br />";
	echo "Nome : ". $categorie->getName(). "<br />";
	echo "Criado em: ". $categorie->getCreated() . "<br />";
	echo "Modificado em: ". $categorie->getModified(). "<br />";
}

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
		<button onclick="history.back()" >Voltar</button>

		<h1 align="center">Informações da Sub-Categoria Cadastrada:</h1>

<?php 

// TODO Gustavo: Conferir funcionamento de listar SubCategorias (Antes é necessário de Cadastrar a SubCategoria funcionar)
listarSubCatorias($subCategories);

foreach ($categories as $categorie)
	echo $categorie->ToString();
?>

	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
