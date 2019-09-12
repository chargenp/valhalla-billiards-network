<html>
<head>
		<link rel="stylesheet" href="../styles/style.css">
</head>
<?php

	include("connection.php");
	session_start();
	$t_ID = $_REQUEST['tournamentID'];
	//$t_ID = GET["tournamentID"];
	$username = $_SESSION["username"];
	$email = $_SESSION["email"];
	$sql = "SELECT Player_Email from Compete where Tournament_ID = '".$t_ID."';";
			
    $result = $mysqli_conn->query($sql);
	$registered = false;
	if ($result->num_rows > 0) {	
		while($row = $result->fetch_assoc()) {
			if ($row["Player_Email"] == $_SESSION["email"])
			{
				$registered = true;
			}
		}
    }
		
	if ($registered == true)
	{
		$sql = "Select Player_Capacity, Number_of_Participants From Tournament where Tournament_ID = '".$t_ID."'; ";
		$result = $mysqli_conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$P_Cap = $row["Player_Capacity"];
			$NumPart = $row["Number_of_Participants"];	
		}
		$sql = "DELETE FROM Compete WHERE Tournament_ID = '".$t_ID."' AND Player_Email = '".$email."';";
		if ($mysqli_conn->query($sql) == TRUE)
		{
			$NumPart = $NumPart - 1;
			$sql = "UPDATE Tournament SET Number_of_Participants = '".$NumPart."' WHERE Tournament_ID = '".$t_ID."';";		// BROKEN, Sql does not run
			if ($mysqli_conn->query($sql) == TRUE)
			{
				echo "Successfully  unregistered from Tournament, Returning you to the home page in 5 sec.";
				header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/index.php" );
			}
			else
			{
				echo "There was an error, Returning you to the home page in 5 sec.";
				header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/index.php" );
			}
				
		}
		else
		{
			echo "There was an error, Returning you to the home page in 5 sec.";
			header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/index.php" );
		}
	}
	else
	{
		$sql = "Select Player_Capacity, Number_of_Participants From Tournament where Tournament_ID = '".$t_ID."';";
		$result = $mysqli_conn->query($sql);	
		 if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$P_Cap = $row["Player_Capacity"];
			$NumPart = $row["Number_of_Participants"];	
	
			if (($NumPart + 1) < $P_Cap || ($NumPart + 1) == $P_Cap)
			{
				$NumPart = $NumPart + 1;
				$sql = "INSERT INTO Compete (Tournament_ID, Player_Email)
				VALUES ('".$t_ID."', '".$email."')";
				
				if ($mysqli_conn->query($sql) == TRUE)
				{
					$sql = "UPDATE Tournament SET Number_of_Participants = '".$NumPart."' WHERE Tournament.Tournament_ID = '".$t_ID."';";	// BROKEN, Sql does not run
					if ($mysqli_conn->query($sql) == TRUE)
					{
						echo "Tournament register successful, Returning you to the home page in 5 sec.";
						header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/index.php" );
					}	
					else
					{
						echo "There was an error, Returning you to the home page in 5 sec.";
						header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/index.php" );
					}
				}
				else
				{
					echo "There was an error, Returning you to the home page in 5 sec.";
					header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/index.php" );
				}

			}
			else
			{
				echo "Tournament is full, Returning you to the home page in 5 sec.";
				header( "refresh:4;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/index.php" );
			}
		}
	}


	$mysqli_conn->close();

	
?>


</html>
