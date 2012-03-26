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

function exibirRegistrosConta($post){
	echo "Informações da conta: <br />";
	echo "Id da conta: ".$post->getId(). "<br />";
	echo "Nome : ". $post->getName(). "<br />";
	echo "Criado em: ". $post->getCreated() . "<br />";
	echo "Modificado em: ". $post->getModified(). "<br />";
}

?>


<html>

<head>

<title>Informações da Conta:</title>
</head>
<body>

<button onclick="javascript:history.go(-1)">Voltar</button>

</body>
</html>
