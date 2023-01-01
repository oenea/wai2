<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../../vendor/autoload.php';

require_once '../dispatcher.php';
require_once '../routing.php';
require_once '../controllers.php';

session_start();

$action_url = $_GET['action'];
dispatch($routing, $action_url);
