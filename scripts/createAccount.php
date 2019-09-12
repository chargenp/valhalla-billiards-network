<html>
	<head>
		<link rel="stylesheet" href="../styles/style.css">
	</head>
		
	<body style="text-align:center" !important>
	    <div class=div1>	
		<h1>Create An Account</h1>   
		<form action="inputAccount.php" method="post">
			
			Email:<br>
			<input type="text" name="Email" required><br>
			
			<br>Password:<br>
			<input type="text" name="Password" required><br>
			
			<br>Username:<br>
			<input type="text" name="Username" required><br>
			
			<br>Rank:<br>
			<input type="number" name="Rank" required><br>
			
			<br>Age:<br>
			<input type="number" name="Age" min="14" max="120" required><br>

			<br><input type="radio" name="Sex" value="M"> Male
			<input type="radio" name="Sex" value="F"> Female<br>
			
			<br><input type="submit" value="Submit" class="btn">
        </div>
		</form>
	</body>
</html>
