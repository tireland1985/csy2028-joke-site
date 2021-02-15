<?php
require '../database.php';
require '../functions.php';

delete($pdo, 'joke', 'id', $_POST['id']);

header('location: jokes.php');