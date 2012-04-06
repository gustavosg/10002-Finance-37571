<?php

/*------------------------------------------------------------------------------------------------------------------------
* DADOS DO SISTEMA
* ------------------------------------------------------------------------------------------------------------------------
* Nome:		Finance-37571
* Сrea:		Finanчas
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DA APLICAЧУO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        SQL
* Descriчуo:   Responsсvel pelo retorno e gravaчуo de dados no Banco de Dados, tabela Account
* ------------------------------------------------------------------------------------------------------------------------
* DADOS DO ARQUIVO
* ------------------------------------------------------------------------------------------------------------------------
* Nome:        expenditure.php
* Descriчуo:   Entidade de mapeamento para Expenditure
* Autor:       37571 Gustavo Souza Gonчalves & 38441 Marco Aurщlio D. Acaroni
* Data:        20/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERSУO
* ------------------------------------------------------------------------------------------------------------------------*/

use Doctrine\Common\Collections\ArrayCollection;

/** @Entity */
class Expenditure{

	/** @Id @GeneratedValue @Column(type="integer") */
	protected $id;

	/** @ManyToOne(targetEntity="Sub_Categories", cascade="all")
	 * * @JoinColumn(name="sub_category_id", referencedColumnName="id") 
	 * */
	protected $subCategory;

	/** @ManyToOne(targetEntity="Accounts", cascade="merge")
	 * @JoinColumn(name="account_id", referencedColumnName="id")
	 */
	protected $account;

	/** @Column **/
	protected  $date;

	/** @Column(type="integer") **/
	protected  $ammount;

	/** @Column **/
	protected $created;

	/** @Column **/
	protected $modified;

	/** @Column(type="text") **/
	protected $description;

	/**
	 * Щ necessсrio ter uma Account e uma SubCategory para ter uma Expenditure
	 */
	public function __construct(Accounts $account = null, Sub_Categories $subCategory= null){
		$this->account = $account;
		$this->subCategory = $subCategory;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	
	public function getSubCategory(){
		return $this->subCategory;
	}
	public function setSubCategory(Sub_Categories $subCategory){
		$this->subCategory = $subCategory;
	}
	
	public function getAccount(){
		return $this->account;
	}
	public function setAccount(Accounts $account){
		$this->account = $account;
	}

	public function getDate(){
		return $this->date;
	}
	public function setDate($date){
		$this->date = $date;
	}

	public function getAmmount(){
		return $this->ammount;
	}
	public function setAmmount($ammount){
		$this->ammount = $ammount;
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
	
	public function __toString(){
		return " ID: [".($this->id==null?"-":$this->id)."]  , Quantia: R$" . ($this->ammount). "  , Data: ". ( $this->date == null? "-" : $this->date )." , 
		Criado em: ". ($this->created== null? "-":$this->created). "
		 Modificado em: ". ($this->modified == null? "-":$this->modified ). "
		 Conta: ". $this->account . "
		 Sub Categoria: ".$this->subCategory->getName() . ". " ;
	}
}
?>