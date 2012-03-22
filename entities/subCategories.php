<?php
/** @Entity **/
class SubCategories {

	/** @Id @GeneratedValue @Column(type="integer") **/
	protected $id;

	/** @ManyToOne(targetEntity="Categories")**/
	protected $categoryId;
	
	/** @Column(type="string") **/
	protected $name;

	/** @Column(type="datetime") **/
	protected $created;

	/** @Column(type="datetime") **/
	protected $modified;

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
		$this->created= $created;
	}

	public function getModified(){
		return $this->modified;
	}
	public function setModified($modified){
		$this->modified= $modified;
	}


	public function toString(){
		return "[".($this->id==null?"-":$this->id)."] " . $this->name . " , ". $this->created . " , ". $this->modified . " . " ;
	}
}
?>