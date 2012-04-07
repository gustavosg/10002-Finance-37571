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
* Nome:        resultEditarCategoria.php
* Descrição:   Classe para executar resultado de edição de Categoria
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        27/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

$idCategoria = $_POST['idCategoria'];
$nomeCategoria = $_POST['nomeCategoria'];
$categoriaCriada = $_POST['categoriaCriada'];
$categoriaModificada = date("Y/m/d H:i:s");

// Instância de classes
$categoria = new Categories($idCategoria, $nomeCategoria);
$pageMaker = new PageMaker();

$categoria->setId($idCategoria);
$categoria->setName($nomeCategoria);
$categoria->setCreated($categoriaCriada);
$categoria->setModified($categoriaModificada);

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edição de Categoria:</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
		<h1 align="center">Edição de Categoria:</h1>
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