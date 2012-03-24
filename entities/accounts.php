<?php

/*------------------------------------------------------------------------------------------------------------------------
 * DADOS DO SISTEMA
* ------------------------------------------------------------------------------------------------------------------------
* Nome:		Finance-37571
* Бrea:		Finanзas
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DA APLICAЗГO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        SQL
* Descriзгo:   Responsбvel pelo retorno e gravaзгo de dados no Banco de Dados, tabela Account
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DO ARQUIVO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        accounts.php
* Descriзгo:   Entidade de mapeamento para Accounts
* Autor:       37571 Gustavo Souza Gonзalves & 38441 Marco Aurйlio D. Acaroni
* Data:        20/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSГO
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

	// 	// TODO Gustavo: Dъvidas neste mapeamento, serб assim mesmo?
	// 	/**
	// 	* @OneToMany(targetEntity="Expenditure", inversedBy="accountId")
	// 	**/
	// 	protected $expenditure;

	// TODO Gustavo: conferir se terб construtor de Accounts

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

	// TODO Gustavo: Nгo estб imprimindo a data
	public function ToString(){
		return "[".($this->id==null?"-":$this->id)."] " . $this->name. " , ".  $this->created == null? "-" : $this->created ." , ". $this->modified == null? "-":$this->modified . " . " ;
	}
	
}

?>