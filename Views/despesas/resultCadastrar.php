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
* Descrição:   Insere informações para despesas
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

// Instancia de classes
$pageMaker = new PageMaker();

?>

<html>
	<head>
		<title>Finance-37571: Cadastramento de Despesa</title>
	</head>
	
	<body>
		<a href="../">Voltar para menu principal</a>
		<form action="" name="form" method="post">
			<h1 align="center">Despesa cadastrada:</h1>
			
			<?php 
				echo $itemOrcamento;
				
				$entityManager->persist($itemOrcamento);
				$entityManager->flush();
			?>
	
		</form>
	</body>

	<?php $pageMaker->printFooter();?>

</html>