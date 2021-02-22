<?php

require '../loadTemplate.php';
require '../database.php';
require '../functions.php';

if (isset($_POST['joke'])) {
	$date = new DateTime();

	$joke = $_POST['joke'];
	$joke['jokedate'] = $date->format('Y-m-d H:i:s');
	
	save($pdo, 'joke',  $joke, 'id');

	header('location: jokes.php');
}
else {

	if (isset($_GET['id'])){
		$result = find($pdo, 'joke', 'id', $_GET['id']);
		$joke = $result[0];
	}
	else { 
		$joke = false;
	}
/*	$jokes = find($pdo, 'joke', 'id', $_GET['id']);
	$templateVars = [
		'joke' => $jokes[0]
	];
	$output = loadTemplate('../templates/editjoke.html.php', $templateVars);
	*/
	$output = loadTemplate('../templates/editjoke.html.php', ['joke' => $joke]);
	$title = 'Edit joke';

}

require  '../templates/layout.html.php';