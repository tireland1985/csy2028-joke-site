<?php
require '../loadTemplate.php';
require '../database.php';
require '../functions.php';
$title = 'Internet Joke Database';

$joke = findJoke($pdo, 1);
$output = loadTemplate('../templates/home.html.php', ['joke' => $joke]);

require  '../templates/layout.html.php';