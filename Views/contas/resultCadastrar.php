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
* Nome:        resultCadastrar.php
* Descrição:   Classe de resultado do cadastramento de dados de conta
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
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
			
			// Funções do Doctrine
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
