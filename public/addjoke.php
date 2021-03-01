<?php
// no longer used as of ex 2 from topic 14 - 22/02/21
require '../loadTemplate.php';
require '../DatabaseTable.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

if (isset($_POST['joketext'])) {

	require '../database.php';

	$date = new DateTime();
	$joke = [
		'joketext' => $_POST['joketext'],
		'jokedate' => $date->format('Y-m-d H:i:s')
	];
	// insert using $pdo to 'joke' table using data from $joke
	$jokesTable->save($joke);

	header('location: jokes.php');

}
else {
	$output = loadTemplate('../templates/addjoke.html.php', []);

	$title = 'Add a new joke';
}

require  '../templates/layout.html.php';