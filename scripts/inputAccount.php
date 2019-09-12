<html>

<head>
    <link rel="stylesheet" href="../styles/style.css">
    <meta http-equiv="refresh" content="5;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/signIn.php" />
</head>

<?php
    include("connection.php");
    
	$Username = $_POST["Username"];
	$Email = $_POST["Email"];
	$Password = $_POST["Password"];
	$Rank = $_POST["Rank"];
	$Sex = $_POST["Sex"];
	$Age = $_POST["Age"];
    
	$sql = "INSERT INTO Player (username, email, password, Rank, Sex, Age)
    VALUES ('".$Username."', '".$Email."', '".$Password."', '".$Rank."', '".$Sex."', '".$Age."')";
    
    if ($mysqli_conn->query($sql) == TRUE)
    {
        echo "Account created successfully, Redirecting you to the log in page in 5 sec.";
    }	
	else if ($Username)
	{
       	 echo "Error: Username already in use. Please select another username." . "<br>";
	header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/createAccount.php" );
	}
	else if ($Email)
	{
       	 echo "Error: Email already in use, please select another email." . "<br>";
	header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/createAccount.php" );

	}
	else if ($Age)
	{
       	 echo "Error: Age not appropriate for this website." . "<br>";
	header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/createAccount.php" );

	}
	

	$mysqli_conn->close();
?>

</html>
