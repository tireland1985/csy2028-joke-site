<?php
require '../loadTemplate.php';
require '../functions.php';
require '../database.php';

$sql = 'SELECT * FROM joke';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$jokes = $stmt->fetchAll();

$jokes;
$title = 'Joke list';

$templateVars = ['jokes' => $jokes];

$output = loadTemplate('../templates/list.html.php', ['jokes' => $jokes]);

require  '../templates/layout.html.php';
?>