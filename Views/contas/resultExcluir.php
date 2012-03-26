<?php
require_once '../../bootstrap.php';


$nomeConta = $_POST['nomeConta'];

$conta = new Accounts(null, $nomeConta);


$accountRepo = $entityManager->getRepository("Accounts");
$accounts = $accountRepo->findBy(array ('name' => $conta->getName()));

// TODO Perguntar ao Ítalo porque não remove via entidade, e somente pelo ID, sendo que a explicação do site é a mesma:
// http://docs.doctrine-project.org/projects/doctrine-orm/en/2.0.x/reference/working-with-objects.html

$idConta = 0;

foreach ($accounts as $account)
	$idConta = $account->getId();

echo $idConta;




?>

<html>
<head>
<title>Excluir conta</title>
</head>
<body>

	<form action="">
		<h1>Conta excluída:</h1>

<?php 

// TODO Gustavo nhaca do caralho, porque não imprime!
echo $conta->ToString();

$accounts = $accountRepo->find($idConta);
$entityManager->remove($accounts);
$entityManager->flush();
?>


	</form>

</body>
</html>
