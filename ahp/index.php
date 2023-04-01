<?php include'header.php';?>
	
	<div id="content-login">
	<form action="login.php" method="post">
			<h1><center>Halaman Masuk</center></h1><br>
			<div class="control-group">
                <label for="Register[Username]">Username</label>
                <input type="text" name="Username" id="RegisterUsername" required autofocus>
            </div>

            <div class="control-group">
                <label for="Register[Password]">Password</label>
                <input type="password" name="Password" id="RegisterPassword" required>
            </div>
			
			<input type="submit" value="Log In">
			<input type="reset" value="Cancel">
            
	</form>
	</div>


	

