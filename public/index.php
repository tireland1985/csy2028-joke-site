<?php
require '../functions/loadTemplate.php';
require '../database.php';
require '../classes/DatabaseTable.php';
require '../Controllers/JokeController.php';

// invoke DatabaseTable class with the db connection, table name, and primary key column
$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

$jokeController = new JokeController($jokesTable);

//ex1: setup single point of entry for all pages (ex. index.php?page=jokes)
//ex2: URL rewriting
//ex3: Controllers
if ($_SERVER['REQUEST_URI'] !== '/'){
    $functionName = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
    $page = $jokeController->$functionName();
}
else { // if 'page' is not set, load home page
   $page = $jokeController->home();
}

$output = loadTemplate('../templates/' . $page['template'], $page['variables']);
$title = $page['title'];

require '../templates/layout.html.php';