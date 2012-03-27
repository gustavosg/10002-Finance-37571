<?php

require_once '../../bootstrap.php';

$conta = new Accounts();

$accountRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountRepo->findAll();

$functionsAccounts = new FunctionsAccounts();

?>

<html>

	<head>
		<title>Finance-37571: Edi��o de Conta:</title>
		<script type="text/javascript" src="../../functions/functions.js"></script>
	</head>

	<body>
	<form action="editarConta.php" method="post">
		<h1 align="center">Sele��o de conta para edi��o:</h1>
		
		<table align="center" border="2" style="table-layout: auto; position: static; float: inherit;">
			<tr>
				<td>Sele��o:</td>
				<td width="50px">ID:</td>
				<td width="150px">Conta:</td>
			</tr>

			<?php // $functionsAccounts->listarContasEdicao($accountsResult);?>
			
			<?php foreach ($accountsResult as $account)
		{
			echo "<tr>";
			echo "<td> <input type=RADIO name='nomeConta' value='".$account->getName()."'></td>";
			echo "<td>".$account->getId()."</td>";
			echo "<td>". $account->getName(). "</td>";
			echo "</tr>";
		}?>
			
		</table>
	<p align="center">
		<button type="submit" value="submit" name="Alterar"	>Alterar</button>
	
	</p>
	</form>
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>