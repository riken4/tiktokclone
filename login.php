<!DOCTYPE html>
<html lang="en">

<head>
    

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
  .ff {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.ff h1 {
  text-align: center;
  
}
.loginform {
  display: flex;
  flex-direction: column;
}
.userpass {
  margin-bottom: 15px;
}
.userpass input {
  padding: 8px;
  font-size: 16px;
  border-radius: 3px;
  border: 1px solid #ccc;
}
.loginb input{
padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 3px;
 
  color: #000;
  cursor: pointer;
  transition: background-color 0.3s ease;

}
.loginb input:hover {
  background-color: #0056b3;
}
button {
  padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 3px;
  
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}
</style>

<body>
    <div class="ff">
            <h1>LOGIN</h1>
            <form class="loginform">
                <div class="userpass">
            Username <br> <input type="text" name="username" placeholder=" ">
            <br>
            Password <br> <input type="password" name="password">
            <br>
            <div class="loginb"><input type="submit" name="submit" value="LogIn"></div>
            </div>
            <p>Create an account</p>
            
            <button><a href="register.php">Register</a></button>


        </form>
        <?php
        include 'config.php';
        session_start();
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM tb_user where username='$username' and password='$password'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $_SESSION['Login_session'] = $username;
                echo "Login Sucess";
                header("Location: http://localhost/webfinal/home.html ");

            } else {
                echo "invalid user";
            }
        }
        ?>
</body>

</html>