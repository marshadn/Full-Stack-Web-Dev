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
        alert("Passwords is not secure. Please re-enter your password.");
        return false;
      }

      return true;
    }
  </script>
</head>
<body>
  <h2>Register</h2>
  <form action="register.php" method="post" onsubmit="return validateForm()">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="name">Name:</label>
    <input type="text" id="Name" name="Name" required>
    <br>
    <label for="age">Age:</label>
    <select name='age'>
        <?php
            for($i=18;$i<60;$i++)
                echo "<option value=$i>$i</option>" ;
        ?>
    </select>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required oninput="validatePassword()">
    <span id="passwordError" style="color: red;"></span>
    <br>
    <label for="reenterPassword">Re-enter Password:</label>
    <input type="password" id="reenterPassword" name="reenterPassword" required>
    <input type="submit" value="Submit">
  </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include '.\conn.php';
  $name=$_POST['Name'];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $age=$_POST['age'];
  $q="INSERT INTO biodata (Name,age,password,username) VALUES ('$name','$age', '$password','$username')";

  $re=mysqli_query($res,$q);
  if($re)
  {
    echo("<script>alert('Success')</script>");
  } 
  else {
    echo("<script>alert('Invalid username or password. Please try again')</script>");
  }
}
?>
