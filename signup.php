<!DOCTYPE html>
<html> 
<head>
   <title>Registration</title>
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
    			xmlhttp.open("GET", "gethint.php?q=" + str, true);
    			xmlhttp.send();
  			}
		}
	</script>
 </head>
 
 <body>
 
 <?php
	
	
	include 'style.php';

	$server="localhost";
	$user="root";
	$password="";
	$db_name="project";

	$con= mysqli_connect($server,$user,$password,$db_name);

	if(isset($_POST['v1l']))
	{
		$name= $_POST['name'];
		$phone= $_POST['phone'];
		$email= $_POST['mail'];
		$address= $_POST['address'];
		$password=$_POST['passwoard'];



		$phonequery	="SELECT *FROM user WHERE phone='$phone'";
		$query_p= mysqli_query($con,$phonequery);
		$count=mysqli_num_rows($query_p);
		if($count!=0)
		{
			?>
				<script>
					alert("Phone no already used");
				</script>
			<?php
		}

		else
		{
			$insertquery="INSERT INTO user(name, email, password, address, phone) VALUES('$name', '$email', '$password', '$address', '$phone')";

			$iquery = mysqli_query($con,$insertquery);
			
			$_SESSION['name']=$name;
			$_SESSION['phone']=$phone;
			$_SESSION['address']=$address;
			$_SESSION['mail']=$email;

			header("location: success.php");


		}				
	}
	

?>	

	<div id="jj">

		<form action="signup.php" method="POST" >
			<div class="sUp"><h2>Create an account</h2></div>
			<div> 
				<h4>Name:</h4>
				<input type="text" name="name"  placeholder="Enter your name" required>
				
			</div> 

			<div>
				<h4> Phone: </h4>
				<input type="number" name="phone"  placeholder="Enter your phone no" required>
				
			</div>
			<div>
				<h4>Email:</h4>
				<input type="mail" name="mail" placeholder="Enter your mail address" required>
				
			</div>
			<div>
				<h4>Address:</h4>
				<input type="text" name="address" placeholder="Enter your address" onkeyup="showHint(this.value)" required>
				<h4>Suggestion:</h4>
				<span id="txtHint"></span>
				
			</div>
		
			<div>
				<h4>Password:</h4>
				<input type="passwoard" name="passwoard" placeholder="Enter your passwoard" required>
				
			</div>
			
			<div 
			style="text-align: center;"><input class="v1l" type="submit" name="v1l" value="Submit" required>
			
			<?php
              setcookie('identifier', 'abc', time()+10);
            ?>
			
			</div>

			<div class="link">
				Already have an account? <a href="loginVoter.php"><b>LOGIN</b></a>
			</div> 
		</form>


	</div>
</body>
</html>
