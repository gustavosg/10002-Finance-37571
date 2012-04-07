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

// Recuperando informações da tela anterior
$idCategoria = $_POST['idCategoria'];

// Instanciando classes
$categoria = new Categories($idCategoria, null);
$categoriesRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoriesRepo->findBy(array ('id' => $idCategoria));
$pageMaker = new PageMaker();

//Definindo variáveis
$nomeCategoria = '';
$criacaoCategoria = '';
$modificacaoCategoria = '';

foreach ($categoriesResult as $result)
{
	$nomeCategoria = $result->getName();
	$criacaoCategoria = $result->getCreated();
	$modificacaoCategoria = $result->getModified();
}

$categoria->setName($nomeCategoria);
$categoria->setCreated($criacaoCategoria);
$categoria->setModified($modificacaoCategoria);

?>

<html>
<head>
<title>Excluir categoria</title>
</head>
<body>

	<form action="">
		<a href="../">Voltar para menu principal</a>
		<?php

		$categoriesResult = $categoriesRepo->find($idCategoria);
			$entityManager->remove($categoriesResult);
			$entityManager->flush();
		?>
		
<h1 align="center">Categoria excluída!</h1>

		<p align=center>

		<?php 
		echo $categoria;
		?>

</p>
	</form>

</body>
<?php 
$pageMaker->printFooter();?>
</html>
