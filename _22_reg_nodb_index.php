<?php
session_start();
if(!isset($_SESSION["msgs"])){
	$_SESSION["msgs"] = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration No DB</title>
	<link rel="stylesheet" type="text/css" href="_22_reg_nodb_style.css">
</head>
<body>
	<div id = "wrapper">

		<form action="_22_reg_nodb_process.php" method="post">
			<h2>Please Register Below:</h2>
			<label>Email: <input type="text" name="email"></label>
			<label>First Name: <input type="text" name="f_name"></label>
			<label>Last Name: <input type="text" name="l_name"></label>
			<label>Password: <input type="text" name="pw"></label>
			<label>Confirm Password: <input type="text" name="conf_pw"></label>
			<label>DOB: <input type="text" name="dob"></label>
			<button>Submit</button>
		</form>
		<?php
			if(isset($_SESSION["msgs"])){
				foreach($_SESSION["msgs"] as $msg){
					echo "<p class='red'>".$msg."</p>";
					
				}
				// $_SESSION["msgs"] = array();
				session_destroy();
			}		
			?>
	</div><!-- end wrapper -->
</body>
</html>