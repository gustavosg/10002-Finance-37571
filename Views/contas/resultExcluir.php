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
* Descri��o:   Insere informa��es para Contas
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Capturando informa��es da tela anterior
$nomeConta = $_POST['nomeConta'];

// Instanciando as classes
$conta = new Accounts(null, $nomeConta);
$pageMaker = new PageMaker();

// Fun��es do Doctrine
$accountRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountRepo->findBy(array ('name' => $conta->getName()));

$idConta = 0;

foreach ($accountsResult as $account)
	$idConta = $account->getId();

$accountsResult = $accountRepo->find($idConta);

?>

<html>
	<head>
		<title>Excluir conta</title>
	</head>
	<body>

		<form action="">

			<?php 
			// Fun��es do Doctrine e exclus�o do registro
			$accountsRepo = $entityManager->getRepository("Accounts");
			$accountsResult = $accountsRepo->findBy(array ('name' => $conta->getName()));
				
			foreach ($accountsResult as $accounts)
			{
				$idConta = $accounts->getId();
				$nomeConta = $accounts->getName();
				$dataCriacao = $accounts->getCreated();
				$dataModificacao = $accounts->getModified();
			}
			
			$conta->setId($idConta);
			$conta->setName($nomeConta);
			$conta->setCreated($dataCriacao);
			$conta->setModified($dataModificacao);
				
			$accountsResult = $accountsRepo->find($idConta);
				
			$entityManager->remove($accountsResult);
			$entityManager->flush();
			?>
		<h1>Conta exclu�da!</h1>
	
			<?php 
			echo $conta;
			?>
	
		</form>
	
	<?php $pageMaker->printFooter();?>
	</body>
</html>
