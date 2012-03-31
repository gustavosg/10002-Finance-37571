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
* Nome:        resultConsultar.php
* Descri��o:   Classe para consultar dados de conta
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once "../../bootstrap.php";

// Recebendo valores da tela anterior
$nomeConta = $_POST['nomeConta'];

// Instanciando Classes
$pageMaker = new PageMaker();
$functionsAccounts = new FunctionsAccounts();
$conta = new Accounts(null, $nomeConta);

$accountsRepo= $entityManager->getRepository("accounts");
$accountsResult = $accountsRepo->findBy(array ('name' => $conta->getName()));

?>

<html>
	<head>
		<title>Informa��es da Conta:</title>
	</head>
	<body>
	<h1 align="center">Dados da conta:</h1>
	<p align="center" />
	<table border=2>
		<tr>
			<td>ID:</td>
			<td>Nome</td>
			<td>Criado em: </td>
			<td>Modificado em:</td>
		</tr>
			<?php $functionsAccounts->listarTodasContas($accountsResult);?>
		</table>
	</body>
		<?php $pageMaker->printFooter();?>
</html>
