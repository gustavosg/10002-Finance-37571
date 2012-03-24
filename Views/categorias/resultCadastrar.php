<?php

require_once "../../bootstrap.php";

$nomeCategoria = $_POST['nomeCategoria'];

$categoria = new Categories();
$categoria->setName($nomeCategoria);
$categoria->setCreated(date("Y-m-d H:i:s"));

$entityManager->persist($categoria);
$entityManager->flush();

$categoriesRepo = $entityManager->getRepository("Categories");
$posts = $categoriesRepo->findAll();

function exibirRegistro($post){
	foreach ($post as $categoria)
	{
		echo $categoria->ToString();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Categoria:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Categoria Cadastrada:</h1>
		
<?php exibirRegistro($posts);?>

	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
