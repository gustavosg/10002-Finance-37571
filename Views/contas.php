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
* Nome:        contas.php
* Descri��o:   Tela de chamada para contas
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../bootstrap.php';

// Inst�ncia de Classes
$pageMaker = new PageMaker();
?>

<html>
<head>
<meta charset="ISO-8859-1">
<title>Finance-37571: Opera��es de Conta:</title>
</head>
<body>
	<h1 align="center">Escolha a opera��o desejada:</h1>
	<table align="center" border=2>
		<tbody>
			<tr>
				<td><li/><a href="contas/cadastrar.php">Cadastrar Conta</a></td>
				<td><li/><a href="contas/consultar.php">Consultar Conta</a></td>
				
			</tr>
			<tr>
				
				<td><li/><a href="contas/editar.php">Editar Conta</a></td>
				<td><li/><a href="contas/excluir.php">Excluir Conta</a></td>
			</tr>
			
			<td colspan=2 align="center"><li/><a href="contas/relatorio.php">Relat�rio Conta</a></td>
			
		</tbody>
	</table>
</body>
<?php 
$pageMaker->printFooter();
?>
</html>
