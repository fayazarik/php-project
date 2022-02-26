<?php
session_start();
if(isset($_SESSION['email'])){
    session_destroy();
    echo "<script>
                        alert('You have been successfully logged out');
                    </script>";
}
else{
    header("location: loginVoter.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Logged Out</title>
    <link rel="stylesheet" href="css/work.css">
    <link rel="stylesheet" href="css/sidebar.css">
    </head>
    <body> 
    </div>
				 <a href="login.php?idd="><button type="button" class="btn btn-outline-danger">Log Back In</button></a>
                </section>
</body>
</html>