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
* Nome:        resultCadastrar.php
* Descri��o:   Classe de resultado do cadastramento de dados de conta
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once "../../bootstrap.php";

// Capturando valores da tela anterior
$nomeConta = $_POST['nomeConta'];

// Instanciando classes
$functionsAccounts = new FunctionsAccounts();
$conta = new Accounts();
$pageMaker = new PageMaker();

// Definindo valores
$conta->setName($nomeConta);
$conta->setCreated(date("Y-m-d H:i:s"));

?>

<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Cadastramento de Conta:</title>
	</head>

<body>
	<a href="../">Voltar para menu principal</a>
		<form action="" name="form" method="post">
			<h1 align="center">Conta Cadastrada:</h1>
		<p align=center>
			<?php 
			
			$accountRepo= $entityManager->getRepository("Accounts");
			$accountsResult= $accountRepo->findBy(array('name' => $nomeConta));
			
			foreach ($accountsResult as $result)
				$conta->setId($result->getId());
			
			echo $conta;
			
			// Fun��es do Doctrine
			$entityManager->persist($conta);
			$entityManager->flush();
			
			?>
		</p>
	</form>
</body>
	<?php 
		$pageMaker->printFooter();
	?>
</html>
