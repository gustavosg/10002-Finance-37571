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
* Nome:        resultConsultar.php
* Descri��o:   Mostra informa��es do item de or�amento selecionado
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// recuperando informa��es da tela anterior
$idItemOrcamento = $_POST['idItemOrcamento'];

// instancia de classes
$pageMaker = new PageMaker();
$functionsBudgetRecords = new FunctionsBudget_Records();

// fun��es do doctrine

$budgetRecordsRepo = $entityManager->getRepository("Budget_Records");
$budgetRecordsResult = $budgetRecordsRepo->findBy(array('id'=> $idItemOrcamento));

?>

<html>
	<head>
		<title>Informa��es do Or�amento:</title>
	</head>
	<body>
		<a href="../">Voltar para menu principal</a>
		<h1 align="center">Or�amento solicitado:</h1>
	
		<p align="center">
		<table border=2>
			<tr>
				<td>Id:</td>
				<td>Nome:</td>
				<td>Criado em:</td>
				<td>Modificado em:</td>
				<td>Informa��es sobre or�amento relacionado:</td>
				<td>Informa��es sobre a sub categoria relacionada:</td>
			</tr>
				<?php $functionsBudgetRecords->listarItemsOrcamentoTable($budgetRecordsResult);?>
		</table>
	</body>

	<?php $pageMaker->printFooter();?>

</html>