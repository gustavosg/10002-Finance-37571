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
* Nome:        resultCadastrar.php
* Descri��o:   Insere informa��es para BudgetRecords
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once "../../bootstrap.php";

// Defini��o de vari�veis

// Para or�amento:
$nomeOrcamento = '';
$dataCriacaoOrcamento = '';
$dataModificacaoOrcamento = '';

// Para SubCategoria
$nomeSubCategoria = '';
$dataCriacaoSubCategoria = '';
$dataModificacaoSubCategoria = '';


$categoria = new Categories();


// Capturando informa��es da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$idOrcamento = $_POST['idOrcamento'];
$quantia = $_POST['Quantia'];

// Fun��es do doctrine, obtendo informa��es do banco de dados sobre qual entidade relacionar.
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

// Instancia de classes e defini��o de valores
$orcamento = new Budgets($idOrcamento, $nomeOrcamento);

$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findBy(array('id' => $idOrcamento));

foreach ($budgetsResult as $result){
	$dataCriacaoOrcamento = $result->getCreated();
	$dataModificacaoOrcamento = $result->getModified();
}

$orcamento->setCreated($dataCriacaoOrcamento);
$orcamento->setModified($dataModificacaoOrcamento);

$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);
$pageMaker  = new PageMaker();

$subCategoria->setId($idSubCategoria);
$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($dataCriacaoSubCategoria);
$subCategoria->setModified($dataModificacaoSubCategoria);

$itemOrcamento = new Budget_Records($orcamento, $subCategoria);

$itemOrcamento->setAmmount($quantia);
$itemOrcamento->setBudget($orcamento);
$itemOrcamento->setSubCategory($subCategoria);
$itemOrcamento->setCreated(date("Y/m/d H:i:s"));

?>
<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Cadastramento de Conta:</title>
	</head>

	<body>
	
	<a href="../">Voltar para menu principal</a>
		<form action="" name="form" method="post">
			<h1 align="center">Conta Cadastrada:</h1>
			
			<?php 
				echo $itemOrcamento;
				
				$entityManager->persist($itemOrcamento);
				$entityManager->flush();
			?>
	
		</form>
	</body>
	<?php $pageMaker->printFooter();?>
</html>
