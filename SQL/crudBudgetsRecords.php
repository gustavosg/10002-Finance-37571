<?php
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO SISTEMA
//------------------------------------------------------------------------------------------------------------------------
// Nome:		Finance-37571
// Área:		Finanças
//------------------------------------------------------------------------------------------------------------------------
// DADOS DA APLICAÇÃO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        SQL
// Descrição:   Responsável pelo retorno e gravação de dados no Banco de Dados, tabela BudgetsRecords
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO ARQUIVO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        crudBudgetsRecords.php
// Descrição:   Realiza as operações de CRUD na tabela BudgetsRecords
// Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
// Data:        20/02/2012
//------------------------------------------------------------------------------------------------------------------------
// CONTROLE DE VERSÃO
//------------------------------------------------------------------------------------------------------------------------
//	|   Data			| Autor					| Modificação
//	|	03/03/2012		| Gustavo				| Ajustando instruções SQL
//------------------------------------------------------------------------------------------------------------------------

include 'dao.php';

$instance = new crudBudgetsRecords();

class crudBudgetsRecords{
	private $dao;
	private $budgetId;
	private $result;
	private $return;
	private $query;

	private $ammount;
	private $subCategoryId;

	private $startMonth;
	private $endMonth;
	private $selectedMonth;

	private $executeFunction;

	/// <summary>
	/// Construtor
	/// </summary>
	public function __construct(){
		$this->dao = new DAO();

		$this->budgetId = 1;
		$this->ammount = 1000;
		$this->subCategoryId = 1;

		$this->selectedMonth = '7';
		
		$this->startMonth = 02;
		$this->endMonth = 04;

		$this->executeFunction = 1;

		switch ($this->executeFunction){
			case 1:{
				echo "Executando método de criação.";
				echo "<br>";
				$this->create($this->budgetId, $this->ammount, $this->subCategoryId);
				break;
			}
			case 2:{
				echo "Executando método de leitura.";
				echo "<br>";
				$this->read($this->budgetId);
				break;
			}
			case 3:{
				echo "Executando método de atualização.";
				echo "<br>";
				$this->update($this->budgetId, $this->ammount, $this->subCategoryId);
				break;
			}
			case 4:{
				echo "Executando método de remoção.";
				echo "<br>";
				$this->delete($this->budgetId);
				break;
			}
			case 5:{
				echo "Relatório de Soma Simples.";
				echo "<br>";
				$this->readSum($this->budgetId);
				break;
			}
			case 6:{
				echo "Relatório de Soma em um período de meses.";
				echo "<br>";
				$this->readSumMonth($this->startMonth, $this->endMonth);
				break;
			}
			case 7: {
				echo "Relatório de Soma em um determinado mês.";
				echo "<br>";
				$this->readSumExpenditure($this->selectedMonth);
				break;
			}
			default:{
				echo "Executando método de leitura.";
				echo "<br>";
				$this->read($this->name);
				break;
			}
		}

	}

	/// <summary>
	/// Cria uma novo Item no Orçamento
	/// </summary>
	/// <param budgetId="budgetId">Nome do Item no Orçamento</param>
	/// <returns> </returns>
	public function create($budgetId, $ammount, $subCategoryId){

		//Utilizando valores de variáveis
		$this->budgetId = $budgetId;
		$this->ammount = $ammount;
		$this->subCategoryId = $subCategoryId;

		//Abrindo conexão:
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "INSERT INTO budget_records(budget_id, ammount, sub_category_id, created) VALUES
			('".$this->budgetId."','".$this->ammount."' , '".$this->subCategoryId."', '".date("Y/m/d H:i:s")."')";
		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando conexão
		$this->dao->closeConnection();

		//Confere resultado e informa ao usuário.
		if ($linhasAfetadas != 0)
		echo "Registros incluídos com sucesso.";
		else
		echo "Erro encontrado, favor reportar erro acima.";
	}

