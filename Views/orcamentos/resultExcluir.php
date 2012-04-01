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
* Descrição:   Remove informações de Budgets
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Declaração de variáveis
$idOrcamento = 0;
$nomeOrcamento ;
$dataCriacao ;
$dataModificacao; 

// Capturando informações da tela anterior
$nomeOrcamento = $_POST['nomeOrcamento'];

// Instanciando as Classes
$orcamento = new Budgets(null, $nomeOrcamento);
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
			$budgetsRepo = $entityManager->getRepository("Budgets");
			$budgetsResult = $budgetsRepo->findBy(array ('name' => $orcamento->getName()));
			
			foreach ($budgetsResult as $budgets)
			{
				$idOrcamento = $budgets->getId();
				$nomeOrcamento = $budgets->getName();
				$dataCriacao = $budgets->getCreated();
				$dataModificacao = $budgets->getModified();
			}
				
			$orcamento->setId($idOrcamento);
			$orcamento->setName($nomeOrcamento);
			$orcamento->setCreated($dataCriacao);
			$orcamento->setModified($dataModificacao);
			
			$budgetsResult = $budgetsRepo->find($idOrcamento);
			
			$entityManager->remove($budgetsResult);
			$entityManager->flush();
			
			?>
			<h1>Orcamento excluído:</h1>
			<?php 
			
			echo $orcamento;
			?>
		</form>
	
	</body>
	<?php $pageMaker->printFooter();?>
</html>
