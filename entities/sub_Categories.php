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
		* @var IntegerType:: **/
	protected $id;

	/** @Column(type="string") **/
	protected $name;

	/** @Column **/
	protected $created;

	/** @Column **/
	protected $modified;
	
	/** @ManyToOne(targetEntity="categories", cascade="merge") **/
	protected $category;

	// TODO Gustavo: fazer constructor.
	public function __construct(Categories $categories,  $name = null){
		$this->category = $categories;
		$this->name = $name;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id= $id;
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
		$this->created = $created;
	}

	public function getModified(){
		return $this->modified;
	}
	public function setModified($modified){
		$this->modified= $modified;
	}

	public function __toString(){
		return "[".($this->id==null?"-":$this->id)."] " . $this->name. " , ".  ($this->created == null? "-" : $this->created) ." , ". ($this->modified == null? "-":$this->modified) . " . " ;
	}
}
?>