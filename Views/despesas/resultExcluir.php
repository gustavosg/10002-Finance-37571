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
* Descri��o:   Remove informa��es de Despesa
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// ------------------------------------------------------------------------------------------------------------------------

// Declara��o de vari�veis

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

// Capturando informa��es da tela anterior
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
			// Fun��es do Doctrine e exclus�o do registro
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
			<h1 align="center">Item de despesa exclu�do:</h1>
			<?php 
			echo $despesa;
			?>
		</form>
	
	</body>
	<?php $pageMaker->printFooter();?>
</html>