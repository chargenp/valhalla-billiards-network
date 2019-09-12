<html lang="en">
    <head>
        
        <?php 
            include("connection.php");  
            session_start();
            $Email = $_GET["email"];
	
            $sql = "SELECT Player.username
                    FROM Player
                    WHERE Player.email = '" . $Email . "'";

			$result = $mysqli_conn->query($sql);
			
			if ($_SESSION["email"] == $Email)
			{
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<title>Your Profile</title>";	
					}
				}        
            } else {
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<title>" . $row["username"] . " Profile</title>";	
					}
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
            <a href="index.php">Home</a><br>
            <a href="homepagePview.php">Players</a><br>
            <a href="homepageTview.php">Tournaments</a><br>
            <a href="index.php">Pool Halls</a><br>
        </div>
        <div class="main">
            <?php 
            include("connection.php");  
            
            $sql = "SELECT Player.username
                    FROM Player
                    WHERE Player.email = '" . $Email . "'";

			$result = $mysqli_conn->query($sql);
			
			if ($_SESSION["email"] == $Email)
			{
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<h1>Your Profile</h1>";	
						echo "<a href='logout.php'>Logout</a>";
					}
				}        
            } else {
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<h1>" . $row["username"] . "'s Profile</h1>";	
					}
				} 
			}        
            
            $mysqli_conn->close();
            ?>
        <h2>Player Info:</h2>

        <?php 
            include("connection.php");  
            
            $sql = "SELECT *
                    FROM Player
                    WHERE Player.email = '" . $Email . "'";

			$result = $mysqli_conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<p>Username: " . $row["username"] . "</p>";
                    echo "<p>Email: " . $row["email"] . "</p>";
                    echo "<p>Rank: " . $row["Rank"] . "</p>";
                    echo "<p>Gender: " . $row["Sex"] . "</p>";
                    echo "<p>Age: " . $row["Age"] . "</p>";					
				}
			}        
            
            $mysqli_conn->close();
        ?>


        <h2>Tournament Schedule:</h2>
		<table id="content">
        <tr>
            <th>Tournament Name</th>
            <th>Tournament_ID</th>
            <th>Date</th>
            <th>Player Capacity</th>
            <th>Number of Participants</th>
            <th>PrizePool</th>
            <th>Entry Fee</th>
            <th>Pool Hall</th>
            <th>Address</th>
        </tr>
        <?php 
            
            include("connection.php");  

			$sql = "SELECT *
            FROM Tournament, Pool_Hall
            WHERE Tournament.Pool_Hall_Name=Pool_Hall.Pool_Hall_Name AND Tournament.Tournament_ID IN (SELECT Compete.Tournament_ID
                                               FROM Compete
                                               WHERE Compete.Player_Email = '" . $Email . "');";

			$result = $mysqli_conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td> <a href='tournamentPage.php?ID=". $row["Tournament_ID"] . "'>" . $row["Tournament_Name"] . "</a></td>";
                    echo "<td>" . $row["Tournament_ID"] . "</td>";
                    echo "<td>" . $row["Date"] . "</td>";
					echo "<td>" . $row["Player_Capacity"]."</td>";
					echo "<td>" . $row["Number_of_Participants"]."</td>";
					echo "<td>$" . $row["Prize_Pool"]."</td>";
					echo "<td>$" . $row["Entry_Fee"]."</td>";
					echo "<td> <a href='poolHallPage.php?name=". $row["Pool_Hall_Name"] . "'>" . $row["Pool_Hall_Name"] . "</a></td>";
					echo "<td>" . $row["Pool_Hall_Address"]."</td>";
					echo "</tr>";
				}
			} 
			$mysqli_conn->close();
        ?>
    </table>        </div>
    </body>
</html>
