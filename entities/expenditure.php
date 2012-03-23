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
* Descrição:   Entidade de mapeamento para Expenditure
* Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
* Data:        20/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSÃO
* ------------------------------------------------------------------------------------------------------------------------*/

use Doctrine\Common\Collections\ArrayCollection;

/** @Entity */
class Expenditure{

	/** @Id @GeneratedValue @Column(type="integer") */
	protected $id;

	/** @ManyToOne(targetEntity="subCategories") */
	protected $subCategoryId;

	/** @ManyToOne(targetEntity="Accounts") */
	protected $accountId;

	/** @Column(type="datetime") **/
	protected  $date;

	/** @Column(type="integer") **/
	protected  $ammount;

	/** @Column(type="datetime") **/
	protected $created;

	/** @Column(type="datetime") **/
	protected $modified;

	/** @Column(type="text") **/
	protected $description;

	/**
	 * É necessário ter uma conta e uma SubCategoria para ter uma Despesa
	 */
	public function __construct(Accounts $accountId){
		$this->accountId = $accountId;
		// TODO colocar vínculo da Sub Categoria
		//$this->comments = new ArrayCollection();
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getAccountId(){
		return $this->accountId;
	}
	public function setAccountId($accountId){
		$this->accountId = $accountId;
	}

	public function getDate(){
		return $this->date;
	}
	public function setDate($date){
		$this->date = $date;
	}

	public function getCreated(){
		return $this->created;
	}
	public function setCreated($created){
		$this->created= $created;
	}

	public function getModified(){
		return $this->modified;
	}
	public function setModified($modified){
		$this->modified= $modified;
	}

	public function getDescription(){
		return $this->description;
	}
	public function setDescription($description){
		$this->description = $description;
	}
}
?>