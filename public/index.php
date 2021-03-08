<?php
require '../functions/loadTemplate.php';
require '../database.php';
require '../classes/DatabaseTable.php';
require '../Controllers/JokeController.php';
require '../Controllers/CategoryController.php';

// invoke DatabaseTable class with the db connection, table name, and primary key column
$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
$categoriesTable = new DatabaseTable($pdo, 'category', 'id');

// invoke the relevant controllers using an array
$controllers = [];
$controllers['joke'] = new JokeController($jokesTable);
$controllers['category'] = new CategoryController($categoriesTable);

//topic 16 ex1: setup single point of entry for all pages (ex. index.php?page=jokes)
//topic 16 ex2: URL rewriting
//topic 16 ex3: Controllers
//topic 16 ex4: support multiple controllers
$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
if ($route == ''){
    $page = $controllers['joke']->home();
}
else { // if 'page' is not set, load home page
   list($controllerName, $functionName) = explode('/', $route);
   $controller = $controllers[$controllerName];
   $page = $controller->$functionName();
}

$output = loadTemplate('../templates/' . $page['template'], $page['variables']);
$title = $page['title'];

require '../templates/layout.html.php';