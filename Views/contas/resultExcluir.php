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
$idConta = $_POST['idConta'];

// Instanciando as classes
$conta = new Accounts($idConta, null);
$pageMaker = new PageMaker();

// Fun��es do Doctrine
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
			// Fun��es do Doctrine e exclus�o do registro
				
			$conta->setId($idConta);
			
			$conta->setName($nomeConta);
			$conta->setCreated($dataCriacao);
			$conta->setModified($dataModificacao);

			$entityManager->remove($accountsResult);
			$entityManager->flush();
			?>
			<h1>Conta exclu�da!</h1>
				
	
			<?php 
			echo $conta;
			?>
	
		</form>
	

	</body>
		<?php $pageMaker->printFooter();?>
</html>
