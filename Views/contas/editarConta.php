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
		<title>Finance-37571: Edi��o de Conta:</title>
	</head>

	<body>
	<form action="editarConta.php">
		<h1 align="center">Edi��o de Conta:</h1>
		

	
	</form>
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>