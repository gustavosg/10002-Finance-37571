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
* Nome:        consultar.php
* Descrição:   Classe para consultar conta
* Autor:       37571 Gustavo Souza Gonçalves 
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

//Instancia de Classes:
$pageMaker = new PageMaker();
$functionsAccounts = new FunctionsAccounts();

// Funções do Doctrine
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
	<h1 align="center">Entre com as informações:</h1>
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
