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
// Descrição:   Responsável pela conexão ao banco de dados
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO ARQUIVO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        DAO.php
// Descrição:   Responsável pela conexão ao banco de dados
// Autor:       Gustavo Souza Gonçalves
// Data:        13/02/2012
//------------------------------------------------------------------------------------------------------------------------
// CONTROLE DE VERSÃO
//------------------------------------------------------------------------------------------------------------------------
//
//------------------------------------------------------------------------------------------------------------------------

class DAO{
	private $server ;
	private $username = 'root';
	private $password = '';
	private $db = 'finance_37571';
	private $connection;

	private $link;

	/*
	 * Construtor
	*/
	public function __construct(){

		$this->server = 'localhost';
	}

	/*
	 * Abre a conexão para o Banco de Dados
	*/
	public function openConnection(){
	
		echo "Iniciando conexão <br>";
		$this->link =  mysql_connect($this->server, $this->username, $this->password);

		if (!$this->link)
		die('Não pode conectar: '.mysql_error());
		else{
			echo "Conexão aberta. <br>";
			$this->connection = mysql_select_db($this->db);
			echo "Banco escolhido: ".$this->db."<br>";
		}

		return $this->connection;
	}

	/*
	 * Fecha conexão com o BD
	*/
	public function closeConnection(){
		$fechaConexao = mysql_close($this->link);
		
		if ($fechaConexao == true)
		echo "<br> Conexão finalizada. <br>";
		else
		echo "<br> Conexão não foi finalizada, verificar erro acima.<br>";
	}

}

?>
