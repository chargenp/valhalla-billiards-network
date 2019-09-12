<html>

<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        
        <title>Homepage</title>
        
        <link rel="stylesheet" href="../styles/style.css">
		<link rel="stylesheet" href="../styles/homepagedefault.css">
		<link rel="stylesheet" href="../styles/HeaderTest.css">

</head>

<body>
    <table id="top">
			<tr>
				<th>
					<img id="logo" src="../images/TitleFull.svg" title="Valhalla Billiards Network">
				</th>
				<th> 
					<div class="navButton">
						<img class="chalkBullet" src="../images/chalkBullets.png">
						<a href="index.php">Home</a>
					</div>
				</th>
				<th>
					<div class="navButton">
						<img class="chalkBullet" src="../images/chalkBullets.png">		
						<a href="homepagePview.php">Players</a>
					</div>
				</th>
				<th>
					<div class="navButton">
						<img class="chalkBullet" src="../images/chalkBullets.png">					
						<a href="index.php">Halls</a>
					</div>
				</th>
				<th> 
					<div class="navButton">
						<img class="chalkBullet" src="../images/chalkBullets.png">					
						<a href="homepageTview.php">Tournaments</a>
					</div>
				</th>
				<th>
					<div class="navButton">
						<img class="chalkBullet" src="../images/chalkBullets.png">				
						<a href="accountCheck.php">Account</a>
					</div>
				</th>
			</tr>
		</table>
    
    <h2 align = "center"><u>Players</u></h2>

    <table id ="content">
        <tr>
            <th>Username</th>
            <th>Rank</th>
            <th>Sex</th>
            <th>Age</th>
        </tr>
        <?php 
            include("connection.php");  

			$sql = "Select *
			From Player
			Order by Player.username ASC;";

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
    </table>

</body>

</html>
