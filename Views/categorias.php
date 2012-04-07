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
* Nome:        categorias.php
* Descri��o:   Tela de chamada para categorias
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
<title>Opera��es de Categoria:</title>
</head>
<body>

<h2 align="center">Escolha a opera��o desejada:</h2>

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
			
			<td colspan="2" align="center"><li/><a href="categorias/relatorio.php">Relat�rio Categoria</a></td>
			</td>

			</tr>

		</tbody>

	</table>


</body>
</html>