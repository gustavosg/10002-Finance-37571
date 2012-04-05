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
* Descri��o:   Relat�rio de Despesas
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// instancia de classes
$pageMaker = new PageMaker();
$functionsExpenditures = new FunctionsExpenditures();

// fun��es do doctrine

$expenditureRepo = $entityManager->getRepository("Expenditure");
$expenditureResult = $expenditureRepo->findAll();

?>

<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Relat�rio de Despesa:</title>
	</head>

	<body>
		<a href="../">Voltar para menu principal</a>
			<h1 align="center">Despesas que foram cadastradas:</h1>

	<p align="center">
			
			<table border=2>
			
			<tr>
				<td>ID: </td>
				<td>Quantia:</td>
				<td>Data:</td>
				<td>Data de cria��o:</td>
				<td>Data de modifica��o:</td>
				<td>Descri��o:</td>
				<td>Informa��es sobre conta relacionada:</td>
				<td>Informa��es sobre a sub categoria relacionada:</td>
			</tr>

				<?php 
				$functionsExpenditures->listarDespesasTable($expenditureResult);
				?>			
			
			</table>
		</p>
	</body>
	<?php 
		$pageMaker->printFooter();
	?>

</html>
