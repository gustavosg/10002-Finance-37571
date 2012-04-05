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
* Descrição:   Remove informações de Despesa
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// ------------------------------------------------------------------------------------------------------------------------

// Declaração de variáveis

// Para Despesa
$quantia = '';
$data = '';
$dataCriacao = '';
$dataModificacao = '';
$descricaoDespesa = '';

// Para SubCategorias
$idSubCategoria = 0;

// Para Contas
$idConta = 0;

// ------------------------------------------------------------------------------------------------------------------------

// Capturando informações da tela anterior
$idDespesa = $_POST['idDespesa'];

// ------------------------------------------------------------------------------------------------------------------------

// Instanciando as Classes
$subCategoria = new Sub_Categories();
$conta = new Accounts();
$pageMaker = new PageMaker();

?>

<html>
	<head>
		<title>Excluir Despesa</title>
	</head>
	<body>
		<a href="../">Voltar para menu principal</a>
		<form action="">
			<?php 
			// Funções do Doctrine e exclusão do registro
			$expenditureRepo = $entityManager->getRepository("Expenditure");
			$expenditureResult= $expenditureRepo->findBy(array('id' => $idDespesa));
			
			foreach ($expenditureResult as $result)
			{
				$dataCriacao = $result->getCreated();
				$dataModificacao = $result->getModified();
				$quantia = $result->getAmmount();
				$conta = $result->getAccount();
				$subCategoria = $result->getSubCategory();
			}
			
			$despesa = new Expenditure($conta, $subCategoria);
			$despesa->setId($idDespesa);
			$despesa->setCreated($dataCriacao);
			$despesa->setModified($dataModificacao);
			$despesa->setAmmount($quantia);
			
			$expenditureResult= $expenditureRepo->find($idDespesa);

			$entityManager->remove($expenditureResult);
			$entityManager->flush();
			
			?>
			<h1 align="center">Item de despesa excluído:</h1>
			<?php 
			echo $despesa;
			?>
		</form>
	
	</body>
	<?php $pageMaker->printFooter();?>
</html>