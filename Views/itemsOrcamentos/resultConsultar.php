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
* Nome:        resultConsultar.php
* Descrição:   Mostra informações do item de orçamento selecionado
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// recuperando informações da tela anterior
$idItemOrcamento = $_POST['idItemOrcamento'];

// instancia de classes
$pageMaker = new PageMaker();
$functionsBudgetRecords = new FunctionsBudget_Records();

// funções do doctrine

$budgetRecordsRepo = $entityManager->getRepository("Budget_Records");
$budgetRecordsResult = $budgetRecordsRepo->findBy(array('id'=> $idItemOrcamento));

?>

<html>
	<head>
		<title>Informações do Orçamento:</title>
	</head>
	<body>
		<a href="../">Voltar para menu principal</a>
		<h1 align="center">Orçamento solicitado:</h1>
	
		<p align="center">
		<table border=2>
			<tr>
				<td>Id:</td>
				<td>Nome:</td>
				<td>Criado em:</td>
				<td>Modificado em:</td>
				<td>Informações sobre orçamento relacionado:</td>
				<td>Informações sobre a sub categoria relacionada:</td>
			</tr>
				<?php $functionsBudgetRecords->listarItemsOrcamentoTable($budgetRecordsResult);?>
		</table>
	</body>

	<?php $pageMaker->printFooter();?>

</html>