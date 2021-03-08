<?php

$jokesTable->delete($_POST['id']);

header('location: index.php?page=jokes');