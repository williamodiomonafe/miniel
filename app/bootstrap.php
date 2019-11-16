<?php
// Create a session...
session_start();

// Start Output Buffering...
ob_start();

require_once dirname(__DIR__) . '/vendor/autoload.php';

require_once 'config/app.php';

require_once 'functions.php';

date_default_timezone_set('Africa/Lagos');


if(isset($_COOKIE[DOMAIN_NAME . '_uid'])) {
  $_SESSION[DOMAIN_NAME . '_uid'] = $_COOKIE[DOMAIN_NAME . '_uid'];
}