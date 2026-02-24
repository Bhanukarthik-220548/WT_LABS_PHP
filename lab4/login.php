<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

   $conn=new mysqli("localhost","root","","foodiedb");
    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
        $sql="SELECT * FROM foodie WHERE name='$name' AND email='$email' AND password='$password'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            echo "login successful";
            header("Location:main.php");
            exit();
        }else{
            echo "invalid credentials";
        }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="main">
        <div id="sign">
            <form method="POST">
                <h2>Login</h2>
                <input type="text" name="name" placeholder="Enter your name" required><br><br>
                <input type="email" name="email" placeholder="Enter your email" required><br><br>
                <input type="password" name="password" placeholder="Enter your password" required><br><br>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>