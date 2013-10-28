<?php
require_once "bootstrap.php";

$comments = $entityManager->getRepository('Entity\Comment')
                          ->getBadComments(5);

foreach ($comments as $comment) {
    echo "Bad Comment: " . $comment->getText() . "\n";
    echo "Author: " . $comment->getAuthor()->getName() . "\n\n";
}