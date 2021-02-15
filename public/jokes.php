<?php
require '../loadTemplate.php';
require '../functions.php';
require '../database.php';

$jokes = findAll($pdo, 'joke');
$title = 'Joke list';

$templateVars = ['jokes' => $jokes];

$output = loadTemplate('../templates/list.html.php', ['jokes' => $jokes]);

require  '../templates/layout.html.php';
?>