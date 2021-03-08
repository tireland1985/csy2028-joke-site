<?php

$title = 'Internet Jokes Database';

$joke = $jokesTable->find('id', 1);

$output = loadTemplate('../templates/home.html.php', ['joke' => $joke[0]]);