<?php
$routeFile = __DIR__ . DIRECTORY_SEPARATOR . 'File.php';
$routeRedirect = __DIR__ . DIRECTORY_SEPARATOR . 'Redirect.php';
require_once($routeFile);
require_once($routeRedirect);
$file = new File($_FILES['file'], 'png,pdf,zip');
if($file->validateFormat() && $file->validateSize())
    $file->upload('./upload/');
/* Redirecting the user to the index.php page. */
Redirect::to('index.php');