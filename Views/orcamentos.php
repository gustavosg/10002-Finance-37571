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
* Nome:        orcamentos.php
* Descrição:   Tela de chamada para orçamentos
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
				<td><li/><a href="orcamentos/cadastrar.php">Cadastrar Orçamento</a></td>
				<td><li/><a href="orcamentos/excluir.php">Excluir Orçamento</a></td>
			</tr>
			<tr>
				<td><li/><a href="orcamentos/consultar.php">Consultar Orçamento</a></td>
				<td><li/><a href="orcamentos/relatorio.php">Relatório Orçamento</a></td>

			</tr>

		</tbody>

	</table>


</body>
</html>