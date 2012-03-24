<?php
require_once '../../bootstrap.php';

$conta = new Accounts();

$repoAccount = $entityManager->getRepository("Accounts");
$selectAccount = $repoAccount->findAll();



function listarTodasContas($accounts){

	foreach ($accounts as $account)
	{
		echo "<tr>";
		echo "<td>".$account->getId()."</td>";
		echo "<td>". $account->getName(). "</td>";
		echo "<td>". $account->getCreated() . "</td>";
		echo "<td>". $account->getModified(). "</td>";
		echo "</tr>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Relatório de Conta:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Contas que foram cadastradas:</h1>
		<br>
		<p align="center">
		<table border=1 align=center>
			<tr>
			<td>ID: </td>
			<td>Nome:</td>
			<td>Criado em:</td>
			<td>Modificado em:</td>
			</tr>

		<?php listarTodasContas($selectAccount); ?>
		</table>
</p>
	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
