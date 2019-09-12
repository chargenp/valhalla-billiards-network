<html>
<body>

<?php
session_start();

if ($_SESSION["loggedin"] == true)
{
	header( "refresh:0;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/playerPage.php?email=" . $_SESSION["email"]);

}
else 
{
	header( "refresh:0;url=http://student2.cs.appstate.edu/classes/3430/191/102/team1/scripts/signIn.php" );

}

?>

</body>
</html>
