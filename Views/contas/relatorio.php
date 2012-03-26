<?php
require_once '../../bootstrap.php';

$conta = new Accounts();

$repoAccount = $entityManager->getRepository("Accounts");
$accountsResult = $repoAccount->findAll();

$functionsAccounts = new FunctionsAccounts();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Relat�rio de Conta:</title>
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

		<?php $functionsAccounts->listarTodasContas($accountsResult); ?>
		</table>
</p>
	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
