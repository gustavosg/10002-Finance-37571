<?php
require_once '../../bootstrap.php';


$nomeSubCategoria = $_POST['nomeSubCategoria'];

$subCategoria = new Accounts(null, $nomeSubCategoria);


$accountRepo = $entityManager->getRepository("Sub_Categories");
$accounts = $accountRepo->findBy(array ('name' => $subCategoria->getName()));

// TODO Perguntar ao �talo porque n�o remove, sendo que a explica��o do site � a mesma:
// http://docs.doctrine-project.org/projects/doctrine-orm/en/2.0.x/reference/working-with-objects.html

$entityManager->remove($accounts);
$entityManager->flush();


?>

<html>
<head>
<title>Excluir subCategoria</title>
</head>
<body>

	<form action="">
		<h1>SubCategoria exclu�da:</h1>



	</form>

</body>
</html>
