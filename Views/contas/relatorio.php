<?php
require_once '../../bootstrap.php';

$conta = new Accounts();

$accountRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountRepo->findAll();

$functionsAccounts = new FunctionsAccounts();

?>

<html>
	<head>
		<title>Finance-37571: Relatório de Contas Cadastradas</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
		<h1 align="center">Relatório de Contas Cadastradas:</h1>
	
		<table align="center" border=2>
			<tr>
				<td>ID:</td>
				<td>Nome:</td>
				<td>Criada em:</td>
				<td>Modificada em:</td>
			</tr>
			
			<?php $functionsAccounts->listarTodasContas($accountsResult);?>
	
		</table>
	
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>
