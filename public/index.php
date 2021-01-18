<?php

$title = 'Internet Joke Database';

//$output = '<h2>Internet Joke Database</h2>

//<p>Welcome to the Internet Joke Database</p>';

//require  '../templates/layout.html.php';

ob_start();
require '../templates/home.html.php';

$output = ob_get_clean();

require '../templates/layout.html.php';