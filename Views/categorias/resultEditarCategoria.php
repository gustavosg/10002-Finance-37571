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
* Nome:        resultEditarCategoria.php
* Descri��o:   Classe para executar resultado de edi��o de Categoria
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

$idCategoria = $_POST['idCategoria'];
$nomeCategoria = $_POST['nomeCategoria'];
$categoriaCriada = $_POST['categoriaCriada'];
$categoriaModificada = date("Y/m/d H:i:s");

// Inst�ncia de classes
$categoria = new Categories($idCategoria, $nomeCategoria);
$pageMaker = new PageMaker();

$categoria->setId($idCategoria);
$categoria->setName($nomeCategoria);
$categoria->setCreated($categoriaCriada);
$categoria->setModified($categoriaModificada);

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edi��o de Categoria:</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
		<h1 align="center">Edi��o de Categoria:</h1>
		<p align="center" />
	
	<?php 
		echo $categoria;
		
		$entityManager->merge($categoria);
		$entityManager->flush();
	?>
	</body>
	<?php 
	$pageMaker->printFooter();
	?>

</html>