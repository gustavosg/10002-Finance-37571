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
* Nome:        accounts.php
* Descri��o:   Entidade de mapeamento para Accounts
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        20/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

/** @Entity */
class Accounts{
	/** @id @GeneratedValue @Column(type="integer") **/
	protected $id;
	/** @Column(type="text") **/
	protected $name;

	/** @Column(type="datetime") **/
	protected $created;

	/** @Column(type="datetime") **/
	protected $modified;

	// 	// TODO Gustavo: D�vidas neste mapeamento, ser� assim mesmo?
	// 	/**
	// 	* @OneToMany(targetEntity="Expenditure", inversedBy="accountId")
	// 	**/
	// 	protected $expenditure;

	// TODO Gustavo: conferir se ter� construtor de Accounts

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name = $name;
	}

	public function getCreated(){
		return $this->created;
	}
	public function setCreated($created){
		$this->created = new DateTime($created);
	}

	public function getModified(){
		return $this->modified;
	}
	public function setModified($modified){
		$this->modified =new DateTime($modified);
	}

	// TODO Gustavo: N�o est� imprimindo a data
	public function ToString(){
		return "[".($this->id==null?"-":$this->id)."] " . $this->name. " , ".  $this->created == null? "-" : $this->created ." , ". $this->modified == null? "-":$this->modified . " . " ;
	}
	
}

?>