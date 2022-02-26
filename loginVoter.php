<?php
//cho $_COOKIE['identifier'];
$db = mysqli_connect("localhost", "root", "","project");
if(isset($_POST['submit'])) 
{
    session_start();
    $email = $_POST['login'];
    $password = ($_POST['password']);
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $verify = mysqli_query($db, $sql);

    if(mysqli_num_rows($verify) == 1)
    {
      if(strpos($email,"admin") !== false)
        {
            $_SESSION['email'] = $email;
            header("location: userinfo.php");
        }
        else
        {
        $_SESSION['email'] = $email;
        header("location: homepage.php");
        }
    }
    else
    {
        echo "Incorrect information.Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
		<link rel="stylesheet" type="text/css" href="css/hr.css">
    </head>
    <body style="background-color:RGB(120, 255, 246);" >
    
<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint2.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>   
        
        <form class="form-4" method="POST" action="login.php">
    <h1 style="color:black;">Login</h1>
    <p>
        <label for="login">Email</label>
        <input type="text" name="login" onkeyup="showHint(this.value)" placeholder="Email" required>
        <p class="sp">Suggestions: <span id="txtHint"></span></p>
    </p>
    <p>
        <label for="password">Password</label>
        <input type="password" name='password' placeholder="Password" required> 
    </p>

    <p>
        <input type="submit" name="submit" value="Login">
    </p>       
</form>
    </body>
</html>