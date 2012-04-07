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
* Nome:        categorias.php
* Descrição:   Tela de chamada para categorias
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
<title>Operações de Categoria:</title>
</head>
<body>

<h2 align="center">Escolha a operação desejada:</h2>

	<table align="center" border="2" rules="all" >
		<tbody>
			<tr>
				<td><li/><a href="categorias/cadastrar.php">Cadastrar Categoria</a></td>
				<td><li/><a href="categorias/consultar.php">Consultar Categoria</a></td>
				
			</tr>
			<tr>
				
				<td><li/><a href="categorias/editar.php">Editar Categoria</a></td>
				<td><li/><a href="categorias/excluir.php">Excluir Categoria</a></td>
			</tr>
			
			<td colspan="2" align="center"><li/><a href="categorias/relatorio.php">Relatório Categoria</a></td>
			</td>

			</tr>

		</tbody>

	</table>


</body>
</html>