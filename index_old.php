<?php 
	include_once("config.php");
?>

<?php if( !(isset( $_POST['login'] ) ) ) { ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Marist Dorm Registration System</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    
    <body>
    
        <header id="head" >
        	<p>User Login</p>
        	<p><a href="register.php"><span id="register">Register</span></a></p>
        </header>
        
        <div id="main-wrapper">
        	<div id="login-wrapper">
            	<form method="post" action="">
                	<ul>
                    	<li>
                        	<label for="email">E-mail : </label>
                        	<input type="email" id="email" maxlength="30" required name="email" />
                    	</li>
                    
                    	<li>
                        	<label for="password">Password : </label>
                        	<input type="password" maxlength="30" required name="password" />
                    	</li>
						
                    	<li class="buttons">
                        	<input type="submit" name="login" value="Log me in" onclick ="location.href='loggedin.php'"/>
                            <input type="button" name="register" value="Register" onclick="location.href='register.php'" />
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
	
	if( $usr->userLogin() ) {
		echo "Welcome";	
	} else {
		echo "Incorrect Username/Password";	
		echo "your email: " . $_POST['email'] . "your pass: " . $_POST['password'];
	}
}
?>