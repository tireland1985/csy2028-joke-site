<?php
if (isset($_POST['joketext'])) {

	$pdo = new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8', 'student', 'student');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$date = new DateTime();

	$sql = 'INSERT INTO `joke` (joketext,jokedate) VALUES (:joketext, :jokedate)';

	$stmt = $pdo->prepare($sql);

	$stmt->execute(['joketext' => $_POST['joketext'], 'jokedate' => $date->format('Y-m-d H:i:s')]);

	header('location: jokes.php');



}
else {
/*	$title = 'Add a new joke';

	$output = '<form action="" method="post">
		<label for="joketext">Type your joke here:</label>
		<textarea id="joketext" name="joketext" rows="3" cols="40"></textarea>
		<input type="submit" value="Add">
	</form>';*/

	ob_start();
	require '../templates/addjoke.html.php';
	$output = ob_get_clean();

	$title = 'Add a new Joke';
}

require  '../templates/layout.html.php';