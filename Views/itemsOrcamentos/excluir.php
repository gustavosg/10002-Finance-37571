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
* Nome:        excluir.php
* Descri��o:   Exclui informa��es de items de or�amento
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Instanciando classes
$functionsBudgetRecords = new FunctionsBudget_Records();
$pageMaker = new PageMaker();

// Fun��es do Doctrine
$budgetRecordsRepo  = $entityManager->getRepository("Budget_Records");
$budgetRecordsResult = $budgetRecordsRepo->findAll();


?>

<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Excluir Items de um Or�amento:</title>
</head>

<body>
<form action="resultExcluir.php" name="form" method="post">
	<h1 align="center">Items � Excluir:</h1>
	<p align="center">
		<table border=2>
		
		<tr>
			<td><label align="center">Items de or�amentos:</label></td>
			<td>
			<select>
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
		<button type="submit" value="submit" name="Enviar"
			>Enviar</button>

	</p>
	</form>
</body>
<?php 

$pageMaker->printFooter();
?>
</html>
