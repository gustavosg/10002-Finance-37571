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
* Nome:        itemsOrcamentos.php
* Descri��o:   Tela de chamada para itemsOr�amentos
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Opera��es de Despesa:</title>
</head>
<body>

	<h2 align="center">Escolha a opera��o desejada:</h2>

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
			
			<td colspan="2" align="center"><li/><a href="despesas/relatorio.php">Relat�rio Despesa</a></td>
			</tr>
		</tbody>
	</table>
</body>
</html>