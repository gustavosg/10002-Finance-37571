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
* Nome:        relatorio.php
* Descrição:   Relatório de Despesas
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// instancia de classes
$pageMaker = new PageMaker();
$functionsExpenditures = new FunctionsExpenditures();

// funções do doctrine

$expenditureRepo = $entityManager->getRepository("Expenditure");
$expenditureResult = $expenditureRepo->findAll();

?>

<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Relatório de Despesa:</title>
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
				<td>Data de criação:</td>
				<td>Data de modificação:</td>
				<td>Descrição:</td>
				<td>Informações sobre conta relacionada:</td>
				<td>Informações sobre a sub categoria relacionada:</td>
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
