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
* Nome:        resultEditarItemOrcamento.php
* Descrição:   Classe para executar resultado de edição de ItemOrcamento
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Definição de variáveis

// Para orçamento:
$nomeOrcamento = '';
$dataCriacaoOrcamento = '';
$dataModificacaoOrcamento = '';

// Para SubCategoria
$nomeSubCategoria = '';
$dataCriacaoSubCategoria = '';
$dataModificacaoSubCategoria = '';

$categoria = new Categories();

// Capturando informações da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$idOrcamento = $_POST['idOrcamento'];
$quantia = $_POST['quantiaItemOrcamento'];
$idItemOrcamento = $_POST['idItemOrcamento'];
$itemOrcamentoCriada = $_POST['itemOrcamentoCriada'];
$itemOrcamentoModificada = date("Y/m/d H:i:s");

// Funções do doctrine, obtendo informações do banco de dados sobre qual entidade relacionar.
$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findBy(array ('id' => $idOrcamento));

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findBy(array('id'=> $idSubCategoria));

foreach ($budgetsResult as $result)
$nomeOrcamento = $result->getName();

foreach ($subCategoriesResult as $result){
	$nomeSubCategoria = $result->getName();
	$dataCriacaoSubCategoria = $result->getCreated();
	$dataModificacaoSubCategoria = $result->getModified();
	$categoria= $result->getCategory();
}

// Instancia de classes e definição de valores
$orcamento = new Budgets($idOrcamento, $nomeOrcamento);
$pageMaker  = new PageMaker();

$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findBy(array('id' => $idOrcamento));

foreach ($budgetsResult as $result){
	$dataCriacaoOrcamento = $result->getCreated();
	$dataModificacaoOrcamento = $result->getModified();
}

$orcamento->setCreated($dataCriacaoOrcamento);
$orcamento->setModified($dataModificacaoOrcamento);

$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);

$subCategoria->setId($idSubCategoria);
$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($dataCriacaoSubCategoria);
$subCategoria->setModified($dataModificacaoSubCategoria);

$itemOrcamento = new Budget_Records($orcamento, $subCategoria);

$budgetRecordsRepo = $entityManager->getRepository("Budget_Records");

$itemOrcamento->setId($idItemOrcamento);
$itemOrcamento->setAmmount($quantia);
$itemOrcamento->setBudget($orcamento);
$itemOrcamento->setSubCategory($subCategoria);

$itemOrcamento->setCreated($itemOrcamentoCriada);
$itemOrcamento->setModified($itemOrcamentoModificada);

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edição de ItemOrcamento:</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
	
		<h1 align="center">Edição de ItemOrcamento:</h1>
		<p align="center" />
	
	<?php 
	
	echo $itemOrcamento;
	$entityManager->merge($itemOrcamento);
	$entityManager->flush();
	
	?>
	
	</body>
	<?php 
	$pageMaker->printFooter();
	?>

</html>