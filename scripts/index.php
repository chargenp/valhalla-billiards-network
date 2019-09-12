<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        
        <title>Homepage</title>
        
       
        <link rel="stylesheet" type="text/css" href="../styles/style.css">

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
		
		<h2 align = "center"><u>Pool Halls</u></h2>

        <table id="content">
            <tr>
                <th>Pool Hall</th>
                <th>Address</th>
                <th>Operating Hours</th>
                <th>Website</th>
                <th># of table</th>
            </tr>
            <?php 
				include("connection.php");
        
				$sql = "SELECT * 
				FROM Pool_Hall 
				ORDER BY Pool_Hall_Name ASC;";
				
				$result = $mysqli_conn->query($sql);
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) 
					{
						echo "<tr>";
						echo "<td> <a href='poolHallPage.php?name=". $row["Pool_Hall_Name"] . "'>" . $row["Pool_Hall_Name"] . "</a></td>";
						echo "<td>" . $row["Pool_Hall_Address"]."</td>";
						echo "<td>" . $row["Operating_Hours"]."</td>";
						echo "<td> <a href='//" . $row["Website_Url"]. "'>" . $row["Website_Url"] . "</a></td>";
						echo "<td>" . $row["Number_of_Tables"]."</td>";
						echo "</tr>";
					}
				}
				
				$mysqli_conn->close();
            ?> 
        </table>

    </body>
</html>
