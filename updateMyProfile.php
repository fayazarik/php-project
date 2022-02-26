<?php
include 'header.php';
?>

<style>
    .sss
    {
        margin-left: 35%;
        margin-right: 25%;
        margin-top: 10%;
        margin-bottom: 25%;
    }
    .ss
    {
        padding: 10px;
    }
    .ssb
    {
        width: 120px;
        margin-left: 8px;
    }
    input
    {
        width: 470px;
        height: 25px;
    }
</style>

<?php 
    $db = mysqli_connect("localhost", "root", "", "onlinepollingsystem");
    session_start();
    $email = $_SESSION['email'];
    $selectq= " SELECT * FROM user WHERE email='$email'";
    $query = mysqli_query($db, $selectq);
    $result = mysqli_fetch_assoc($query);

 ?>
 <body>
    <script src="validation.js"></script>

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
    xmlhttp.open("GET", "gethintProfile.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>

</body>
<form action="updateMyProfile.php" method="POST">

    <div class="sss">

    <div class="ss">
        <h4>Name:</h4>
        <input type="text" name="name" class="btn1" value="<?php echo $result['name'] ?>" placeholder="Name" >
    </div>
    <div class="ss">
        <h4>Address:</h4>
        <input type="text" name="address" class="btn1" value="<?php echo $result['address']?>" onkeyup="showHint(this.value)" placeholder="Address" >
        <p class="sp"> <span id="txtHint"></span></p>
    </div >
    <div class="ss">
        <h4>Phone:</h4>
        <input type="text" name="phone" class="btn1" value="<?php echo $result['phone'] ?>" placeholder="Phone" >
    </div>
    <div class="ss">
        <h4>Password:</h4>
        <input type="text" name="password" class="btn1" value="<?php echo $result['password'] ?>" placeholder="Password" >
    </div>

    <div >
        <input type="submit" class="ssb" name="edit" value="Save">
    </div>
    <div class="button">
	                <a href="userinfo.php" class="btn btn-primary">Back</a>
</div>
    </div>
</form>
<?php
if(isset($_POST['edit']))
    {
        $con = mysqli_connect("localhost", "root", "", "project");
        session_start();
        $email = $_SESSION['email'];

        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $updatequery="UPDATE user SET name ='$name', address='$address', phone='$phone', password='$password' WHERE email = '$email' ";

        $iquery = mysqli_query($con,$updatequery);

        if($iquery)
        {
            ?>
                <script>
                    alert('Updated Successfully!');
                </script>
            <?php
            header("location: userprofile.php" );
        }
        else
        {
            ?>
                <script>
                    alert('Something is wrong. Please Try Again!');
                </script>
            <?php
        }
    }
    ?>
    <?php
	include 'footer.php';
?>
