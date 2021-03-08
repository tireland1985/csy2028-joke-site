<?php
require '../functions/loadTemplate.php';
require '../database.php';
require '../classes/DatabaseTable.php';

// invoke DatabaseTable class with the db connection, table name, and primary key column
$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

//setup single point of entry for all pages (ex. index.php?page=jokes)
if (isset($_GET['page'])){
    require '../pages/' . $_GET['page'] . '.php';
}
else { // if 'page' is not set, load home page
    require '../pages/home.php';
}
require  '../templates/layout.html.php';
