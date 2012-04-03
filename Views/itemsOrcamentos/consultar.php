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
* Nome:        consultar.php
* Descrição:   Tela para pesquisa de items no orçamento
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// instancia de classes
$pageMaker = new PageMaker();
$functionsBudgetRecords = new FunctionsBudget_Records();

// Funções do Doctrine
$budgetRecordsRepo  = $entityManager->getRepository("Budget_Records");
$budgetRecordsResult = $budgetRecordsRepo->findAll();



?>

<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Consultar Items no Orçamento:</title>
	</head>
	<body>
		<form action="resultConsultar.php" name="form" method="post">
			<h1 align="center">Entre com as informações:</h1>
			<br>
			<p align="center">
			<table border=2>
		
				<tr>
					<td><label align="center">Items de orçamentos:</label></td>
					<td>
					<select name="idItemOrcamento">
						<option />
					<?php
					$functionsBudgetRecords->listarItemsOrcamentosSelect($budgetRecordsResult);
					?>
					</select>
					</td>
				</tr>
		
			</table>
			</p>
			<p align="center">
				<button type="submit" value="submit" name="Enviar">Enviar</button>
			</p>
		</form>
	</body>
		<?php 
		$pageMaker->printFooter();
		?>
</html>