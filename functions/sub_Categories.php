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
* Nome:        SubCategories.php
* Descri��o:   Fun��es para SubCategories
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

class FunctionsSub_Categories{

	/**
	 * Para cada  SubCategoria, ele mostrar� as informa��es em exibirRegistrosSubCategorias()
	 * @param Object List entity type $Categories
	 */
	function exibirSubCategorias($listCategories){
		foreach ($listCategories as $categorie){
			echo "Informa��es da SubCategoria: <br />";
			echo "Id : ".$categorie->getId(). "<br />";
			echo "Nome : ". $categorie->getName(). "<br />";
			echo "Criado em: ". $categorie->getCreated() . "<br />";
			echo "Modificado em: ". $categorie->getModified(). "<br />";
		}
	}

	/**
	 * Lista todas as Subcategorias registradas
	 * @param Object List entity type $SubCategories
	 */
	function listarTodasSubCategorias($listSubCategories){
		foreach ($listSubCategories as $subCategories)
		{
			echo "<tr>";
			echo "<td>".$subCategories->getId()."</td>";
			echo "<td>". $subCategories->getName(). "</td>";
			echo "<td>". $subCategories->getCreated() . "</td>";
			echo "<td>". $subCategories->getModified(). "</td>";
			echo "</tr>";
		}
	}
}

?>