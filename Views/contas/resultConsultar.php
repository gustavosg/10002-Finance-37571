<?php

require_once "../../bootstrap.php";

$nomeConta = $_POST['nomeConta'];

$conta = new Accounts(null, $nomeConta);

$postRepo = $entityManager->getRepository("accounts");

$posts = $postRepo->findBy(array ('name' => $conta->getName()));

listarContas($posts);

function listarContas($posts){

	foreach ($posts as $post){
		exibirRegistrosConta($post);
	}
}

$conta->getCreated();

function exibirRegistrosConta($post){
	echo "Informações da conta: <br />";
	echo "Id da conta: ".$post->getId(). "<br />";
	echo "Nome : ". $post->getName(). "<br />";
	
	// TODO Data
	echo "Criado em: ". $post->getCreatedToString($post->getCreated()) . "<br />";
	echo "Modificado em: ". $post->getCreatedToString($post->getModified()). "<br />";
}

?>


<html>

<head>

<title>Informações da Conta:</title>
</head>
<body>

</body>
</html>
