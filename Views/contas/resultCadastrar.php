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

// Definindo valores
$conta->setName($nomeConta);
$conta->setCreated(date("Y-m-d H:i:s"));

// Fun��es do Doctrine
$entityManager->persist($conta);
$entityManager->flush();

// TODO Gustavo: Conferir a constru��o do relat�rio da conta cadastrada

$accountRepo= $entityManager->getRepository("Accounts");
$accountsResult= $accountRepo->findAll();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Conta:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Conta Cadastrada:</h1>
		
<?php $functionsAccounts->exibirRegistro($accountsResult);?>

	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
