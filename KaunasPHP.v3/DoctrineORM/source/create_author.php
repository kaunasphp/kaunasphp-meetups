<?php
require_once "bootstrap.php";

$newAuthor = $argv[1];

$author = new Entity\Author();
$author->setName($newAuthor);

$entityManager->persist($author);
$entityManager->flush();

echo "Created Author with ID " . $author->getId() . "\n";