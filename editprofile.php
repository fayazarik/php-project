<?php
include 'dash_style.php'; ?>
<?php
session_start();
$email=$_SESSION['email'];
setcookie('identifier', 'Logged out', time()+200);
$db = mysqli_connect("localhost", "root", "", "onlinepollingsystem");

if(isset($_POST['update'])) {
    $email=$_SESSION['email'];
    $mname = $_POST['mname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $sql = "UPDATE admin SET name='$mname', address='$address', phone='$phone' WHERE email='$email'";
    mysqli_query($db, $sql);
    echo "<script>
                        alert('Profile Successfully Updated');
                    </script>";
}

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Profile</title>
    <link rel="stylesheet" href="css/work.css">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>
<form method="POST" action="editprofile.php">
<div id="sidebar" >
    <div class="toggle_button" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul>
        <li> <a href="AdminHome.php">Home</a></li>
        <li> <a href="addAdmin.php">Add Admin</a></li>
        <li> <a href="userinfo.php">User Information</a></li>
        <li> <a href="profile.php">Profile</a></li>
        <li> <a href="loginVoter.php">Sign Out</a></li>
    </ul>
</div>

<script>
    function toggleSidebar(){
        document.getElementById("sidebar").classList.toggle('active');
    }
</script>
		<nav class="main-menu">
			 	<ul>
                    <li><a href="AdminHome.php">Home</a></li>
                    <li><a class="addAdmin.php" href="#">Add Admin</a></li>
                    <li><a class="userinfo.php" href="#">User</a></li>
                    <li><a class="current" href="#">Profile</a></li>
                    <li><a class="loginVoter.php" href="#">Sign out</a></li>
                    
					<li><a href="#section">Contact</a></li>
				</ul>
            </nav>
            <div>
                <section class="registerbox">
                    <h1>Edit Profile</h1>
                    <div class="textbox">
                        <input type="text" placeholder="Enter New Name" name="mname">
        
                    </div>
                    <div class="textbox">
                    <input type="text" placeholder="Enter New Address" name="address">
        
                    </div>
                    <div class="textbox">
                    <input type="text" placeholder="Enter New Phone Number" name="phone">
        
                    </div>
                    <div >
                        <input class="btn"  type="submit" value="Update" name="update">
                    </div>
				<td> <a href="profile.php?idd="><button type="button" class="btn btn-outline-danger">Go Back</button></a> </td>
                </section>
                </div>
     
        
</form>

</body>
</html>


