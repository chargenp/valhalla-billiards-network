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

    <h2 align = "center"><u>Tournaments</u></h2>


    <table id="content">
        <tr>
            <th>Tournament Name</th>
            <th>Tournament ID</th>
            <th>Date</th>
            <th>Player Capacity</th>
            <th># of Participants</th>
            <th>Prize_Pool</th>
            <th>Entry Fee</th>
            <th>Pool Hall</th>
            <th>Address</th>
        </tr>
        <?php 
            include("connection.php");  

			$sql = "SELECT Tournament.Tournament_Name, Tournament.Tournament_ID, Tournament.Date, Tournament.Player_Capacity, Tournament.Number_of_Participants, Tournament.Prize_Pool, Tournament.Entry_Fee, Tournament.Pool_Hall_Name, Pool_Hall.Pool_Hall_Address
			FROM Tournament, Pool_Hall
			WHERE Tournament.Pool_Hall_Name=Pool_Hall.Pool_Hall_Name
			ORDER BY Tournament.Date ASC;";

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
    </table>

</body>

</html>
