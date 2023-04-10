<?php

use toDo\Classes\Request;
use toDo\Classes\Session;
use toDo\Classes\Validation\ValidationClass;

require_once 'inc/connection.php';
require_once 'classes/Request.php';
require_once 'classes/Session.php';
require_once 'classes/validation/Required.php';
require_once 'classes/validation/Str.php';
require_once 'classes/validation/validation.php';

$request = new Request;
$session = new Session;
$validation = new ValidationClass;
