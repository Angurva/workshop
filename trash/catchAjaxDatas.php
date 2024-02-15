<?php declare (strict_types = 1);

use Controllers\AnnouncesController;


$min = $_POST['min'];
$max = $_POST['max'];

$request = new Request();

var_dump($request->getPost());