	/// <summary>
	/// Busca informações de um Item no Orçamento
	/// </summary>
	/// <param budgetId="budgetId">Nome do Item no Orçamento</param>
	/// <returns>Informação retornada</returns>
	public function read($budgetId){
		$this->budgetId = $budgetId;

		//Abrindo Conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = ("SELECT * FROM budget_records WHERE budget_id =".$this->budgetId."");
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Fechando conexão
		$this->dao->closeConnection();

		//Imprime resultado
		while ($this->return = mysql_fetch_array($this->result)){
			echo "<br>Id:". $this->return[0];
			echo "<br>Nome:".$this->return[1];
			echo "<br>Criado:".$this->return[2];
			echo "<br>Modificação: ".$this->return[3];
		}
	}

	/// <summary>
	/// Atualiza o item informado
	/// </summary>
	/// <param budgetId="budgetId">Nome do Item no Orçamento</param>
	/// <returns>Atualização da categoria</returns>
	public function update($budgetId, $ammount, $subCategoryId){
		$this->budgetId = $budgetId;
		$this->ammount = $ammount;
		$this->subCategoryId = $subCategoryId;

		//Abrindo Conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "UPDATE budget_records SET budget_Id  = '".$this->budgetId."',
				 ammount = '".$this->ammount."', 
				 sub_category_id = '".$this->subCategoryId."',
				modified = '".date("Y/m/d H:i:s")."' WHERE budget_Id = '".$this->budgetId."'";
		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando conexão
		$this->dao->closeConnection();

		//Confere resultado e informa ao usuário.
		if ($linhasAfetadas != 0)
		echo "Registros alterados!";
		else
		echo "Erro encontrado, favor reportar erro acima.";
	}

	/// <summary>
	/// Deleta o item informado
	/// </summary>
	/// <param budgetId="budgetId">Nome do Item no Orçamento</param>
	/// <returns>Remoção da categoria</returns>
	public function delete($budgetId){
		$this->budgetId = $budgetId;

		//Abrindo conexão:
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query =	"DELETE FROM budget_records WHERE budget_id = '".$this->budgetId."'";
		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando conexão
		$this->dao->closeConnection();

		//Confere resultado e informa ao usuário.
		if ($linhasAfetadas != 0)
		echo "Registros deletados!";
		else
		echo "Erro encontrado, favor reportar erro acima.";
	}


	/// <summary>
	/// Busca o valor total de um Item no Orçamento
	/// </summary>
	/// <param budgetId="budgetId">Nome do Item no Orçamento</param>
	/// <returns>Informação retornada</returns>
	public function readSum($budgetId){
		$this->budgetId = $budgetId;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = ("SELECT SUM(ammount) FROM budget_records where budget_id = ".$this->budgetId."");
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Fechando conexão
		$this->dao->closeConnection();

		while ($this->return = mysql_fetch_array($this->result))
			echo "<br>Soma de Valor:". $this->return[0];


	}

	/// <summary>
	/// Busca o valor total de um Item no Orçamento dentro de um período de meses
	/// </summary>
	/// <param budgetId="budgetId">Nome do Item no Orçamento</param>
	/// <returns>Informação retornada</returns>
	public function readSumMonth($startMonth, $endMonth){
		$this->startMonth = $startMonth;
		$this->endMonth = $endMonth;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query =	("SELECT SUM(ammount), created FROM budget_records where month(created) between '".$this->startMonth."' and '".$this->endMonth."'");
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Fechando conexão
		$this->dao->closeConnection();

		while ($this->return = mysql_fetch_array($this->result)){
			echo "Soma de quantia: ".$this->return[0]."<br>";
			echo "Período: de mês ".$this->startMonth." ao mês ".$this->endMonth."<br>";
		}
	}

	/// <summary>
	/// Busca o valor total de um Item no Orçamento dentro de um determinado mês
	/// </summary>
	/// <param budgetId="budgetId">Nome do Item no Orçamento</param>
	/// <returns>Informação retornada</returns>
	public function readSumExpenditure($selectedMonth){
		
		$this->selectedMonth = $selectedMonth;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query =	("SELECT SUM(BR.ammount) - SUM(EX.ammount) FROM budget_records as BR, expenditure as EX
		WHERE month(BR.created) = '".$this->selectedMonth."' AND month(BR.created) = month(EX.created)");
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Fechando conexão
		$this->dao->closeConnection();

		while ($this->return = mysql_fetch_array($this->result)){
			echo "Valor resultante da quantia: ".$this->return[0]."<br>";
			echo "Mês selecionado: ".$this->selectedMonth."<br>";
			
		}
	}

}
?>