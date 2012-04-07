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
* Nome:        editarOrcamento.php
* Descrição:   Classe para inserir dados de modificação da orcamento
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

$idOrcamento = $_POST['idOrcamento'];

$orcamento = new Budgets($idOrcamento, null);

$accountRepo = $entityManager->getRepository("Budgets");
$accountsResult = $accountRepo->findBy(array('id' => $orcamento->getId()));

$id = 0;
$nome = '';
$criacao = '';
$modificacaoAnterior = '';

foreach ($accountsResult as $account)
{
	$id = $account->getId();
	$nome = $account->getName();
	$criacao = $account->getCreated();
	$modificacaoAnterior = $account->getModified();
}
?>

<html>
	<head>
		<title>Finance-37571: Edição de Orcamento:</title>
	</head>
	<body>
	<form action="resultEditarOrcamento.php" method="post" name="form">
		<h1 align="center">Edição de Orcamento:</h1>
		<p align="center" />
			<table >
				<tr>
					<td><label>ID:</label></td>
					<td><input type="text" size="10px" name="idOrcamento" readonly="readonly" value="<?php echo $id ?>" /></td>
				</tr>
				
				<tr>
					<td><label style="color:red; " >Nome:</label></td>
					<td><input type="text" size="50px" name="nomeOrcamento" value="<?php echo $nome ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Criação:</label></td>
					<td><input type="text" size="50px" name="orcamentoCriada" readonly="readonly"  value="<?php echo $criacao ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Modificação:</label></td>
					<td><input type="text" size="50px" name="orcamentoModificada" readonly="readonly"  value="<?php echo $modificacaoAnterior ?>" /></td>
				</tr>
				
			</table>
			
			<p align="right">
			<label style="color:red ">Aviso! <br> Somente campos em vermelho podem ser editados.</label>
			</p>
	
	<p align="center">
	<button type="submit"> Enviar</button>
	</p>
	
	</form>
	</body>
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>

</html>