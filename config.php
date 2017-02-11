<?php
// Composer Package Autoloader
require __DIR__ . '/vendor/autoload.php';

// Load in Packages
use Dotenv\Dotenv;
$dotenv = new Dotenv(__DIR__);
$dotenv->load();

use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');

// Create DB connection object
$db = new PDO("mysql:host=" . getenv('HOST') . ";dbname=" . getenv('DB'), getenv('DB_USER'), getenv('PASS'));