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
// Descrição:   Responsável pelo retorno e gravação de dados no Banco de Dados, tabela Expenditure
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO ARQUIVO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        crudExpenditure.php
// Descrição:   Realiza as operações de CRUD na tabela Expenditure
// Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
// Data:        13/02/2012
//------------------------------------------------------------------------------------------------------------------------
// CONTROLE DE VERSÃO
//------------------------------------------------------------------------------------------------------------------------
//	|   Data			| Autor					| Modificação
//	|	28/02/2012		| GUSTAVO S. GONÇALVES	| Atualizado scripts SQL
//------------------------------------------------------------------------------------------------------------------------

include 'dao.php';

//Inicializando a classe (retirar quando for implementar a continuação)
$instance = new crudExpenditure();

class crudExpenditure{
	private $dao;
	private $result;
	private $query;
	private $return;

	private $executeFunction;

	private $subCategoryId;
	private $accountId;
	private $ammount;
	private $description;
	
	private $startMonth;
	private $endMonth;
	
	private $month;

	public function __construct(){
		$this->dao= new DAO();

		$this->subCategoryId = 1;
		$this->accountId = 1;
		$this->ammount = 1000;
		$this->description = 'Description'.$this->subCategoryId;
		
		$this->month = 03;

		$this->startMonth = '02';
		$this->endMonth = '04';
				
		$this->executeFunction = 1;

		switch ($this->executeFunction){
			case 1:{
				echo "Executando método de criação.";
				echo "<br>";
				$this->create($this->subCategoryId, $this->accountId, $this->ammount, $this->description);
				break;
			}
			case 2:{
				echo "Executando método de leitura.";
				echo "<br>";
				$this->read($this->description);
				break;
			}
			case 3:{
				echo "Executando método de atualização.";
				echo "<br>";
				$this->update($this->subCategoryId, $this->accountId, $this->ammount, $this->modified, $this->description);
				break;
			}
			case 4:{
				echo "Executando método de remoção.";
				echo "<br>";
				$this->delete($this->accountId);
				break;
			}
			case 5:{
				echo "Relatório de Gastos por Conta";
				echo "<br>";
				$this->readExpenditureByAccount($this->month, $this->accountId);
				break;
			}
			case 6:{
				echo "Relatório de Gastos por Categoria";
				echo "<br>";
				$this->readExpenditureByCategory($this->month, $this->subCategoryId);
				break;
			}
			case 7:{
				echo "Relatório de Gastos por Período";
				echo "<br>";
				$this->readExpenditureByPeriod($this->startMonth, $this->endMonth);
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
	/// Cria uma nova Despesa
	/// </summary>
	/// <param name="name">Nome da Despesa</param>
	public function create($subCategoryId, $accountId, $ammount, $description){
		$this->subCategoryId = $subCategoryId;
		$this->accountId = $accountId;
		$this->ammount = $ammount;
		$this->description = $description;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "INSERT INTO expenditure (sub_category_id, account_id, date, ammount, created, description)
			VALUES(".$this->subCategoryId.", ".$this->accountId.", '".date("Y/m/d H:i:s")."',
					 ".$this->ammount.", '".date("Y/m/d H:i:s")."', '".$this->description."')";

		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando conexão
		$this->dao->closeConnection();

		//Checa resultado e informa ao usuário
		if ($linhasAfetadas != 0)
		echo "Registros alterados!";
		else
		echo "Erro encontrado, favor reportar erro acima.";
	}

	/// <summary>
	/// Busca informações de uma Despesa
	/// </summary>
	/// <param name="name">Nome da Despesa</param>
	/// <returns>Informação retornada</returns>
	public function read($description){
		$this->description= $description;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "SELECT * FROM expenditure WHERE description = '".$this->description."'";
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Fechando conexão
		$this->dao->closeConnection();

		//Imprime resultado
		while ($this->return = mysql_fetch_array($this->result)){
			echo "<br>Id: ". $this->return[0];
			echo "<br>ID da Sub-Categoria: ".$this->return[1];
			echo "<br>Id da Conta: ".$this->return[2];
			echo "<br>Data: ".$this->return[3];
			echo "<br>Quantia: ". $this->return[4];
			echo "<br>Criado: ".$this->return[5];
			echo "<br>Modificado: ".$this->return[6];
			echo "<br>Descrição: ".$this->return[7];
		}
	}

	/// <summary>
	/// Atualiza a despesa informada
	/// </summary>
	/// <param name="name">Nome da Despesa</param>
	/// <returns>Atualização da despesa</returns>
	public function update($subCategoryId, $accountId, $ammount, $modified, $description){
		$this->subCategoryId = $subCategoryId;
		$this->accountId = $accountId;
		$this->ammount = $ammount;
		$this->modified = $modified;
		$this->description = $description;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "UPDATE expenditure SET
			sub_category_id = '".$this->subCategoryId."', account_id  = '".$this->accountId."',
			ammount = '".$this->ammount."',	date = '".date("Y/m/d H:i:s")."',
			modified = '".date("Y/m/d H:i:s")."', description = '".$this->description."'"; 
			
		$this->result = mysql_query($this->query)or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando conexão
		$this->dao->closeConnection();

		if ( $linhasAfetadas  != 0)
		echo "Registros alterados!";
		else
		echo "Erro encontrado, favor reportar erro acima.";
	}

	/// <summary>
	/// Deleta a despesa informada
	/// </summary>
	/// <param name="name">Nome da Despesa</param>
	/// <returns>Remoção da despesa</returns>
	public function delete($accountID){
		$this->accountID = $accountID;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "DELETE FROM expenditure WHERE account_id = '".$this->accountID."'";
		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando conexão
		$this->dao->closeConnection();

		if ( $linhasAfetadas  != 0)
		echo "Registros deletados!";
		else
		echo "Erro encontrado, favor reportar erro acima.";
	}

	/// <summary>
	/// Busca informações de uma Despesa por Conta em um determinado mês
	/// </summary>
	/// <param name="name">Nome da Despesa</param>
	/// <returns>Informação retornada</returns>
	public function readExpenditureByAccount($month, $accountId){

		$this->accountId = $accountId;
		$this->month = $month;
		
		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "SELECT EX.account_id, EX.description, AC.id, AC.name  FROM expenditure EX, accounts AC WHERE month(EX.created) = '".$month."'
		and EX.account_ID = '".$this->accountId."' and EX.account_id = AC.id";
		$this->result = mysql_query($this->query) or die(mysql_error());
		
		//Fechando conexão
		$this->dao->closeConnection();

		//Retornando resultado ao usuário
		while ($this->return = mysql_fetch_array($this->result)){
			echo "Id da Despesa: ".$this->return[0]."<br>";
			echo "Descrição: ".$this->return[1]."<br>";
			echo "Id da Conta: ".$this->return[2]."<br>";
			echo "Nome da Conta: ".$this->return[3]."<br>";
		}
	}

	/// <summary>
	/// Busca informações de uma Despesa por Categoria em um determinado mês
	/// </summary>
	/// <param name="name">Nome da Despesa</param>
	/// <returns>Informação retornada</returns>
	public function readExpenditureByCategory($month, $subCategoryId){
		$this->month = $month;
		$this->subCategoryId = $subCategoryId;
		
		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "SELECT EX.ammount, EX.sub_category_id, EX.description, SBC.category_id, CA.id, CA.name  FROM expenditure EX, 
			sub_categories SBC, categories CA WHERE month(EX.created) = '".$this->month."' and EX.sub_category_id = '".$this->subCategoryId."' 
			and EX.sub_category_id = SBC.category_id and SBC.category_id = CA.id order by CA.id";
		$this->result = mysql_query($this->query);
		
		echo "<br>";
		echo "Query: ".$this->query;
		echo "<br>";
		
		//Fechando conexão
		$this->dao->closeConnection();
		
		while ($this->return = mysql_fetch_array($this->result)){
			echo "Quantia: ".$this->return[0]."<br>";
			echo "Id da Sub Categoria: ".$this->return[1]."<br>";
			echo "Descrição: ".$this->return[2]."<br>";
			echo "Id da Categoria: ".$this->return[3]."<br>";
			echo "Id da Conta: ".$this->return[4]."<br>";
			echo "Nome da Categoria: ".$this->return[5]."<br>";
				
			
		}
	}

	/// <summary>
	/// Busca informações de uma Despesa em um período selecionado
	/// </summary>
	/// <param name="name">Nome da Despesa</param>
	/// <returns>Informação retornada</returns>
	public function readExpenditureByPeriod($startMonth, $endMonth){
		$this->startMonth = $startMonth;
		$this->endMonth = $endMonth;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "SELECT SUM(ammount), MONTH(date) FROM expenditure WHERE Month(date) BETWEEN '".$this->startMonth."' AND '".$this->endMonth."' GROUP BY MONTH(date) ";
		$this->result = mysql_query($this->query) or die(mysql_error());
		
		//Fechando conexão
		$this->dao->closeConnection();
		
		//Retornando resultado ao usuário
		while ($this->return = mysql_fetch_array($this->result)){
			echo "Quantia: ".$this->return[0]."<br>";
			echo "Mês: ".$this->return[1]."<br>";
		}

	}
}

?>