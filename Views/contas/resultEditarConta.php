<?php
require_once '../../bootstrap.php';

$idConta = $_POST['idConta'];
ECHO $idConta;
$nomeConta = $_POST['nomeConta'];
$contaCriada = $_POST['contaCriada'];
$contaModificada = date("Y/m/d H:i:s");

$conta = new Accounts($idConta, null);

$conta->setName($nomeConta);
$conta->setCreated($contaCriada);
$conta->setModified($contaModificada);

$entityManager->merge($conta);
$entityManager->flush();

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edição de Conta:</title>
	</head>
	<body>
	
		<h1 align="center">Edição de Conta:</h1>
		<p align="center" />
	
	
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>