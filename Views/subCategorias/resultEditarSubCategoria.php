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
* Nome:        resultEditarSubCategoria.php
* Descri��o:   Classe para executar resultado de edi��o de SubCategoria
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        29/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Declara��o de vari�veis
$nomeCategoria = '';
$dataCriacao = '';
$dataModificacao = '';

// Informa��es da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$idCategoria = $_POST['idCategoria'];
$nomeSubCategoria = $_POST['nomeSubCategoria'];
$subCategoriaCriada = $_POST['dataCriada'];
$subCategoriaModificada = date("Y/m/d H:i:s");

// Instanciando entidade Categoria
$categoria = new Categories($idCategoria);

$categoriesRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoriesRepo->findBy(array('id' => $idCategoria));

foreach ($categoriesResult as $categories)
{
	$nomeCategoria = $categories->getName();
	$dataCriacao = $categories->getCreated();
	$dataModificacao = $categories->getModified();
}

$categoria->setName($nomeCategoria);
$categoria->setCreated($dataCriacao);
$categoria->setModified($dataModificacao);


$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);

// Inserindo novas informa��es em SubCategoria
$subCategoria->setId($idSubCategoria);
$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($subCategoriaCriada);
$subCategoria->setModified($subCategoriaModificada);

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edi��o de SubCategoria:</title>
	</head>
	<body>
	
		<h1 align="center">Edi��o de SubCategoria:</h1>
		<h2 align="center">Dados alterados:</h2>
		
		<p align="center" />
		
			<?php 
				$entityManager->merge($subCategoria);
				$entityManager->flush();
				
				echo $categoria;
				echo "<br>";
				echo $subCategoria;
			
			?>
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gon�alves - 37571 <br> Marco Aur�lio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>
</html>