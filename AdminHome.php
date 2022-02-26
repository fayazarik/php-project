<?php
include 'dash_style.php'; ?>
<?php
            session_start();
            $email=$_SESSION['email'];
             setcookie('identifier', 'Logged out', time()+200);
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Home</title>
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
        
        <li> <a href="userinfo.php.php">Add Admin</a></li>
       
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
                 <li><a class="current">Home</a></li>
                    
                    <li><a href="userinfo.php" href="#">User</a></li>
                   
                    <li><a href="loginVoter.php" href="#">Sign out</a></li>
				</ul>
            </nav>
            <div class="button">
	<a href="AdminHome.php" class="btn btn-primary">All Information</a>
	<a href="loginVoter.php" class="btn btn-danger">Logout</a>
	

</div>
                <div class="table-responsive">
                <table class="table table-dark">
            <thead>
			<th>User Name</th>
			<th>Vote</th>
			<th>Personal Rating </th>
			<th>Comment </th>
			
		</thead>
		<tbody>
        <?php 
                $db = mysqli_connect("localhost", "root", "", "onlinepollingsystem");
                $selectq= " SELECT * FROM thriller ";
                $selectq2= " SELECT * FROM action1 ";
                $selectq3= " SELECT * FROM drama ";
                  $query = mysqli_query($db, $selectq);
                  $query2 = mysqli_query($db, $selectq2);
                  $query3 = mysqli_query($db, $selectq3);
                  while($row = mysqli_fetch_assoc($query))
                  {
                    ?>
                    <tr>
                    <td> <?php  echo $row["uemail"]; ?> </td>
                    <td> <?php  echo $row["vote"]; ?> </td>
                    <td> <?php  echo $row["personalrating"]; ?> </td>
                    <td> <?php  echo $row["comment"]; ?> </td>

                    </tr>
                    <?php 
                }
                while($row = mysqli_fetch_assoc($query2))
                  {
                    ?>
                    <tr>
                    <td> <?php  echo $row["uemail"]; ?> </td>
                    <td> <?php  echo $row["vote"]; ?> </td>
                    <td> <?php  echo $row["personalrating"]; ?> </td>
                    <td> <?php  echo $row["comment"]; ?> </td>
                    </tr>
                    <?php 
                }
                while($row = mysqli_fetch_assoc($query3))
                  {
                    ?>
                    <tr>
                    <td> <?php  echo $row["uemail"]; ?> </td>
                    <td> <?php  echo $row["vote"]; ?> </td>
                    <td> <?php  echo $row["personalrating"]; ?> </td>
                    <td> <?php  echo $row["comment"]; ?> </td>
                    </tr>
                    <?php 
                }
         ?>
			
		</tbody>
  </table>
                </div>
     
        
</form>
<p><button id="showInfo" class="btn btn-warning">Need Help?</button></p> <br>
                    <div id="showme" style="color: white"></div>
                    <script>
                        document.getElementById("showInfo").addEventListener('click', onProcess);
                        function onProcess(){
                            var req = new XMLHttpRequest();
                            req.open('GET', 'help.json', true);
                            req.onload = function() {
                                if(req.status==200){
                                    var dataItem = JSON.parse(req.responseText);
                                    var display = '';
                                    display += '<ol>'+
                                        '<li>1: '+dataItem.a+'</li>'+
                                        '<li>2: '+dataItem.b+'</li>'+
                                        '<li>3: '+dataItem.c+'</li>'+
                                        '<li>4: '+dataItem.d+'</li>'+
                                        '</ol>';
                            document.getElementById('showme').innerHTML = display;
                                }
                            } 
                            req.send();
                        }
                    </script>

</body>
</html>