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
* Nome:        resultCadastrar.php
* Descri��o:   Classe de resultado do cadastramento de dados de orcamentos
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once "../../bootstrap.php";

// Capturando informa��es da tela anterior
$nomeOrcamento = $_POST['nomeOrcamento'];

// Instanciando classes
$orcamento = new Budgets();
$functionsBudgets = new FunctionsBudgets();
$pageMaker = new PageMaker();

// Defini��o de valores
$orcamento->setName($nomeOrcamento);
$orcamento->setCreated(date("Y-m-d H:i:s"));

// Fun��es do Doctrine
$entityManager->persist($orcamento);
$entityManager->flush();

$budgetsRepo = $entityManager->getRepository("Budgets");
$budgetsResult = $budgetsRepo->findAll();

?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../scripts/functions.js"></script>
<meta charset="ISO-8859-1">
<title>Finance-37571: Cadastramento de Orcamento:</title>
</head>

<body>
<a href="../">Voltar para menu principal</a>
		<h1 align="center">Or�amento Cadastrado:</h1>
		<p align="center">
		
			<table border=2 align="center">
				<td>ID:</td>
				<td>Nome:</td>
				<td>Criado em:</td>
				<td>Modificado em:</td>
	
					<?php $functionsBudgets->listarOrcamentosTable($budgetsResult);?>
			</table>
		</p>
</body>
<?php $pageMaker->printFooter();?>
</html>
