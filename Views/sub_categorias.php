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
* Nome:        sub_Categorias.php
* Descri��o:   Links para acesso de Sub Categorias
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        29/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once "../bootstrap.php";

 $pageMaker = new PageMaker();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Opera��es de Despesa:</title>
</head>
<body>

<h2 align="center">Escolha a opera��o desejada:</h2>

	<table align="center" border="2" rules="all" >
		<tbody>
			<tr>
				<td><li/><a href="subCategorias/cadastrar.php">Cadastrar SubCategoria</a></td>
				<td><li/><a href="subCategorias/consultar.php">Consultar SubCategoria</a></td>
				
			</tr>
			<tr>
				
				<td><li/><a href="subCategorias/editar.php">Editar SubCategoria</a></td>
				<td><li/><a href="subCategorias/excluir.php">Excluir SubCategoria</a></td>
			</tr>
			<tr>
				<td colspan=2 align="center"><li/><a href="subCategorias/relatorio.php">Relat�rio SubCategoria</a></td>
			</tr>
		</tbody>

	</table>


</body>

<?php 
//Imprime o Footer da p�gina
$pageMaker->printFooter(); 

?>
</html>