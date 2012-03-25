<?php

require_once "../../bootstrap.php";

$nomeOrcamento = $_POST['nomeOrcamento'];

$orcamento = new Budgets();
$orcamento->setName($nomeOrcamento);
$orcamento->setCreated(date("Y-m-d H:i:s"));

$entityManager->persist($orcamento);
$entityManager->flush();

$budgetsRepo = $entityManager->getRepository("Budgets");
$posts = $budgetsRepo->findAll();

function exibirRegistro($post){
	foreach ($post as $orcamento)
	{
		echo $orcamento->ToString();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Orcamento:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Orcamento Cadastrada:</h1>
		
<?php exibirRegistro($posts);?>

	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
