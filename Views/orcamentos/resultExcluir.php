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
* Descrição:   Remove informações de Budgets
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

$nomeOrcamento = $_POST['nomeOrcamento'];

$orcamento = new Budgets($nomeOrcamento);

$budgetsRepo = $entityManager->getRepository("Budgets");
$budgets = $budgetsRepo->findBy(array ('name' => $orcamento->getName()));

?>

<html>
<head>
<title>Excluir categoria</title>
</head>
<body>

	<form action="">

		<button onclick="history.back()">Voltar</button>
		<h1>Orcamento excluído:</h1>

<?php 

// TODO Perguntar ao Ítalo porque não remove, sendo que a explicação do site é a mesma:
// http://docs.doctrine-project.org/projects/doctrine-orm/en/2.0.x/reference/working-with-objects.html

$entityManager->remove($budgets);
$entityManager->flush();

?>
	</form>

</body>
</html>
