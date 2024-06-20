<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <script>
    function validatePassword() {
      var password = document.getElementById("password").value;
      var minLength = 8;
      var hasUpperCase = /[A-Z]/.test(password);
      var hasLowerCase = /[a-z]/.test(password);
      var hasDigit = /\d/.test(password);

      if (password.length < minLength || !hasUpperCase || !hasLowerCase || !hasDigit) {
        document.getElementById("passwordError").innerText = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.";
        return false;
      } else {
        document.getElementById("passwordError").innerText = "";
        return true;
      }
    }

    function validateForm() {
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      var reenterPassword = document.getElementById("reenterPassword").value;
      if (password !== reenterPassword) {
        alert("Passwords do not match. Please re-enter your password.");
        return false;
      }
      if (!validatePassword()) {
        alert("Invalid Password")
      }

      return true;
    }
  </script>
</head>
<body>
  <h2>Login</h2>
  <form action="login.php" method="post" onsubmit="return validateForm()">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required oninput="validatePassword()">
    <span id="passwordError" style="color: red;"></span>
    <br>
    <label for="reenterPassword">Re-enter Password:</label>
    <input type="password" id="reenterPassword" name="reenterPassword" required>
    <br>
    <input type="submit" value="Login">
    <br>
    <input type="button" value="register" onclick="location.href='register.php';">
  </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include '.\conn.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $q="select * from biodata where username='$username' and password='$password'";
  $re=mysqli_query($res,$q);
  if(mysqli_num_rows($re)>0)
  {
    echo("Login successful!");
    header("location:welcome.html");
  } 
  else {
    echo("<script>alert('Invalid username or password. Please try again')</script>");
  }
}
?>
