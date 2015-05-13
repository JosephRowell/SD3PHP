<?php 
	include_once("config.php");
?>

<?php if( !(isset( $_POST['register'] ) ) ) { ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Dorm Picker</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    
    <body>
        <header id="head" >
        	<p>Log in</p>
        	<p><a href="register.php"><span id="register">Register</span></a></p>
        </header>
        
        <div id="main-wrapper">
        	<div id="register-wrapper">
            	<form method="post">
                	<ul>
						<li>
                        	<label for="firstname">First Name : </label>
                        	<input type="text" required id="firstname" maxlength="30" autofocus name="firstname" />
                    	</li>
						
						<li>
                        	<label for="lastname">Last Name : </label>
                        	<input type="text" id="lastname" maxlength="30" required name="lastname" />
                    	</li>
						
						<li>
                        	<label for="cwid">CWID : </label>
                        	<input type="text" id="cwid" maxlength="30" required name="cwid" />
                    	</li>
						
						<li>
                        	<label for="email">E-mail : </label>
                        	<input type="email" id="email" maxlength="30" required name="email" />
                    	</li>

                    	<li>
                        	<label for="password">Password : </label>
                        	<input type="password" id="password" maxlength="30" required name="password" />
                    	</li>
						
                        
                        <li>
                        	<label for="conpasswd">Confirm Password : </label>
                        	<input type="password" id="conpasswd" maxlength="30" required name="conpassword" />
                    	</li>
                    	<li class="buttons">
                        	<input type="submit" name="register" value="Register" />
                            <input type="button" name="cancel" value="Cancel" onclick="location.href='index.php'" />
                    	</li>
                    
                	</ul>
            	</form>
            </div>
        </div>
    
    </body>
</html>

<?php 
} else {
	$usr = new Users;
	$usr->storeFormValues( $_POST );
	
	if( $_POST['password'] == $_POST['conpassword'] ) {
		echo $usr->register($_POST);	
	} else {
		echo "Password and Confirm password not match";	
		/*debug*/
		echo "your email: " . $_POST['email'] . "your pass: " . $_POST['password'] . " conpass : " . $_POST['conpassword']; 
	}
}
?>