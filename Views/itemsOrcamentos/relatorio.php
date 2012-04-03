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
* Nome:        relatorio.php
* Descri��o:   Relat�rio de BudgetRecords
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// instancia de classes
$pageMaker = new PageMaker();
$functionsBudgetRecords = new FunctionsBudget_Records();

// fun��es do doctrine

$budgetRecordsRepo = $entityManager->getRepository("Budget_Records");
$budgetRecordsResult = $budgetRecordsRepo->findAll();

?>

<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Relat�rio de Items no Or�amento:</title>
	</head>

	<body>
		<a href="../">Voltar para menu principal</a>
			<h1 align="center">Items no or�amento que foram cadastrados:</h1>

	<p align="center">
			
			<table border=2>
			
			<tr>
				<td>ID: </td>
				<td>Quantia:</td>
				<td>Data de cria��o:</td>
				<td>Data de modifica��o:</td>
				<td>Informa��es sobre or�amento relacionado:</td>
				<td>Informa��es sobre a sub categoria relacionada:</td>
			</tr>

				<?php 
				$functionsBudgetRecords->listarItemsOrcamentoTable($budgetRecordsResult);
				?>			
			
			</table>
		</p>
	</body>
	<?php 
		$pageMaker->printFooter();
	?>

</html>
