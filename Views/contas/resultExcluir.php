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
* Descrição:   Insere informações para Contas
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Capturando informações da tela anterior
$nomeConta = $_POST['nomeConta'];

// Instanciando as classes
$conta = new Accounts(null, $nomeConta);
$pageMaker = new PageMaker();

// Funções do Doctrine
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
			// Funções do Doctrine e exclusão do registro
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
		<h1>Conta excluída!</h1>
	
			<?php 
			echo $conta;
			?>
	
		</form>
	
	<?php $pageMaker->printFooter();?>
	</body>
</html>
