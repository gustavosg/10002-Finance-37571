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
* Nome:        SubCategories.php
* Descrição:   Funções para SubCategories
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

require_once '../../bootstrap.php';

class FunctionsSub_Categories{
	/*
	 * Para cada  SubCategoria, ele mostrará as informações em exibirRegistrosSubCategorias()
	*/
	function exibirSubCategorias($listCategories){
		foreach ($listCategories as $categorie){
			exibirRegistrosSubCategorias($categorie);
		}
	}

	function exibirRegistrosSubCategorias($categorie){
		echo "Informações da SubCategoria: <br />";
		echo "Id : ".$categorie->getId(). "<br />";
		echo "Nome : ". $categorie->getName(). "<br />";
		echo "Criado em: ". $categorie->getCreated() . "<br />";
		echo "Modificado em: ". $categorie->getModified(). "<br />";
	}
}

?>