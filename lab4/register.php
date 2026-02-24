<?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            $conn=new mysqli("localhost","root","","foodiedb");
            if($conn->connect_error){
                die("connection failed:".$conn->connect_error);
            }
            $sql="INSERT INTO foodie(name,email,password) Values('$name','$email','$password')";

            if($conn->query($sql)==True){
                echo "registration successful";
                header("Location:main.php");
                exit();
            }else{
                echo "error:".$sql."<br>".$conn->error;
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
                <button type="submit">sign in</button><br>
                <p>already have an account <a href="login.php">login</a></p>
           </form>
        </div>
    </div>
</body>
</html>