<?php

require_once '../../bootstrap.php';

$contaSelecionada = $_POST['NomeConta'];

$conta = new Accounts();

$accountRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountRepo->findAll();

$functionsAccounts = new FunctionsAccounts();

?>

<html>

	<head>
		<title>Finance-37571: Edição de Conta:</title>
	</head>

	<body>
	<form action="editarConta.php">
		<h1 align="center">Edição de Conta:</h1>
		

	
	</form>
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>