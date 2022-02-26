
<!DOCTYPE html>
<html>
<head>
<title>File Upload</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
  
  <label>File Upload</label>
    <input type="File" name="file">
   <input type="submit" name="submit">
   <div class="button">
	                <a href="userprofile.php" class="btn btn-primary">Back</a>
</div>
 
</form>

</body>
</html>
 
<?php 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "project";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
 
if (isset($_POST["submit"]))
 {
     $open = fopen('employee-data.txt','r');
 
while (!feof($open)) 
{
 $getTextLine = fgets($open);
$explodeLine = explode(",",$getTextLine);

list($number,$firstname,$lastname,$email,$state,$zip) = $explodeLine;

$qry = "insert into employee (`number`,`firstname`,`lastname`,`email`,`state`,`zip`) values('".$number."','".$firstname."','".$lastname."','".$email."','".$state."','".$zip."')";

mysqli_query($conn,$qry);
}

 
fclose($open);
 
   

}
 


 
?>



						