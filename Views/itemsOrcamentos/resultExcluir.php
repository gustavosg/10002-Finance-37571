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
* Nome:        resultExcluir.php
* Descri��o:   Remove informa��es de BudgetRecords
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Declara��o de vari�veis
$nomeOrcamento = '';
$quantia = '';
$dataCriacao = '';
$dataModificacao = '';

// Capturando informa��es da tela anterior
$idItemOrcamento = $_POST['idItemOrcamento'];

// Instanciando as Classes
$itemOrcamento = new Budget_Records();
$pageMaker = new PageMaker();
?>

<html>
	<head>
		<title>Excluir categoria</title>
	</head>
	<body>
		<form action="">

			<?php 
			// Fun��es do Doctrine e exclus�o do registro
			$budgetRecordsRepo = $entityManager->getRepository("Budget_Records");
			$budgetRecordsResult= $budgetRecordsRepo->findBy(array('id' => $idItemOrcamento));
			
			foreach ($budgetRecordsResult as $result)
			{
				$dataCriacao = $result->getCreated();
				$dataModificacao = $result->getModified();
				$quantia = $result->getAmmount();
			}
			
			$itemOrcamento->setId($idItemOrcamento);
			$itemOrcamento->setCreated($dataCriacao);
			$itemOrcamento->setModified($dataModificacao);
			$itemOrcamento->setAmmount($quantia);
			
			$budgetRecordsResult= $budgetRecordsRepo->find($idItemOrcamento);
			
			//print_r($budgetRecordsResult);
			$entityManager->remove($budgetRecordsResult);
			$entityManager->flush();
			
			?>
			<h1>Item do orcamento exclu�do:</h1>
			<?php 
			echo $itemOrcamento;
			?>
		</form>
	
	</body>
	<?php $pageMaker->printFooter();?>
</html>