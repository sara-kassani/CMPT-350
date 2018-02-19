<?php
session_start();
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Koding Made Simple</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Koding Made Simple</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>







<?php

$cluster   = Cassandra::cluster()                 // connects to localhost by default
                 ->build();
$keyspace  = 'keyhotels1';
$session   = $cluster->connect($keyspace);        // create session, optionally scoped to a keyspace
$statement = new Cassandra\SimpleStatement("SELECT * FROM tblhotel1 LIMIT 25");
$result    = $session->execute($statement);

$resultprofessor    = $session->execute($statement);
if(isset($_SESSION['usr_id'])) {
?>
<?php
 echo "<table align=\"center\"  border=\"2\" cellspacing=\"3\" cellpading=\"4\"><tr><td>Hotel Name</td><td>Hotel Address</td><td>Hotel Location</td><td> Contact Phone </td><td> Zip Code</td><td>Other information</td></tr>";

foreach ($result as $row) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["address"]." </td><td>".$row["location"]."</td><td>".$row["telephone"]."</td><td>".$row["postcode"]."</td><td>".$row["information"]."</td></tr>";
    }
    echo "</table>";



echo "Records Display: " . $result->count() . " records";
?>
<?php
}
?>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
