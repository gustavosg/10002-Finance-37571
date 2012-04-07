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
* Nome:        contas.php
* Descrição:   Tela de chamada para contas
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../bootstrap.php';

// Instância de Classes
$pageMaker = new PageMaker();
?>

<html>
<head>
<meta charset="ISO-8859-1">
<title>Finance-37571: Operações de Conta:</title>
</head>
<body>
	<h1 align="center">Escolha a operação desejada:</h1>
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
			
			<td colspan=2 align="center"><li/><a href="contas/relatorio.php">Relatório Conta</a></td>
			
		</tbody>
	</table>
</body>
<?php 
$pageMaker->printFooter();
?>
</html>
