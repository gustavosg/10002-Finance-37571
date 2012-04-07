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
* Nome:        expenditure.php
* Descrição:   Funções para Expenditure
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/
class FunctionsExpenditures{

	/**
	* Lista despesas em formato Table Row
	* @param entity $expenditure
	*/
	function listarDespesasTable($expenditureResult){
		foreach ($expenditureResult as $result)
		{
			echo "<tr>";
			echo "<td>".$result->getId()."</td>";
			echo "<td>".$result->getAmmount()."</td>";
			echo "<td>".$result->getDate()."</td>";
			echo "<td>".$result->getCreated()."</td>";
			echo "<td>".$result->getModified()."</td>";
			echo "<td>".$result->getDescription()."</td>";
			echo "<td>".$result->getAccount()."</td>";
			echo "<td>".$result->getSubCategory()."</td>";
			echo "</tr>";
		}
	}
	
	/**
	* Lista despesas cadastradas em objetos do tipo radio button.
	* @param Object List entity type $expenditures
	*/
	function listarDespesasEdicao($expendituresResult){
		foreach ($expendituresResult as $result)
		{
			echo "<tr>";
			echo "<td> <input type=RADIO name='idDespesa' value='".$result->getId()."'></td>";
			echo "<td>".$result->getId()."</td>";
			echo "<td>". $result->getAmmount(). "</td>";
			echo "<td>". $result->getDate(). "</td>";
			echo "</tr>";
		}
	}
	
	/**
	* Lista items de orçamentos em formato Select List Box
	* @param entity $BudgetRecords
	*/
	function listarDespesasSelect($expenditureResult){
		foreach($expenditureResult as $result) {
			echo "<option value=".$result->getId()." >Quantia: ".$result->getAmmount().", Data: ". $result->getDate().", Conta: ".$result->getAccount() ."</option>";
		}
	}
	

}
?>