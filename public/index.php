<?php
require '../functions/loadTemplate.php';
require '../database.php';
require '../classes/DatabaseTable.php';

// invoke DatabaseTable class with the db connection, table name, and primary key column
$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

//ex1: setup single point of entry for all pages (ex. index.php?page=jokes)
//ex2: URL rewriting
if ($_SERVER['REQUEST_URI'] !== '/'){
    require '../pages/' . ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/') . '.php';
}
else { // if 'page' is not set, load home page
    require '../pages/home.php';
}
require  '../templates/layout.html.php';
