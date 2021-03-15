<?php

require '../autoload.php';

$routes = new \IJDB\Routes();
$entryPoint = new \CSY2028\EntryPoint($routes);
$entryPoint->run();
