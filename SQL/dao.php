<?php
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO SISTEMA
//------------------------------------------------------------------------------------------------------------------------
// Nome:		Finance-37571
// �rea:		Finan�as
//------------------------------------------------------------------------------------------------------------------------
// DADOS DA APLICA��O
//------------------------------------------------------------------------------------------------------------------------
// Nome:        SQL
// Descri��o:   Respons�vel pela conex�o ao banco de dados
//------------------------------------------------------------------------------------------------------------------------
// DADOS DO ARQUIVO
//------------------------------------------------------------------------------------------------------------------------
// Nome:        DAO.php
// Descri��o:   Respons�vel pela conex�o ao banco de dados
// Autor:       Gustavo Souza Gon�alves
// Data:        13/02/2012
//------------------------------------------------------------------------------------------------------------------------
// CONTROLE DE VERS�O
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
	 * Abre a conex�o para o Banco de Dados
	*/
	public function openConnection(){
	
		echo "Iniciando conex�o <br>";
		$this->link =  mysql_connect($this->server, $this->username, $this->password);

		if (!$this->link)
		die('N�o pode conectar: '.mysql_error());
		else{
			echo "Conex�o aberta. <br>";
			$this->connection = mysql_select_db($this->db);
			echo "Banco escolhido: ".$this->db."<br>";
		}

		return $this->connection;
	}

	/*
	 * Fecha conex�o com o BD
	*/
	public function closeConnection(){
		$fechaConexao = mysql_close($this->link);
		
		if ($fechaConexao == true)
		echo "<br> Conex�o finalizada. <br>";
		else
		echo "<br> Conex�o n�o foi finalizada, verificar erro acima.<br>";
	}

}

?>
