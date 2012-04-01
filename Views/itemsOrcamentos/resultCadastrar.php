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
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once "../../bootstrap.php";

// Capturando informações da tela anterior
$idSubCategoria = $_POST['idSubCategoria'];
$idOrcamento = $_POST['idOrcamento'];
$quantia = $_POST['Quantia'];

// Funções do doctrine, obtendo informações do banco de dados sobre qual entidade relacionar.
$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findBy(array ('id' => $idOrcamento));

$subCategoriesRepo = $entityManager->getRepository("Sub_Categories");
$subCategoriesResult = $subCategoriesRepo->findBy(array('id'=> $idSubCategoria));

// Instancia de classes
$itemOrcamento = new BudgetRecords();
$pageMaker  = new PageMaker();

// Definição de valores

$itemOrcamento->setName($nomeItemOrcamento);
$conta->setCreated(date("Y-m-d H:i:s"));

$entityManager->persist($conta);
$entityManager->flush();

$postRepo = $entityManager->getRepository("Accounts");
$posts = $postRepo->findAll();

function exibirRegistro($post){
	foreach ($post as $conta)
	{
		echo $conta->ToString();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Conta:</title>
</head>

<body>
	<form action="" name="form" method="post">
		<h1 align="center">Conta Cadastrada:</h1>
		
<?php exibirRegistro($posts);?>

	</form>
</body>
<footer style="position: fixed; right: 3px; bottom: 0px;">
	Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
	PUC Minas - 2011-2012
</footer>
</html>
