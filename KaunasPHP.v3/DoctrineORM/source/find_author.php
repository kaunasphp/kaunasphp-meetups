<?php
require_once "bootstrap.php";

$authorId = $argv[1];

$author = $entityManager->getRepository('Entity\Author')
                        ->find($authorId);

echo "Author name: " . $author->getName() . "\n";