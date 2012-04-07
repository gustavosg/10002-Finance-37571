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
<title>Operações de Orçamento:</title>
</head>
<body>

<h2 align="center">Escolha a operação desejada:</h2>

	<table align="center" border="2" rules="all" >
		<tbody>
			<tr>
				<td><li/><a href="orcamentos/cadastrar.php">Cadastrar Item de Orçamento</a></td>
				<td><li/><a href="orcamentos/consultar.php">Consultar Item de Orçamento</a></td>
				
			</tr>
			<tr>
				
				<td><li/><a href="orcamentos/editar.php">Editar Item de Orçamento</a></td>
				<td><li/><a href="orcamentos/excluir.php">Excluir Item de Orçamento</a></td>
			</tr>
			
			<td colspan="2" align="center"><li/><a href="orcamentos/relatorio.php">Relatório Item de Orçamento</a></td>
			</tr>

		</tbody>

	</table>


</body>
</html>