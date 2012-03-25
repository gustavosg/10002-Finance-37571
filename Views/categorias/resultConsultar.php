<?php

require_once "../../bootstrap.php";

$nomeCategoria = $_POST['nomeCategoria'];

$categoria = new Accounts(null, $nomeCategoria);

$categoryRepo = $entityManager->getRepository("Categories");

$categories = $categoryRepo->findBy(array ('name' => $categoria->getName()));

function listarCategorias($posts){

	foreach ($posts as $post){
		exibirRegistrosCategoria($post);
	}
}

function exibirRegistrosCategoria($post){
	echo "Informações da categoria: <br />";
	echo "Id da categoria: ".$post->getId(). "<br />";
	echo "Nome : ". $post->getName(). "<br />";
	echo "Criado em: ". $post->getCreated() . "<br />";
	echo "Modificado em: ". $post->getModified(). "<br />";
}

?>


<html>

<head>

<title>Informações da Categoria:</title>
</head>
<body>
	<h1 align="center">Categoria solicitada:</h1>
	

<?php listarCategorias($categories);?>

</body>
</html>
