<?php 
require_once '../../bootstrap.php';

$orcamento = new Budgets();

$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findAll();

function listarTodosOrcamentos($budgetsResult){
	
	foreach ($budgetsResult as $budget)
	echo "<tr>";
	echo "<td>".$budget->getId()."</td>";
	echo "<td>". $budget->getName(). "</td>";
	echo "<td>". $budget->getCreated() . "</td>";
	echo "<td>". $budget->getModified(). "</td>";
	echo "</tr>";
}

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Orçamentos:</title>
</head>

<body>
<form action="" name="form" method="post">
<button onclick="history.back()" >Voltar</button>

	<h1 align="center">Orçamentos que foram cadastrados:</h1>
	<br>
<table border=1 align=center>
			<tr>
			<td>ID: </td>
			<td>Nome:</td>
			<td>Criado em:</td>
			<td>Modificado em:</td>
			</tr>

		<?php listarTodosOrcamentos($budgetsResult); ?>
		</table>


	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
