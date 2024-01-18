<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $dublicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($dublicate) > 0){
        echo
        "<script> alert('account already taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUE('','$name','$username', '$email', '$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Suvvessful'); </script>";
        }
        else{
            echo
            "<script> alert('Password does not match'); </script>";
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
    <link rel="stylesheet" href="">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f2f2f2;
    text-align: center;
  }
  .reg {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.reg h1 {
  text-align: center;
  
}
</style>
<body>
<div class="reg">
    <h1>Register</h1>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required value=""><br>
        <label for="username">userName:</label>
        <input type="text" name="username" id="username" required value=""><br>
        <label for="email">email:</label>
        <input type="text" name="email" id="email" required value=""><br>
        <label for="password">password:</label>
        <input type="password" name="password" id="password" required value=""><br>
        <label for="confirmpassword">confirmpassword:</label>
        <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>
        <button type="submit" name="submit">Register</button>

    </form>
    <a class="login" href="login.php">login</a>
    </div>
</body>
</html>