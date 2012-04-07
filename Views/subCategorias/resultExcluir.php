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
* Nome:        resultExcluir.php
* Descrição:   Excluir Sub Categorias
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        07/04/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Definindo variáveis:
$nomeSubCategoria = '';
$dataCriacao = '';
$dataModificacao = '';

// Capturando informações da tela anterior 
$idSubCategoria = $_POST['idSubCategoria'];

// Instância de classes
$categoria = new Categories();
$pageMaker = new PageMaker();

$subCategoria = new Sub_Categories($categoria,null);

// Funções do Doctrine
$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findBy(array ('id' => $idSubCategoria));

foreach ($subCategoriesResult as $result)
{
	$idSubCategoria = $result->getId();
	$nomeSubCategoria = $result->getName();
	$dataCriacao = $result->getCreated();
	$dataModificacao = $result->getModified();
	$categoria = $result->getCategory();	
}

$subCategoria->setId($idSubCategoria);
$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated($dataCriacao);
$subCategoria->setModified($dataModificacao);
$subCategoria->setCategory($categoria);

?>
<html>
	<head>
		<title>Excluir subCategoria</title>
	</head>
	<body>
	<a href="../">Voltar para menu principal</a>
	
		<form action="">
			<h1 align="center">SubCategoria excluída!</h1>
			
			<p align=center>
			<?php 
	
				$subCategoriesResult = $subCategoriesRepo->find($idSubCategoria);
				$entityManager->remove($subCategoriesResult);
				
				$entityManager->flush();
				echo $subCategoria;
			?>
			</p>
		</form>
	</body>
	<?php 
	$pageMaker->printFooter();
	?>
</html>
