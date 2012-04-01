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
* Nome:        Budget_Records.php
* Descrição:   Funções para Budget_Records
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
class FunctionsBudget_Records{
	
	/**
	* Lista items de orçamentos em formato Select List Box
	* @param entity $BudgetRecords
	*/
	function listarItemsOrcamentosSelect($budgetRecordsResult){
		foreach($budgetRecordsResult as $result) {
			echo "<option value=".$result->getId()." >Quantia: ".$result->getAmmount().", Relacionado à Orçamento: ".$result->getBudget()->getName() ."</option>";
		}
	}
}
?>