<?php
use Doctrine\Common\Collections\ArrayCollection;

/** @Entity */
class Post {

	/** @Id @GeneratedValue @Column(type="integer") */
	protected $id;
	/** @Column(type="string") */
	protected $title;
	/** @Column(type="text") */
	protected $body;
	
	/** @ManyToOne(targetEntity="User") */
	protected  $author;
	
	/** 
     * @OneToMany(targetEntity="Comment", mappedBy="post",
     *   cascade={"persist"})
   	 */
	protected $comments;
	
	/**
	 * The Author is mandatory to create a Post
	 */
	public function __construct(User $author){
		$this->author = $author;
		$this->comments = new ArrayCollection();
	}
	
 	public function addComment($text){
        $this->comments[] = new Comment($this, $text);
    }
    
    
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}

	public function getTitle(){return $this->title;}
	public function setTitle($title){$this->title = $title;}

	public function getBody(){return $this->body;}
	public function setBody($body){$this->body = $body;}
	
	public function getAuthor(){return $this->author;}
	
	public function getComments(){return $this->comments;}
}
?>