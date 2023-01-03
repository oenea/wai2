<?php
//error_reporting(E_ALL);
//error_reporting(E_ERROR | E_PARSE);
error_reporting(0);
ini_set('display_errors', 1);

require '../../vendor/autoload.php';

require_once '../dispatcher.php';
require_once '../routing.php';
require_once '../controllers.php';

session_start();
session_regenerate_id();

$action_url = $_GET['action'];
dispatch($routing, $action_url);
