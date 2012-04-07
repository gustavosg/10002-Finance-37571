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
* Nome:        itemsOrcamentos.php
* Descrição:   Tela de chamada para itemsOrçamentos
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Operações de Despesa:</title>
</head>
<body>

	<h2 align="center">Escolha a operação desejada:</h2>

	<table align="center" border="2" rules="all">
		<tbody>
			<tr>
				<td><li/><a href="despesas/cadastrar.php">Cadastrar Despesa</a></td>
				<td><li/><a href="despesas/consultar.php">Consultar Despesa</a></td>
				
			</tr>
			<tr>
				
				<td><li/><a href="despesas/editar.php">Editar Despesa</a></td>
				<td><li/><a href="despesas/excluir.php">Excluir Despesa</a></td>
			</tr>
			
			<td colspan="2" align="center"><li/><a href="despesas/relatorio.php">Relatório Despesa</a></td>
			</tr>
		</tbody>
	</table>
</body>
</html>