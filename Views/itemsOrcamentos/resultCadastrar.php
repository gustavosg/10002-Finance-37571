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
* Nome:        resultCadastrar.php
* Descrição:   Insere informações para BudgetRecords
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once "../../bootstrap.php";

// Definição de variáveis
$nomeOrcamento = '';
$nomeSubCategoria = '';
$dataCriacao = '';
$dataModificacao = '';

// Capturando informações da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$idOrcamento = $_POST['idOrcamento'];
$quantia = $_POST['Quantia'];

// Funções do doctrine, obtendo informações do banco de dados sobre qual entidade relacionar.
$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findBy(array ('id' => $idOrcamento));

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findBy(array('id'=> $idSubCategoria));

foreach ($budgetsResult as $result)
	$nomeOrcamento = $result->getName();

foreach ($subCategoriesResult as $result){
	$nomeSubCategoria = $result->getName();
	$dataCriacao = $result->getCreated();
	$dataModificacao = $result->getModified();
}

// Instancia de classes

$orcamento = new Budgets($idOrcamento, $nomeOrcamento);
$subCategoria = new Sub_Categories(null, $nomeSubCategoria);
$pageMaker  = new PageMaker();

$subCategoria->setId($idSubCategoria);
$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($dataCriacao);
$subCategoria->setModified($dataModificacao);

$itemOrcamento = new Budget_Records($orcamento, $subCategoria);

// Definição de valores

$itemOrcamento->setAmmount($quantia);
$itemOrcamento->setBudget($orcamento);
$itemOrcamento->setSubCategory($subCategoria);
$itemOrcamento->setCreated(date("Y/m/d H:i:s"));

echo $itemOrcamento;

$entityManager->merge($itemOrcamento);
$entityManager->flush();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Conta:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Conta Cadastrada:</h1>
		
<?php 
// exibirRegistro($posts);
?>

	</form>
</body>
<?php $pageMaker->printFooter();?></html>
