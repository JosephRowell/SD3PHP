<?php

 class Users {
	 public $email = null;
	 public $password = null;
	 public $salt = "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";
	 
	 /*DO: construct the confcode. Find out why gender, accomidations and dinepref are already set */
	 
	 public function __construct( $data = array() ) {
		 if( isset( $data['email'] ) ) $this->email = stripslashes( strip_tags( $data['email'] ) );
		 if( isset( $data['password'] ) ) $this->password = stripslashes( strip_tags( $data['password'] ) );
		 if( isset( $data['cwid'] ) ) $this->cwid = stripslashes( strip_tags( $data['cwid'] ) );
		 if( isset( $data['firstname'] ) ) $this->firstname = stripslashes( strip_tags( $data['firstname'] ) );
		 if( isset( $data['lastname'] ) ) $this->lastname = stripslashes( strip_tags( $data['lastname'] ) );
	 }
	 
	 public function storeFormValues( $params ) {
		//store the parameters
		$this->__construct( $params ); 
	 }
	 
	 public function userLogin() { //for username we only need email and password to auth.
		 $success = false;
		 try{
			$con = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); 
			$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "SELECT * FROM students WHERE email = :email AND password = :password LIMIT 1";
			
			$stmt = $con->prepare( $sql );
			$stmt->bindValue( "email", $this->email, PDO::PARAM_STR );
			$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
			$stmt->execute();
			
			$valid = $stmt->fetchColumn();
			
			if( $valid ) {
				$success = true;
			}
			
			$con = null;
			return $success;
		 }catch (PDOException $e) {
			 echo $e->getMessage();
			 return $success;
		 }
	 }
	 
	 public function register() {  
		$correct = false;
			try {
				$con = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
				$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				//important
				$sql = "INSERT INTO students(firstname, lastname, cwid, email, password) VALUES(:firstname, :lastname, :cwid, :email, :password)";
				
				$stmt = $con->prepare( $sql );
				$stmt->bindValue( "email", $this->email, PDO::PARAM_STR );
				$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
				$stmt->bindValue( "firstname", $this->firstname, PDO::PARAM_STR );
				$stmt->bindValue( "lastname", $this->lastname, PDO::PARAM_STR );
				$stmt->bindValue( "cwid", $this->cwid, PDO::PARAM_INT );
				$stmt->execute();
				return "Registration Successful <br/> <a href='index.php'>Login Now</a>";
			}catch( PDOException $e ) {
				return $e->getMessage();
			}
	 }
	 
 }
   
 
?>