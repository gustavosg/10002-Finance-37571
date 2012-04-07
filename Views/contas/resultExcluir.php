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
$idConta = $_POST['idConta'];

// Instanciando as classes
$conta = new Accounts($idConta, null);
$pageMaker = new PageMaker();

// Funções do Doctrine
$accountRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountRepo->findBy(array ('id' => $conta->getId()));

$idConta = 0;
$nomeConta = '';
$dataCriacao = '';
$dataModificacao = '';
foreach ($accountsResult as $account)
{
	$idConta = $account->getId();
	$nomeConta = $account->getName();
	$dataCriacao = $account->getCreated();
	$dataModificacao = $account->getModified();
}


$accountsResult = $accountRepo->find($idConta);

?>

<html>
	<head>
		<title>Excluir conta</title>
	</head>
	<body>

		<form action="">
			<a href="../">Voltar para menu principal</a>
			<?php 
			// Funções do Doctrine e exclusão do registro
				
			$conta->setId($idConta);
			
			$conta->setName($nomeConta);
			$conta->setCreated($dataCriacao);
			$conta->setModified($dataModificacao);

			$entityManager->remove($accountsResult);
			$entityManager->flush();
			?>
			<h1>Conta excluída!</h1>
				
	
			<?php 
			echo $conta;
			?>
	
		</form>
	

	</body>
		<?php $pageMaker->printFooter();?>
</html>
