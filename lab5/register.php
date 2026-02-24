<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = getDBConnection();
    $collection = $db->foodie;

    // Check if user already exists
    $existingUser = $collection->findOne(['email' => $email]);
    if ($existingUser) {
        echo "Error: User with this email already exists";
    } else {
        // Insert new user into MongoDB
        try {
            $result = $collection->insertOne([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'created_at' => new MongoDB\BSON\UTCDateTime()
            ]);
            echo "Registration successful";
            header("Location: main.php");
            exit();
        } catch (Exception $e) {
            echo "Error: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div id="main">
        <div id="sidebar">
            <img src="burger.webp" alt="burger" width="100%" height="100%">
        </div>
        <div id="sign">
           <h1>Create account</h1>
           <form method="POST">
                <input type="text" placeholder="enter your name"  name="name" required>
                <input type="mail" placeholder="mail" name="email" required>
                <input type="password" placeholder="password" name="password" required>
                <label class="check"><input type="checkbox" required>i agree terms and conditons</label>
                <button type="submit">sign up</button><br>
                <p>already have an account <a href="login.php">login</a></p>
           </form>
        </div>
    </div>
    
</body>
</html>