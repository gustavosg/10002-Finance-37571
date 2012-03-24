<?php

require_once "../../bootstrap.php";

$nomeConta = $_POST['nomeConta'];

echo $nomeConta;
$conta = new Accounts();

$postRepo = $entityManager->getRepository("Accounts");

$posts = $postRepo->findBy(array ('id' => $conta->getId()));
print_r($posts);
listarContas($posts);

function listarContas($posts){

	foreach ($posts as $contas){
		exibirRegistrosConta($contas);
	}
}


function exibirRegistrosConta($post){
	print_r($post);
	echo "Informações da conta: ". $post->getId();
	foreach ($post as $conta){
		$conta->getId();
		$conta->getName();
		$conta->getCreated();
		$conta->getModified();
	}
}


?>


<html>

<head>

<title>Informações da Conta:</title>
</head>
<body>

</body>
</html>
