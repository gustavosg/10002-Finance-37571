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
* Nome:        resultConsultar.php
* Descri��o:   Mostra informa��es da despesa selecionada
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// recuperando informa��es da tela anterior
$idDespesa = $_POST['idDespesa'];

// instancia de classes
$pageMaker = new PageMaker();
$functionsExpenditures = new FunctionsExpenditures();

// fun��es do doctrine

$expenditureRepo = $entityManager->getRepository("Expenditure");
$expenditureResult = $expenditureRepo->findBy(array('id'=> $idDespesa));

?>

<html>
	<head>
		<title>Informa��es da Despesa:</title>
	</head>
	<body>
		<a href="../">Voltar para menu principal</a>
		<h1 align="center">Despesa solicitada:</h1>
	
		<p align="center">
		<table border=2>
			<tr>
				<td>ID: </td>
				<td>Quantia:</td>
				<td>Data:</td>
				<td>Data de cria��o:</td>
				<td>Data de modifica��o:</td>
				<td>Descri��o:</td>
				<td>Informa��es sobre conta relacionada:</td>
				<td>Informa��es sobre a sub categoria relacionada:</td>
			</tr>
				<?php $functionsExpenditures->listarDespesasTable($expenditureResult);?>
		</table>
	</body>

	<?php $pageMaker->printFooter();?>

</html>