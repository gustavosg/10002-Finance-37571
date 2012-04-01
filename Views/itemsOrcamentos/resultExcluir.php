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
* Nome:        resultExcluir.php
* Descrição:   Remove informações de BudgetRecords
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Declaração de variáveis
$nomeOrcamento = '';
$quantia = '';
$dataCriacao = '';
$dataModificacao = '';

// Capturando informações da tela anterior
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
			// Funções do Doctrine e exclusão do registro
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
			<h1>Item do orcamento excluído:</h1>
			<?php 
			echo $itemOrcamento;
			?>
		</form>
	
	</body>
	<?php $pageMaker->printFooter();?>
</html>