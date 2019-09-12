<html lang="en">
    <head>
        
        <?php 
            include("connection.php");  
            
            $ID = $_GET["ID"];

            $sql = "SELECT Tournament.Tournament_Name
                    FROM Tournament
                    WHERE Tournament.Tournament_ID = '" . $ID . "'";

			$result = $mysqli_conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<title>" . $row["Tournament_Name"] . "</title>";					
				}
			}        
            
            $mysqli_conn->close();
        ?>
        <meta charset="UTF-8">
		<meta name="description" content="Billiards Network">
        <meta name="keywords" content="Billiards">
        <meta name="author" content="Brady">
		
        <link href="../styles/playerPage.css" rel="stylesheet">
        <link rel="stylesheet" href="../styles/homepagedefault.css">

        <link rel="stylesheet" href="../styles/style.css">
		<link rel="stylesheet" href="../styles/homepagedefault.css">
		<link rel="stylesheet" href="../styles/HeaderTest.css">
    </head>
    <body>
        
        <div class="sidenav">
            <a href="./../index.php">Home</a><br>
            <a href="homepagePview.php">Players</a><br>
            <a href="homepageTview.php">Tournaments</a><br>
            <a href="./../index.php">Pool Halls</a><br>
        </div>
        <div class="main">
            <?php 
            include("connection.php");  
            
            $sql = "SELECT Tournament_Name
                    FROM Tournament
                    WHERE Tournament_ID = '" . $ID . "'";

			$result = $mysqli_conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<h1>" . $row["Tournament_Name"] . ":</h1>";					
				}
			}        
            
            $mysqli_conn->close();
            ?>
        
        <h2>Tournament Info:</h2>
        
           <?php 
            include("connection.php");  
            
            $sql = "SELECT *
                    FROM Tournament, Pool_Hall
			        WHERE Tournament.Pool_Hall_Name=Pool_Hall.Pool_Hall_Name AND Tournament_ID = " . $ID . " ;";

			$result = $mysqli_conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<p>Name: " . $row["Tournament_Name"] . "</p>";
                    echo "<p>ID: " . $row["Tournament_ID"] . "</p>";
                    echo "<p>Date: " . $row["Date"] . "</p>";
                    echo "<p>Player Capacity: " . $row["Player_Capacity"] . "</p>";
                    echo "<p># of Participants: " . $row["Number_of_Participants"] . "</p>";
                    echo "<p>Prize Pool: " . $row["Prize_Pool"] . "</p>";
                    echo "<p>Entry Fee: " . $row["Entry_Fee"] . "</p>";
                    echo "<p>Pool Hall Name: <a href='poolHallPage.php?name=". $row["Pool_Hall_Name"] . "'>" . $row["Pool_Hall_Name"] . "</a></p>";
                    echo "<p>Pool Hall Address: " . $row["Pool_Hall_Address"] . "</p>";					
				}
			}        
            
            $mysqli_conn->close();
            ?>
		     
            <?php
			session_start();
			
			include("connection.php");
			
			$sql = "SELECT Player_Email from Compete where Tournament_ID = '" . $ID . "';";
			
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
			if($_SESSION["loggedin"] == true)
			{
				
				if ($registered == true)
				{
					echo "<a href='tournamentregister.php?tournamentID=" . $ID . "' >Click me to unregister</a>";
				}
                else
                {
                    echo "<a href='tournamentregister.php?tournamentID=" . $ID . "' >Click me to register</a>";
                }
			}
			
            /*

            else if($_SESSION["loggedin"] == true)
			{
				//<button type="register">Click me to register</button>;
				echo "<a href='tournamentregister.php?tournamentID=" . $ID . "' >Click me to register</a>";
			}

            */

			else
			{
				//<button type="register">sign in to register</button>;
				echo "<a href='signIn.php'>Click me to sign in</a>";
			}
			
			$mysqli_conn->close();
		?>
		
        <h2>Tournament Participants:</h2>

		<table id="content">
        <tr>
            <th>Username</th>
            <th>Rank</th>
            <th>Sex</th>
            <th>Age</th>
        </tr>
        <?php 
            include("connection.php");  
            
            $sql = "SELECT Player.username,Player.email, Player.Rank, Player.Sex, Player.Age
                        FROM Player
                                    WHERE Player.email IN (SELECT Compete.Player_Email
                                                           FROM Compete
                                                           WHERE Compete.Tournament_ID = '" . $ID  . "');";

			$result = $mysqli_conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td> <a href='playerPage.php?email=". $row["email"] . "'>" . $row["username"] . "</a></td>";
                    echo "<td>" . $row["Rank"] . "</td>";
					echo "<td>" . $row["Sex"]."</td>";
					echo "<td>" . $row["Age"]."</td>";
					echo "</tr>";
				}
			}
			$mysqli_conn->close();
        ?>
    </table>        </div>
    </body>
</html>
