<?php
// bootstrap_doctrine.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once 'Doctrine/ORM/Tools/Setup.php';

// autoload
Setup::registerAutoloadDirectory(__DIR__);

// create a simples 'default' Doctrine ORM configuration for Annotation Mapping
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__.'/entities'), $isDevMode);

// database configuration parameters
$conn = array(
	  'driver' 	 => 'pdo_mysql'
	, 'user' 	 => 'root'
	, 'password' => 'hayabusa'
	, 'dbname' 	 => 'doctrine_blog_37571'
);


// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

?>