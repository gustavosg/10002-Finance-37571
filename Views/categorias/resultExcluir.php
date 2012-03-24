<?php
require_once '../../bootstrap.php';


$nomeCategoria = $_POST['nomeCategoria'];

$categoria = new Categories(null, $nomeCategoria);


$categorieRepo = $entityManager->getRepository("Categories");
$categories = $categorieRepo->findBy(array ('name' => $categoria->getName()));

// TODO Perguntar ao Ítalo porque não remove, sendo que a explicação do site é a mesma:
// http://docs.doctrine-project.org/projects/doctrine-orm/en/2.0.x/reference/working-with-objects.html

$entityManager->remove($categories);
$entityManager->flush();


?>

<html>
<head>
<title>Excluir categoria</title>
</head>
<body>

	<form action="">
		<h1>Categoria excluída:</h1>



	</form>

</body>
</html>
