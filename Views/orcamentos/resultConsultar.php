<?php

require_once "../../bootstrap.php";

$nomeOrcamento = $_POST["nomeOrcamento"];

$orcamento = new Budgets($nomeOrcamento);

$budgetsRepo = $entityManager->getRepository("budgets");
$budgets = $budgetsRepo->findBy(array ('name' => $orcamento->getName()));

function listarOrcamentos($budgets){
	foreach ($budgets as $budget)
		exibirRegistrosOrcamento($budget);
}

function exibirRegistrosOrcamento($budget){
	echo "Informa��es do orcamento: <br />";
	echo "Id do orcamento: ".$budget->getId(). "<br />";
	echo "Nome : ". $budget->getName(). "<br />";
	echo "Criado em: ". $budget->getCreated() . "<br />";
	echo "Modificado em: ". $budget->getModified(). "<br />";
}

?>

<html>
	<head>
		<title>Informa��es do Or�amento:</title>
	</head>
	<body>
	<button onclick="history.back()" >Voltar</button>
	
		<h1 align="center">Or�amento solicitado:</h1>
			
		
		<?php listarOrcamentos($budgets);?>
		
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
	
</html>
