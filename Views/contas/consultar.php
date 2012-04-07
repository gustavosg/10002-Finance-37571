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
* Nome:        consultar.php
* Descri��o:   Classe para consultar conta
* Autor:       37571 Gustavo Souza Gon�alves 
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

//Instancia de Classes:
$pageMaker = new PageMaker();
$functionsAccounts = new FunctionsAccounts();

// Fun��es do Doctrine
$accountsRepo = $entityManager->getRepository("Accounts");
$accountsResult = $accountsRepo->findAll();

?>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Consultar Conta:</title>
</head>

<body>

<form action="resultConsultar.php" name="form" method="post">
	<h1 align="center">Entre com as informa��es:</h1>
	<p align="center">
		<table>
			<tr>
				<td>Conta:</td>
				<td>		
				
				<select name="idConta">
				<option />
				
				<?php 
				$functionsAccounts->exibirListaSelectContas($accountsResult);
				?>				
				</select>
				</td>
			</tr>
		</table>
		<button type="submit" value="submit" name="Enviar"
			>Enviar</button>
		<br>
	</p>
	</form>
</body>
	<?php 
	$pageMaker->printFooter();
	
	?>
</html>
