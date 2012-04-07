<?php
/*------------------------------------------------------------------------------------------------------------------------
* DADOS DO SISTEMA
* ------------------------------------------------------------------------------------------------------------------------
* Nome:		Finance-37571
* Área:		Finanças
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DA APLICAÇÃO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        SQL
* Descrição:   Responsável pelo retorno e gravação de dados no Banco de Dados, tabela Account
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DO ARQUIVO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        editar.php
* Descrição:   Clase para selecionar item de orçamento à editar
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
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
		<title>Finance-37571: Edição de Conta:</title>
		<script type="text/javascript" src="../../functions/functions.js"></script>
	</head>

	<body>
	<form action="editarItemOrcamento.php" method="post">
		<h1 align="center">Seleção de item de orçamento para edição:</h1>
		
		<table align="center" border="2" style="table-layout: auto; position: static; float: inherit;">
			<tr>
				<td>Seleção:</td>
				<td width="50px">ID:</td>
				<td width="150px">Quantia:</td>
				<td width="150px">Data de Criação:</td>
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