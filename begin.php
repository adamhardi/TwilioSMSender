<?php
namespace Ruthvens;

use RuthvensLibrary\LetsPlay as GameBegin;

defined('PATH') or define('PATH', __DIR__);
// error_reporting(0);
set_time_limit(0);
ini_set("memory_limit","-1");
date_default_timezone_set('Asia/Jakarta');


require 'library/autoload.php';

$ruthvens = new GameBegin($config);
