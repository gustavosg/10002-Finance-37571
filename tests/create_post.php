<?php
require_once '../bootstrap.php';

// create a new Author
$author = new User();
$author->setName("The Writer");

// create new post
$post = new Post($author);
$post->setTitle("Title test!");
$post->setBody("Body test!!!");

// insert comments into the post
$post->addComment("First comment");
$post->addComment("Second comment");

// by now, none of the entities has been saved in the database

// to persist an entity, you need to call both methods: persist and flush
// flush is called to processed all persist previously called
$entityManager->persist($author);
$entityManager->persist($post);
$entityManager->flush();

// as soon as the post is persisted the ID is assigned with the created value
echo "Post created with id ".$post->getId()."!";
echo "<hr/>";
echo "<h1>Posts already created:</h1>";

// a repository allows access to the database for a specific entity 
$postRepo = $entityManager->getRepository("Post");
$posts = $postRepo->findAll();
showPosts($posts);

// function to present the post list
function showPosts($posts){
	echo "<ul>";
	foreach($posts as $post){
		showPost($post);
	}
	echo "</ul>";
}

// function to present the post as a list item 
function showPost($post){
		$author = $post->getAuthor();
		
		echo "<li>[".$post->getId()."] ".$post->getTitle()." : ".$post->getBody()."<br/>";
		echo "<i>Posted by <b>".$author->getName()."</b></i>";
		echo "<ul>";
		foreach($post->getComments() as $comment){
			echo "<li>".$comment->getComment()."</li>"; 
		}
		echo "</ul>";
		echo "</li>";
}
?>