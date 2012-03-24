<?php 

require_once "../../bootstrap.php";

$nomeConta = $_POST['nomeConta'];

$conta = new Accounts();
$conta->setName($nomeConta);

$entityManager->persist($conta);
$entityManager->flush();

$postRepo = $entityManager->getRepository("Accounts");
$posts = $postRepo->findAll();

echo $posts;


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
