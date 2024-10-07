<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start the session

// Unset all session variables
$_SESSION = [];

// If it's desired to kill the session, also delete the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session
session_destroy();

// Redirect to the login page with a success message
header("Location: http://localhost/MINI%20PROJECT/Login/login.php?message=logout_successful");
exit();
?>
