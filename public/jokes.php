<?php


$pdo = new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8', 'student', 'student');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM `joke`';
$result = $pdo->prepare($sql);
$result->execute();
/*
while ($row = $result->fetch()) {
   $jokes[] = $row['joketext'];
}*/

//$title = 'Joke list';
/*
$output = '';
foreach($jokes as $joke) {
	$output = $output . '<blockquote>';
	$output = $output . '<p>' . $joke . '</p>';
	$output = $output . '</blockquote>';
}

require  '../templates/layout.html.php'; */
/*ob_start();
require '../templates/list.html.php';
$output = ob_get_clean();

require '../templates/layout.html.php';*/

require '../loadTemplate.php';

$title = 'Joke list';

$templateVars = [
	'result' => $result
];

$output = loadTemplate('../templates/list.html.php', $templateVars);

require '../templates/layout.html.php';