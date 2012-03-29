<?php
require_once '../../bootstrap.php';

$categoria = new Categories();

$nomeSubCategoria = $_POST['nomeSubCategoria'];

$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findBy(array ('name' => $subCategoria->getName()));

$idSubCategoria = 0;

foreach ($subCategoriesResult as $subCategories){
	$idSubCategoria = $subCategories->getId();
	$subCategoriesResult = $subCategoriesRepo->find($idSubCategoria);
	$entityManager->remove($subCategoriesResult);
	
}
$entityManager->flush();


?>

<html>
<head>
<title>Excluir subCategoria</title>
</head>
<body>

	<form action="">
		<h1>SubCategoria excluída!</h1>

	</form>

</body>
</html>
