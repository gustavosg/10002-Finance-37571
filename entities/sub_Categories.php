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
* Nome:        SubCategories.php
* Descri��o:   Entidade de mapeamento para SubCategories
* Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
* Data:        21/03/2012
* ------------------------------------------------------------------------------------------------------------------------
* CONTROLE DE VERS�O
* ------------------------------------------------------------------------------------------------------------------------*/

/** @Entity **/
class Sub_Categories {

	// TODO Gustavo: Este mapeamento me deixou bem confuso, como ser� feito?
	/** @Id @GeneratedValue @Column(type="integer")
	* @OneToMany(targetEntity="Expenditure"), @OneToMany(targetEntity="BudgetRecords")
	* Enter description here ...
	* @var IntegerType:: **/
	protected $id;

	/** @ManyToOne(targetEntity="Categories")
	 * @JoinColumn(name="id", referencedColumnName="id")
	 * Enter description here ...
	 * @var unknown_type **/
	protected $categoryId;

	/** @Column(type="string") **/
	protected $name;

	/** @Column**/
	protected $created;

	/** @Column **/
	protected $modified;

	// TODO Gustavo: fazer constructor.
	public function __construct($categoryId = null,  $name = null){
		$this->categoryId = $categoryId;
		$this->name = $name;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id= $id;
	}

	public function getCategoryId(){
		return $this->categoryId;
	}
	public function setCategoryId($categoryId){
		$this->categoryId= $categoryId;
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
		$this->modified= new DateTime($modified);
	}

	public function ToString(){
		return "[".($this->id==null?"-":$this->id)."] " . $this->name. " , ".  $this->created == null? "-" : $this->created ." , ". $this->modified == null? "-":$this->modified . " . " ;
	}
}
?>