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
* Nome:        resultCadastrar.php
* Descrição:   Insere informações para Categories
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once "../../bootstrap.php";

$pageMaker = new PageMaker();

$idCategoria = $_POST['idCategoria'];
$nomeSubCategoria = $_POST['nomeSubCategoria'];

$categoria = new Categories($idCategoria, null);

$categoriesRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categoriesRepo->findBy(array('id' => $idCategoria));

$nomeCategoria = '';
$criacaoCategoria = '';
$modificacaoCategoria = '';

foreach ($categoriesResult as $categorie)
{
	$nomeCategoria = $categorie->getName();
	$criacaoCategoria = $categorie->getCreated();
	$modificacaoCategoria = $categorie->getModified();
}

$categoria->setName($nomeCategoria);
$categoria->setCreated($criacaoCategoria);
$categoria->setModified($modificacaoCategoria);
$subCategoria = new Sub_Categories($categoria, $nomeSubCategoria);

$subCategoria->setName($nomeSubCategoria);
$subCategoria->setCreated(date("Y/m/d H:i:s"));

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de SubCategoria:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="left">SubCategoria Cadastrada!</h1>
		
<?php $subCategoria->__toString();
$entityManager->merge($subCategoria);

$entityManager->flush();
?>

	</form>
</body>

<?php 
//Imprime o Footer da página
$pageMaker->printFooter();

?>
</html>
