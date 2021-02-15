<?php

require '../loadTemplate.php';
require '../database.php';
require '../functions.php';

if (isset($_POST['joketext'])) {
	$joke = [
		'joketext' => $_POST['joketext']
	];

	updateJoke($pdo, $joke, 'id', $_POST['id']);

	header('location: jokes.php');
}
else {

	$joke = findJoke($pdo, $_GET['id']);
	$output = loadTemplate('../templates/editjoke.html.php', ['joke' => $joke]);
	$title = 'Edit joke';

}

require  '../templates/layout.html.php';