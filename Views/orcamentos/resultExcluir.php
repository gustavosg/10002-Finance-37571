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
* Nome:        resultExcluir.php
* Descri��o:   Remove informa��es de Budgets
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
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
		<h1>Orcamento exclu�do:</h1>

<?php 

// TODO Perguntar ao �talo porque n�o remove, sendo que a explica��o do site � a mesma:
// http://docs.doctrine-project.org/projects/doctrine-orm/en/2.0.x/reference/working-with-objects.html

$entityManager->remove($budgets);
$entityManager->flush();

?>
	</form>

</body>
</html>
