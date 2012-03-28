<?php

require_once "../../bootstrap.php";

$idCategoria = $_POST['idCategoria'];
$nomeSubCategoria = $_POST['nomeSubCategoria'];

$categoria = new Categories($idCategoria, null);

$categoriesRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoriesRepo->findBy(array('id' => $idCategoria));

$nomeCategoria = '';
$criacaoCategoria = '';
$modificacaoCategoria = '';

foreach ($categoriesResult as $categorie)
{
	$nomeCategoria = $categorie->getName();
	$criacaoCategoria = $categorie->getCreated();
	$modificacaoCategoria = $categorie->getModified();
}

$categoria->setName($nomeCategoria);
$categoria->setCreated($criacaoCategoria);
$categoria->setModified($modificacaoCategoria);
$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);

$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated(date("Y/m/d H:i:s"));



?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de SubCategoria:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">SubCategoria Cadastrada:</h1>
		
<?php $subCategoria->ToString();
$entityManager->merge($subCategoria);

$entityManager->flush();
?>

	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
