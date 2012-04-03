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
* Nome:        consultar.php
* Descri��o:   Tela para pesquisa de items no or�amento
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// instancia de classes
$pageMaker = new PageMaker();
$functionsBudgetRecords = new FunctionsBudget_Records();

// Fun��es do Doctrine
$budgetRecordsRepo  = $entityManager->getRepository("Budget_Records");
$budgetRecordsResult = $budgetRecordsRepo->findAll();



?>

<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Consultar Items no Or�amento:</title>
	</head>
	<body>
		<form action="resultConsultar.php" name="form" method="post">
			<h1 align="center">Entre com as informa��es:</h1>
			<br>
			<p align="center">
			<table border=2>
		
				<tr>
					<td><label align="center">Items de or�amentos:</label></td>
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