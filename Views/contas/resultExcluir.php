<?php
require_once '../../bootstrap.php';


$nomeConta = $_POST['nomeConta'];

$conta = new Accounts(null, $nomeConta);


$accountRepo = $entityManager->getRepository("Accounts");
$accounts = $accountRepo->findBy(array ('name' => $conta->getName()));

// TODO Perguntar ao �talo porque n�o remove, sendo que a explica��o do site � a mesma:
// http://docs.doctrine-project.org/projects/doctrine-orm/en/2.0.x/reference/working-with-objects.html

$entityManager->remove($accounts);
$entityManager->flush();


?>

<html>
<head>
<title>Excluir conta</title>
</head>
<body>

	<form action="">
		<h1>Conta exclu�da:</h1>



	</form>

</body>
</html>
