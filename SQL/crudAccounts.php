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
// Descrição:   Responsável pelo retorno e gravação de dados no Banco de Dados, tabela Account
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO ARQUIVO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        CRUDAccounts.php
// Descrição:   Realiza as operações de CRUD na tabela Account
// Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
// Data:        13/02/2012
//------------------------------------------------------------------------------------------------------------------------
// CONTROLE DE VERSÃO
//------------------------------------------------------------------------------------------------------------------------
//	|   Data			| Autor					| Modificação
//	|	29/02/2012		| Gustavo				| Ajustado instruções SQL
//------------------------------------------------------------------------------------------------------------------------

include 'dao.php';

//Inicializando a classe (retirar quando for implementar a continuação)
$instance = new crudAccounts();

class crudAccounts{
	private $dao;
	private $name;
	private $result;
	private $return;
	private $query;

	private $executeFunction;

	/// <summary>
	/// Construtor
	/// </summary>
	public function __construct(){
		$this->dao= new DAO();

		$this->name = 'Name';
		$this->executeFunction = 1;

		switch ($this->executeFunction){
			case 1:{
				echo "Executando método de criação.";
				echo "<br>";
				$this->create($this->name);
				break;
			}
			case 2:{
				echo "Executando método de leitura.";
				echo "<br>";
				$this->read($this->name);
				break;
			}
			case 3:{
				echo "Executando método de atualização.";
				echo "<br>";
				$this->update($this->name);
				break;
			}
			case 4:{
				echo "Executando método de remoção.";
				echo "<br>";
				$this->delete($this->name);
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
	/// Cria uma nova Conta
	/// </summary>
	/// <param name="name">Nome da Conta</param>
	public function create($name){
		$this->name = $name;

		//Abrindo conexão;
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "INSERT INTO accounts (NAME, CREATED) VALUES(".$this->name.",'".date("Y/m/d H:i:s")."')";
		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando conexão
		$this->dao->closeConnection();

		//Confere execução e mostra ao usuário
		if ($linhasAfetadas != 0)
		echo "Registros incluídos com sucesso.";
		else
		echo "Erro encontrado, favor reportar erro..";

	}

	/// <summary>
	/// Busca informações de uma Conta
	/// </summary>
	/// <param name="name">Nome da Conta</param>
	/// <returns>Informação solicitada</returns>
	public function read($name){
		$this->name = $name;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = "SELECT * FROM accounts WHERE NAME =".$this->name."";
		$this->result = mysql_query($this->query) or die(mysql_error());

		//Fechando conexão
		$this->dao->closeConnection();

		while ($this->return = mysql_fetch_array($this->result)){
			echo "Id: ".$this->return[0]."<br>";
			echo "Nome: ".$this->return[1]."<br>";
			echo "Criado: ".$this->return[2]."<br>";
			echo "Modificado: ".$this->return[3]."<br>";
		}
	}

	/// <summary>
	/// Atualiza a conta informada
	/// </summary>
	/// <param name="name">Nome da Conta</param>
	/// <returns>Atualização da conta</returns>
	public function update($name){
		$this->name = $name;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.
		$this->query = ("UPDATE accounts SET name = '".$this->name."', modified = '".date("Y/m/d H:i:s")."'
			WHERE name = '".$this->name."'");
		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando conexão
		$this->dao->closeConnection();

		if ($linhasAfetadas !=0)
		echo "Registros atualizados com sucesso!";
		else
		echo "Erro encontrado, favor reportar erro..";
	}

	/// <summary>
	/// Deleta a conta informada
	/// </summary>
	/// <param name="name">Nome da Conta</param>
	/// <returns>Remoção da conta</returns>
	public function delete($name){
		$this->name = $name;

		//Abrindo conexão
		$this->dao->openConnection();

		//Passagem da instrução sql e execução no banco de dados.

		$this->query = ("DELETE FROM accounts WHERE NAME = ".$this->name."");
		$this->result = mysql_query($this->query) or die(mysql_error());

		$linhasAfetadas = mysql_affected_rows();

		//Fechando conexão
		$this->dao->closeConnection();

		if ($linhasAfetadas != 0)
		echo "Registros deletados.";
		else
		echo "Erro encontrado, favor reportar erro.";
	}
}

?>