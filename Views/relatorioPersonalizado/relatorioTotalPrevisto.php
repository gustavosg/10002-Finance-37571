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
* Descri��o:   Relat�rio de Total Previsto
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Declara��o de vari�veis
$ammount= 0;

// instancia de classes
$pageMaker = new PageMaker();
$functionsBudgetRecords = new FunctionsBudget_Records();

// fun��es do doctrine - Query Personalizada

$query = "SELECT SUM(br.ammount) FROM budget_Records br";
$executeQuery = $entityManager->createQuery($query);
$totalPrevisto = $executeQuery->getResult();

$valor = 0;

foreach ($totalPrevisto as $result)
	$valor = $result[1];

?>

<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Relat�rio de Despesa:</title>
	</head>

	<body>
		<a href="../">Voltar para menu principal</a>
			<h1 align="center">Total previsto:</h1>
	<p align="center">
			<table border=2>
			<tr>
				<td>Valor Total: </td>
				<td>R$ : <?php echo $valor?></td>
			</tr>
			</table>
		</p>
	</body>
	<?php 
		$pageMaker->printFooter();
	?>
</html>