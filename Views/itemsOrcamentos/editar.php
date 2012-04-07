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
* Nome:        editar.php
* Descri��o:   Clase para selecionar item de or�amento � editar
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

$itemOrcamento = new Budget_Records();

$budgetRecordsRepo = $entityManager->getRepository("Budget_Records");
$budgetRecordsResult = $budgetRecordsRepo->findAll();

// 
$functionsBudget_Records = new FunctionsBudget_Records();

$pageMaker = new PageMaker();

?>

<html>

	<head>
		<title>Finance-37571: Edi��o de Conta:</title>
		<script type="text/javascript" src="../../functions/functions.js"></script>
	</head>

	<body>
	<form action="editarItemOrcamento.php" method="post">
		<h1 align="center">Sele��o de item de or�amento para edi��o:</h1>
		
		<table align="center" border="2" style="table-layout: auto; position: static; float: inherit;">
			<tr>
				<td>Sele��o:</td>
				<td width="50px">ID:</td>
				<td width="150px">Quantia:</td>
				<td width="150px">Data de Cria��o:</td>
			</tr>

			<?php  $functionsBudget_Records->listarItemsOrcamentoEdicao($budgetRecordsResult);?>
						
		</table>
	<p align="center">
		<button type="submit" value="submit" name="Alterar"	>Alterar</button>
	
	</p>
	</form>
	</body>
	<?php 
	$pageMaker->printFooter();
	?>

</html>