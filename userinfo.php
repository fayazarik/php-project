<?php
include 'dash_style.php'; ?>
<?php
$db = mysqli_connect("localhost", "root", "", "project");
session_start();
$email=$_SESSION['email'];
$sql = "SELECT * FROM user";
$result = mysqli_query($db,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Info</title>
    <link rel="stylesheet" href="css/work.css">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>
<form method="POST" >
<div class="query"><marquee>Welcome Admin!How's your day going?</marquee></div>
<div id="sidebar" >
    <div class="toggle_button" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul>
        
        
        <li> <a href="userinfo.php">User Information</a></li>
        
        <li> <a href="logout.php">Sign Out</a></li>
    </ul>
</div>

<script>
    function toggleSidebar(){
        document.getElementById("sidebar").classList.toggle('active');
    }
</script>
		<nav class="main-menu">
			 	<ul>
                
                    
                    <li><a class="current" href="#">User</a></li>
                   
                    <li><a href="logout.php" href="#">Sign out</a></li>
				</ul>
            </nav>
           <!-- <div class="registerbox">
            <h1>User Information</h1>
            </div> -->
                <div class="table-responsive">
                <table class="table table-dark">
            <thead>
			<th>Name</th>
			<th>Email</th>
			<th>Address </th>
			<th>Phone</th>
			
		</thead>
		<tbody>
        <?php 
                $db = mysqli_connect("localhost", "root", "", "project");
                $selectq= " SELECT * FROM user ";
                  $query = mysqli_query($db, $selectq);
                while($row = mysqli_fetch_assoc($query))
                  {
                    ?>
                    <tr>
                    <td> <?php  echo $row["name"]; ?> </td>
                    <td> <?php  echo $row["email"]; ?> </td>
                    <td> <?php  echo $row["address"]; ?> </td>
                    <td> <?php  echo $row["phone"]; ?> </td>
                    </tr>
                    <?php 
                }
         ?>
			
		</tbody>
  </table>
                </div>
                <div class="button">
	                <a href="signup.php" class="btn btn-primary">Add User</a>
                    <a href="updateMyProfile.php" class="btn btn-primary">update profile</a>
                    <a href="delete.php" class="btn btn-danger">Delete User</a>
                    <a href="loginVoter.php" class="btn btn-danger">Logout</a>
                </div>
     
        
</form>

</body>
</html>