<?php 

use Sukroncrb2025\Abiesoft\Sistem\App;

session_start();
date_default_timezone_set("Asia/Bangkok");

require_once __DIR__."/../vendor/autoload.php";

$app = new App;

$app->start();