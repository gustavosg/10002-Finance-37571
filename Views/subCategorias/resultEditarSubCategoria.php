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
* Nome:        resultEditarSubCategoria.php
* Descrição:   Classe para executar resultado de edição de SubCategoria
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        29/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Informações da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$idCategoria = $_POST['idCategoria'];
$nomeSubCategoria = $_POST['nomeSubCategoria'];
$subCategoriaCriada = $_POST['dataCriada'];
$subCategoriaModificada = date("Y/m/d H:i:s");

// Declaração de variáveis
$nomeCategoria = '';
$dataCriacao = '';
$dataModificacao = '';

// Instância de classes
$pageMaker= new PageMaker();
// Instanciando entidade Categoria
$categoria = new Categories($idCategoria, null);
$categoriesRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoriesRepo->findBy(array('id' => $idCategoria));

foreach ($categoriesResult as $categories)
{
	$nomeCategoria = $categories->getName();
	$dataCriacao = $categories->getCreated();
	$dataModificacao = $categories->getModified();
}

$categoria->setId($idCategoria);
$categoria->setName($nomeCategoria);
$categoria->setCreated($dataCriacao);
$categoria->setModified($dataModificacao);


$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);


// Inserindo novas informações em SubCategoria
$subCategoria->setId($idSubCategoria);
$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($subCategoriaCriada);
$subCategoria->setModified($subCategoriaModificada);

?>

<html>
	<head>
		<title>Finance-37571: Resultado de edição de SubCategoria:</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
	
		<h1 align="center">Edição de SubCategoria:</h1>
		<h2 align="center">Dados alterados:</h2>
		
		<p align="center" />
		
			<?php 
				$entityManager->merge($subCategoria);
				$entityManager->flush();
				
				echo $subCategoria;
			
			?>
	</body>
	<?php 
	$pageMaker->printFooter();
	?>
</html>