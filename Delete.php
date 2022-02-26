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
<form action="delete.php" method="POST">

    <div class="sss">

    <div class="ss">
        <h4>Email:</h4>
        <input type="text" name="removeuser" class="btn1" placeholder="Email" >
    </div>
    <div >
        <input type="submit" class="ssb" name="edit" value="Delete">
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
        $removeuser=$_POST['removeuser']; 
        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $updatequery="DELETE FROM user WHERE email = '$removeuser' ";

        $iquery = mysqli_query($con,$updatequery);

        if($iquery)
        {
            ?>
                <script>
                    alert('Delete Successfully!');
                </script>
            <?php
            header("location: userinfo.php" );
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
