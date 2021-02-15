<?php

require '../loadTemplate.php';
require '../functions.php';

if (isset($_POST['joketext'])) {

	require '../database.php';

	$date = new DateTime();
	$joke = [
		'joketext' => $_POST['joketext'],
		'jokedate' => $date->format('Y-m-d H:i:s')
	];
	// insert using $pdo to 'joke' table using data from $joke
	insert($pdo, 'joke', $joke);

	header('location: jokes.php');

}
else {
	$output = loadTemplate('../templates/addjoke.html.php', []);

	$title = 'Add a new joke';
}

require  '../templates/layout.html.php';