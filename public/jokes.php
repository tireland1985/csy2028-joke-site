<?php


$pdo = new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8', 'student', 'student');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM `joke`';
$result = $pdo->query($sql);

while ($row = $result->fetch()) {
   $jokes[] = $row['joketext'];
}

$title = 'Joke list';

$output = '';
foreach($jokes as $joke) {
	$output = $output . '<blockquote>';
	$output = $output . '<p>' . $joke . '</p>';
	$output = $output . '</blockquote>';
}

require  '../templates/layout.html.php';