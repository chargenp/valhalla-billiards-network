<html lang="en">
    <head>
        
        <?php 
            $Name = $_GET["name"];
            echo "<title>" . $Name . "</title>";
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
            echo "<h1>" . $Name . "'s Profile:</h1>";            
            ?>
        <h2>Information:</h2>

        <?php 
				include("connection.php");
        
				$sql = "SELECT * 
				FROM Pool_Hall 
				WHERE Pool_Hall.Pool_Hall_Name='" . $Name . "';";
				
				$result = $mysqli_conn->query($sql);
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) 
					{
						echo "<p>Name: " . $row["Pool_Hall_Name"] . "</p>";
						echo "<p>Address: " . $row["Pool_Hall_Address"]."</p>";
						echo "<p>Operating Hours: " . $row["Operating_Hours"]."</p>";
						echo "<p>Website:  <a href='//" . $row["Website_Url"]. "'>" . $row["Website_Url"] . "</a></p>";
						echo "<p># of Tables: " . $row["Number_of_Tables"]."</p>";
					}
				}
				
				$mysqli_conn->close();
            ?>

        <h2>Tournament Schedule</h2>
		<table id="content">
        <tr>
            <th>Tournament Name</th>
            <th>Tournament ID</th>
            <th>Date</th>
            <th>Player Capacity</th>
            <th># of Participants</th>
            <th>Prize_Pool</th>
            <th>Entry Fee</th>
        </tr>        <?php 
            include("connection.php");  
            
            $sql = "SELECT *
            FROM Tournament
            WHERE Tournament.Pool_Hall_Name = '" . $Name . "';";

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
					echo "</tr>";
				}
			}
			$mysqli_conn->close();
        ?>
    </table>        </div>
    </body>
</html>
