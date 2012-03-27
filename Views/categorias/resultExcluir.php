<?php
require_once '../../bootstrap.php';

$nomeCategoria = $_POST['nomeCategoria'];

$categoria = new Categories(null, $nomeCategoria);
print_r($categoria);
$categorieRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categorieRepo->findBy(array ('name' => $categoria->getName()));

// TODO Perguntar ao �talo porque n�o remove, sendo que a explica��o do site � a mesma:
// http://docs.doctrine-project.org/projects/doctrine-orm/en/2.0.x/reference/working-with-objects.html

$idCategoria = 0;

foreach ($categoriesResult as $categorie)
	$idCategoria = $categorie->getId();

$categoriesResult = $categorieRepo->find($idCategoria);

?>

<html>
<head>
<title>Excluir categoria</title>
</head>
<body>

	<form action="">
		<h1>Categoria exclu�da!</h1>

<?php 

// TODO Gustavo nhaca do caralho, porque n�o imprime!
//echo $conta->ToString();

$entityManager->remove($categoriesResult);
$entityManager->flush();
?>

	</form>

</body>
</html>
