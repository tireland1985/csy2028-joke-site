<?php
	$pdo = new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8', 'student', 'student', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);