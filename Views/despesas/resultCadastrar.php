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
* Descri��o:   Insere informa��es para despesas
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
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