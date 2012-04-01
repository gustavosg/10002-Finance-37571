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
* Nome:        Categories.php
* Descrição:   Funções para  Categories
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
class FunctionsCategories{

	/**
	 * Lista Categorias em formato Select List Box
	 * @param entity $Categories
	 */
	function listarCategorias($infoCategory){
		foreach($infoCategory as $categories) {
			echo "<option value='".$categories->getId()."' >".$categories->getName()."</option>";
		}
	}

	/**
	 * Lista Categorias em formato Table
	 * @param entity $Categories
	 */
	function listarTodasCategorias($categories){
		foreach ($categories as $categorie){
			echo "<tr>";
			echo "<td>".$categorie->getId()."</td>";
			echo "<td>". $categorie->getName(). "</td>";
			echo "<td>". $categorie->getCreated() . "</td>";
			echo "<td>". $categorie->getModified(). "</td>";
			echo "</tr>";
		}
	}

	/**
	 * Imprime informações da categoria
	 * @param entity $Categories
	 */
	function exibirRegistro($categoriesResult){
		foreach ($categoriesResult as $categoria)
		echo $categoria();
	}
}
?>