<?php
// Load configuration and environment variables
require_once 'config.php';

// Build Google OAuth URL
$auth_url = "https://accounts.google.com/o/oauth2/v2/auth?" . http_build_query([
    "client_id" => GOOGLE_CLIENT_ID,
    "redirect_uri" => GOOGLE_REDIRECT_URI,
    "response_type" => "code",
    "scope" => "email profile",
    "access_type" => "offline",
    "prompt" => "consent"
]);

// --- NORMAL LOGIN HANDLING ---
$login_error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = getDBConnection();
    $collection = $db->foodie;

    // Find user in MongoDB
    $user = $collection->findOne([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);

    if ($user) {
        // Store user info in session
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['logged_in'] = true;
        header("Location: main.php");
        exit();
    } else {
        $login_error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="main">
        <div id="sign">
            <!-- Normal Login Form -->
            <form method="POST">
                <h2>Login</h2>
                <?php if (!empty($login_error)) echo "<p style='color:#d32f2f;'>$login_error</p>"; ?>
                <input type="text" name="name" placeholder="Enter your name" required>
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="password" name="password" placeholder="Enter your password" required>
                <button type="submit">Login</button>
            </form>

            <!-- Google Login Button -->
            <a href="<?php echo htmlspecialchars($auth_url, ENT_QUOTES, 'UTF-8'); ?>">
                Login with Google
            </a>
            
            <p>Don't have an account? <a href="register.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>