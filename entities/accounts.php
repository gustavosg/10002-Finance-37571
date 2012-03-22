<?php
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

	/**
	 * @OneToMany(targetEntity="Expenditure", inversedBy="account_id")
	 **/
	protected $expenditure;

	public function __construct(Post $post, $text){
		//@todo continuar o método construtor de Accounts
		$this->post = $post;
		$this->comment = $text;
	}

	public function getPost(){
		return $this->post;
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

}

?>