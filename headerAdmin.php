 <!DOCTYPE html>
 <html>
    <head>
        <title> <?php //echo html_title($the_title); ?></title>
        <link rel="stylesheet" href="css/template.css">
        <link rel="stylesheet" href="css/sidebar.css">
    </head>
    <body>
        <div class="query"><marquee>Welcome Admin!how's your day going?</marquee>
        <div id="sidebar" >
    <div class="toggle_button" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul>
        <li> <a href="AdminHome.php">Home</a></li>
        <li> <a href="addAdmin.php">Add Admin</a></li>
        <li> <a href="addMovie.php">Add Movie</a></li>
        <li> <a href="userinfo.php">User Information</a></li>
        <li> <a href="profile.php">Profile</a></li>
        <li> <a href="signOut.php">Sign Out</a></li>
    </ul>
</div>

<script>
    function toggleSidebar(){
        document.getElementById("sidebar").classList.toggle('active');
    }
</script>
    
    
    
    </div>
	<nav class="main-menu">
			 	<ul>
                    <li><a class="current" href="#">Home</a></li>
<!--				<li><a href="profile.php">Profile</a></li>					-->
					<li><a href="#contact">Contact</a></li>
				</ul>
	 		</nav>
	 <header class="header-part">
	 	<div class="header-overlay">
         <div class="kilibili">
	 			<div class="content text-center">
					 <h1>Welcome!</h1>
					
				</div>
	 		</div>
	 	</div>
	 </header>
           <!-- <div id="navigation"> --> 
               <?php //echo main_nav(); ?> 
            </div>
      
       