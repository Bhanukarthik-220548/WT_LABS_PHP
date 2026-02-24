<?php
/**
 * Configuration file - Load environment variables using Composer's dotenv
 */

// Require Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Google OAuth Configuration
define('GOOGLE_CLIENT_ID', $_ENV['GOOGLE_CLIENT_ID'] ?? '');
define('GOOGLE_CLIENT_SECRET', $_ENV['GOOGLE_CLIENT_SECRET'] ?? '');
define('GOOGLE_REDIRECT_URI', $_ENV['GOOGLE_REDIRECT_URI'] ?? '');

// Validate critical configs
if (empty(GOOGLE_CLIENT_ID) || empty(GOOGLE_CLIENT_SECRET) || empty(GOOGLE_REDIRECT_URI)) {
    error_log("OAuth configuration missing in .env file");
}

// MongoDB Configuration
define('MONGO_URI', 'mongodb://localhost:27017');
define('MONGO_DB_NAME', 'foodiedb');

/**
 * Get MongoDB connection
 */
function getDBConnection() {
    try {
        $client = new MongoDB\Client(MONGO_URI);
        $db = $client->selectDatabase(MONGO_DB_NAME);
        return $db;
    } catch (Exception $e) {
        die("MongoDB Connection failed: " . htmlspecialchars($e->getMessage()));
    }
}

?>
