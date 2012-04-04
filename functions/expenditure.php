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
* Nome:        expenditure.php
* Descri��o:   Fun��es para Expenditure
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        25/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
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

}
?>