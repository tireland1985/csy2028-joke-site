<?php

require '../loadTemplate.php';
require '../database.php';
require '../functions.php';

if (isset($_POST['joketext'])) {
	$joke = [
		'joketext' => $_POST['joketext'],
		'id' => $_POST['id']
	];

	update($pdo, 'joke',  $joke, 'id', $_POST['id']);

	header('location: jokes.php');
}
else {

	$jokes = find($pdo, 'joke', 'id', $_GET['id']);
	$templateVars = [
		'joke' => $jokes[0]
	];
	$output = loadTemplate('../templates/editjoke.html.php', $templateVars);
	$title = 'Edit joke';

}

require  '../templates/layout.html.php';