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
* Nome:        orcamentos.php
* Descri��o:   Tela de chamada para or�amentos
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
<title>Opera��es de Or�amento:</title>
</head>
<body>

<h2 align="center">Escolha a opera��o desejada:</h2>

	<table align="center" border="2" rules="all" >
		<tbody>
			<tr>
				<td><li/><a href="orcamentos/cadastrar.php">Cadastrar Item de Or�amento</a></td>
				<td><li/><a href="orcamentos/consultar.php">Consultar Item de Or�amento</a></td>
				
			</tr>
			<tr>
				
				<td><li/><a href="orcamentos/editar.php">Editar Item de Or�amento</a></td>
				<td><li/><a href="orcamentos/excluir.php">Excluir Item de Or�amento</a></td>
			</tr>
			
			<td colspan="2" align="center"><li/><a href="orcamentos/relatorio.php">Relat�rio Item de Or�amento</a></td>
			</tr>

		</tbody>

	</table>


</body>
</html>