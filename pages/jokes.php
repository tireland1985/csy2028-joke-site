<?php

$jokes = $jokesTable->findAll();
$title = 'Joke list';

$output = loadTemplate('../templates/list.html.php', ['jokes' => $jokes]);

?>