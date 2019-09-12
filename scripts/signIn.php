<html>
<title>Sign-in Page</title>
<head>
    <link rel="stylesheet" href="../styles/style.css">
</head>
    <figure>
        <img id="logo" src="../images/TitleFull.svg" title="Valhalla Billiards Network">
        <figcaption></figcaption>
    </figure>
<body style="text-align: center !important;">
    <div class=div1>
        <h1>Login Portal</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">    
        Username:<br>
            <input type="text" name="user"><br>
            <br>
            Password:<br>
            <input type="password" name="pw"><br>
            <br>
            <input type="submit" value="Sign-in" class="btn">
	</form>
        <p>Not a member? Sign up <a href="createAccount.php">here</p>
    </div>
</body>
<?php
                include("connection.php");
                session_start();


		$username = $password = "";
		$username_err = $password_err = "";
 
		// Processing form data when form is submitted
		if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 		   // Check if username is empty
  		  if(empty(trim($_POST["user"]))){
     		   $username_err = "Please enter username.";
 		   } else{
    		    $username = trim($_POST["user"]);
    		}
    
   		 // Check if password is empty
 		   if(empty(trim($_POST["pw"])))
		   {
    		   	$password_err = "Please enter your password.";
  		   } 
		   else
		   {
     		   	$password = trim($_POST["pw"]);
   		   }
    	
    		// Validate credentials
   		 if(empty($username_err) && empty($password_err))
		 {
    		 	$sql = "SELECT email, username, password FROM Player WHERE username = '".$username."'";
  		 	$result = $mysqli_conn->query($sql);                
       		 	if($result->num_rows > 0)
			{                   
				$row = $result->fetch_assoc();
                        	if($password == $row["password"]){
              				session_start();
                   			// Store data in session variables
                   	        	$_SESSION["loggedin"] = true;
                    			$_SESSION["email"] = $row["email"];
                  			$_SESSION["username"] = $row["username"];                            
                            
                        	 	// Redirect user to welcome page
                 	         	header("location: http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/index.php");
            			} 
				else{
					// Display an error message if password is not valid
                         		$password_err = "The password you entered was not valid.";
                 		}
                 	  
             	        } 
			else{
                		// Display an error message if username doesn't exist
                 		$username_err = "No account found with that username.";
          		}
        	 } 
		else{
        		echo "Oops! Something went wrong. Please try again later.";
            	}
		$mysqli_conn->close();
	}
?>
</html>
