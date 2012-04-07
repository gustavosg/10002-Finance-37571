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
* Nome:        editarCategoria.php
* Descrição:   Classe para inserir dados de modificação da categoria
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
require_once '../../bootstrap.php';

// Instância das classes
$pageMaker = new PageMaker();

$nomeCategoria = $_POST['nomeCategoria'];

$categoria = new  Categories(null, $nomeCategoria); 

$categorieRepo = $entityManager->getRepository("Categories");
$categoriesResult = $categorieRepo->findBy(array('name' => $categoria->getName()));

$id = 0;
$nome = '';
$criacao = '';
$modificacaoAnterior = '';

foreach ($categoriesResult as $categorie)
{
	$id = $categorie->getId();
	$nome = $categorie->getName();
	$criacao = $categorie->getCreated();
	$modificacaoAnterior = $categorie->getModified();
}
?>

<html>
	<head>
		<title>Finance-37571: Edição de Categoria:</title>
	</head>
	<body>
	<form action="resultEditarCategoria.php" method="post" name="form">
		<h1 align="center">Edição de Categoria:</h1>
		<p align="center" />
			<table >
				<tr>
					<td><label>ID:</label></td>
					<td><input type="text" size="10px" name="idCategoria" readonly="readonly" value="<?php echo $id ?>" /></td>
				</tr>
				
				<tr>
					<td><label style="color:red; " >Nome:</label></td>
					<td><input type="text" size="50px" name="nomeCategoria" value="<?php echo $nome ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Criação:</label></td>
					<td><input type="text" size="50px" name="categoriaCriada" readonly="readonly"  value="<?php echo $criacao ?>" /></td>
				</tr>
				
				<tr>
					<td><label>Data de Modificação:</label></td>
					<td><input type="text" size="50px" name="categoriaModificada" readonly="readonly"  value="<?php echo $modificacaoAnterior ?>" /></td>
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
	<?php 
		$pageMaker->printFooter();
	?>
</html>