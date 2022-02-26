<?php
include 'header.php';
?>

<style>
	.button
	{
		margin-left: 32%;
		padding-bottom: 20px;
	}

</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!--My Profile starts here-->
<body>
<h1>My Profile</h1><br>
<div class="table-responsive">
  <table class="table">
    <thead>
			<th>Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Password</th>
			<th></th>
		</thead>
		<tbody>
			<?php 

				$db = mysqli_connect("localhost", "root", "", "onlinepollingsystem");
				session_start();
				$email = $_SESSION['email'];
				$selectq= " SELECT * FROM user WHERE email='$email' ";
			  	$query = mysqli_query($db, $selectq);
			  	while($result = mysqli_fetch_assoc($query))
			  	{
			?>		
			<tr>
				<td> <?php echo $result['name']; ?> </td>
				<td> <?php echo $result['address']; ?> </td>
				<td> <?php echo $result['phone']; ?> </td>
				<td> <?php echo $result['password']; ?> </td>
				<td> <a href="updateMyProfile.php?email=<?php echo $result['email']; ?>"><button type="button" class="btn btn-outline-info">Update</button></a> </td>
				<td> <a href="loginVoter.php"><button type="submit" class="btn btn-outline-info" name="logout">Logout</button></a> </td>
				<td> <a href="fileuploadnew.php"><button type="submit" class="btn btn-outline-info" name="uploadfiles">Upload Files</button></a> </td>

      <?php




            setcookie('identifier', 'Logged out', time()+5);
      ?>
			</tr>
		<?php 
			}
		 ?>	
		</tbody>
  </table><hr><br>
  <!--My Profile ends here-->

  <!--Movie Info starts here-->
  <h1>My Files</h1><br>
<div class="table-responsive">
  <table class="table">
    <thead>
			<th>Number</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>State</th>
			<th>Zip</th>
		</thead>
		<tbody>
			<?php 
				$db = mysqli_connect("localhost", "root", "", "onlinepollingsystem");
				$selectq= " SELECT * FROM employee WHERE email='$email' ";
				  $query = mysqli_query($db, $selectq);
			  	while($result = mysqli_fetch_assoc($query))
			  	{
					?>		
					<tr>
						<td> <?php echo $result['number']; ?> </td>
						<td> <?php echo $result['firstname']; ?> </td>
						<td> <?php echo $result['lastname']; ?> </td>
						<td> <?php echo $result['state']; ?> </td>
						<td> <?php echo $result['zip']; ?> </td>
					</tr>
				
					<?php 
				}
		 ?>	
		</tbody>
  </table><hr><br>
  <!--Movie Info Ends here--> 
</div>
</body>


