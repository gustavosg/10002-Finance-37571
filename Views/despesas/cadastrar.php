<?php 
/*------------------------------------------------------------------------------------------------------------------------
* DADOS DO SISTEMA
* ------------------------------------------------------------------------------------------------------------------------
* Nome:		Finance-37571
* �rea:		Finan�as
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DA APLICA��O
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        SQL
* Descri��o:   Respons�vel pelo retorno e grava��o de dados no Banco de Dados, tabela Account
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DO ARQUIVO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        cadastrar.php
* Descri��o:   tela para inserir informa��es de categories
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Instancia de classes
$conta = new Accounts();
$subCategoria = new Sub_Categories();
$functionsExpenditures = new FunctionsExpenditures();
$functionsSub_Categories = new FunctionsSub_Categories();
$functionsAccounts = new FunctionsAccounts();
$pageMaker = new PageMaker();

// Fun��es do Doctrine
$accountRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountRepo->findAll();

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findAll();

?>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Despesas:</title>
</head>

<body>
<form action="resultCadastrar.php" name="form" method="post">
	<h1 align="center">Entre com as informa��es:</h1>
	<br>
	<p align="center">
		
		<table align="center" border='2'>
		
			<tr>
				<td>Sub-Categoria:</td>
				<td colspan="3">
					<select name="idSubCategoria">
					<option />
					<?php
					 $functionsSub_Categories->listarSubCategorias($subCategoriesResult);
					 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Conta: </td>
				<td colspan="3">
					<select name="nomeConta">
						<option />
						<?php $functionsAccounts->exibirListaSelectContas($accountsResult);?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Data: <font size="2" color="red">(formato: DD/MM/YYYY)</font></td>
				<td><input type="text" name="data" size="15px" /></td>
				<td>Hora: <font size="2" color="red">(formato: HH:MM)</font></td>
				<td><input type="text" name="hora" size="15px"  /></td>
			</tr>
			<tr>
				<td>Quantia:</td>
				<td colspan="3"><input type="text" name="quantia" size="15px" /></td>
			</tr>
			<tr>
				<td><label align="center">Descri��o da Despesa:</label></td>
				<td colspan="3"><textarea style="width: 400px; height: 200px;" name="descricaoDespesa" id="descricaoDespesa" > </textarea></td>
			</tr>
		</table>
	</p>
	<br>
	<p align="center">
		<button type="submit" value="submit" name="Enviar">Enviar</button>
	</p>
	</form>
</body>
	<?php 
	$pageMaker->printFooter();
	?>	
</html>
