<?php

require_once "../../bootstrap.php";

$nomeItemOrcamento = $_POST['nomeItemOrcamento'];

$itemOrcamento = new BudgetRecords();
$itemOrcamento->setName($nomeItemOrcamento);
$conta->setCreated(date("Y-m-d H:i:s"));

$entityManager->persist($conta);
$entityManager->flush();

$postRepo = $entityManager->getRepository("Accounts");
$posts = $postRepo->findAll();

function exibirRegistro($post){
	foreach ($post as $conta)
	{
		echo $conta->ToString();
	}
}
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
		
<?php exibirRegistro($posts);?>

	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
