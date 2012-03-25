<?php

require_once "../../bootstrap.php";

$nomeCategoria = $_POST['nomeCategoria'];
$nomeSubCategoria = $_POST['nomeSubCategoria'];

$categoria = new Categories();

$categoriesRepo = $entityManager->getRepository("Categories");
$categories = $categoriesRepo->findBy(array ('name' => $nomeCategoria ));

$categoryId = 0;
$createdId = '';
foreach ($categories as $category){
	$categoryId = $category->getId();
	$createdId = $category->getCreated();
}

$subCategoria = new Sub_Categories($categoryId, $nomeSubCategoria);
$subCategoria->setCategoryId($categoryId);
$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated(date("Y/m/d H:i:s"));


$entityManager->persist($subCategoria);

/* TODO Gustavo: Verificar este erro:
 * 
 * Fatal error: Uncaught exception 'Doctrine\ORM\ORMException' with message 'Found entity of type on association SubCategories#categoryId, but expecting Categories' in D:\Projetos\Web\Finance-37571\Doctrine\ORM\UnitOfWork.php on line 711
( ! ) Doctrine\ORM\ORMException: Found entity of type on association SubCategories#categoryId, but expecting Categories in D:\Projetos\Web\Finance-37571\Doctrine\ORM\UnitOfWork.php on line 711
 */

$entityManager->flush();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Conta:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Conta Cadastrada:</h1>
		


	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
