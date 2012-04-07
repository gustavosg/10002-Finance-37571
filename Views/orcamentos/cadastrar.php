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
* Nome:        consultar.php
* Descri��o:   Tela de consulta de categorias
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

$pageMaker = new PageMaker();

?>


<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Or�amentos:</title>
</head>

<body>
<form action="resultCadastrar.php" name="form" method="post">
	<h1 align="center">Entre com as informa��es:</h1>
	<br>
	<p align="center">
		<label align="center">Or�amentos:</label> <input type="text" size="100"
			maxlength="50" name="nomeOrcamento" id="nomeOrcamento" />
	</p>
	<br>
	<p align="center">
		<button type="submit" value="submit" name="Enviar"
			>Enviar</button>

		<button type="button" value="Limpar" name="Limpar"
			onclick="limparCamposOr�amentoss()">Limpar</button>
		<br>
	</p>
	</form>
</body>
<?php 
$pageMaker ->printFooter();
?>
</html>
