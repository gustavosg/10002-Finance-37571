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
* Descri��o:   Remove informa��es de Budgets
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Declara��o de vari�veis
$idOrcamento = 0;
$nomeOrcamento ;
$dataCriacao ;
$dataModificacao; 

// Capturando informa��es da tela anterior
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
			
			// Fun��es do Doctrine e exclus�o do registro
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
			<h1>Orcamento exclu�do:</h1>
			<?php 
			
			echo $orcamento;
			?>
		</form>
	
	</body>
	<?php $pageMaker->printFooter();?>
</html>
