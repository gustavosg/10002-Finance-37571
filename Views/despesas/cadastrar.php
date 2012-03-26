<?php 

require_once '../../bootstrap.php';

$subCategoria = new Sub_Categories();
$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findAll();

$conta = new Accounts();
$accountRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountRepo->findAll();


$functionsExpenditures = new FunctionsExpenditures();

$functionsAccounts = new FunctionsAccounts();



?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Despesas:</title>
</head>

<body>
<form action="resultCadastrar.php" name="form" method="post">
	<h1 align="center">Entre com as informações:</h1>
	<br>
	<p align="center">
		
		<table align="center" border='2'>
		
			<tr>
				<td>Sub-Categoria:</td>
				<td>
					<select name="SubCategoria">
					<option />
					<?php $functionsExpenditures->exibirListaSubCategorias($subCategoriesResult);?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Conta: </td>
				<td>
					<select name="Conta">
						<option />
						<?php $functionsAccounts->exibirListaSelectContas($accountsResult);?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Data:</td>
				<td><input type="text" name="Data" size="15px" /></td>
			</tr>
			<tr>
				<td>Quantia:</td>
				<td><input type="text" name="Quantia" size="15px" /></td>
			</tr>
			<tr>
				<td><label align="center">Descrição da Despesa:</label></td>
				<td><textarea maxlength="50" style="width: 400px; height: 200px;" name="nomeDespesas" id="nomeDespesas" > </textarea></td>
			</tr>
		</table>
	</p>
	<br>
	<p align="center">
		<button type="submit" value="submit" name="Enviar">Enviar</button>

		<button type="button" value="Limpar" name="Limpar" onclick="limparCamposDespesas()">Limpar</button>
		<br>
	</p>
	</form>
</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>
</html>
