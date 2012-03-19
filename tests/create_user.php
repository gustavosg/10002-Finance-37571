<?php
require_once '../bootstrap.php';

// create an User object and set its name
$user = new User();
$user->setName("Italo Giovani Abdanur Stefani");

// note there is no ID yet
echo "Inserting User <i>". $user->toString() . "</i><br/>" ;

// persist user (INSERT/UPDATE command not yet executed)
$entityManager->persist($user);
// batch execution of all persist call
$entityManager->flush();


echo "User inserted: <i>". $user->toString() . "</i><br/>";

// a repository allows access to the database for a specific entity 
$userRepo = $entityManager->getRepository("User");
$users = $userRepo->findAll();
foreach ($users as $user){
	echo "<ul>";
	echo "<li>".$user->toString()."</li>";
	echo "</ul>";
}


?>