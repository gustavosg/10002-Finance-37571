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
* Nome:        items_orcamentos.php
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

<table align="center" border="2" rules="all" >
		<tbody>
			<tr>
				<td><li/><a href="itemsOrcamentos/cadastrar.php">Cadastrar Items de Orçamento</a></td>
				<td><li/><a href="itemsOrcamentos/excluir.php">Excluir Items de Orçamento</a></td>
			</tr>
			<tr>
				<td><li/><a href="itemsOrcamentos/consultar.php">Consultar Items de Orçamento</a></td>
				<td><li/><a href="itemsOrcamentos/relatorio.php">Relatório Items de Orçamento</a></td>

			</tr>

		</tbody>

	</table>



</body>
</html>