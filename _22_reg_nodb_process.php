<?php session_start();

$email = $_POST["email"];
$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$pw = $_POST["pw"];
$conf_pw = $_POST["conf_pw"];
$dob = $_POST["dob"];
$exists = array("Email" => $email, "First Name" => $f_name, "Last Name" => $l_name, "Password" => $pw, "Confirm Password" => $conf_pw, "DOB" => $dob);
$names = array("First Name" => $f_name, "Last Name" => $l_name);
$msg = "";


//===== exists validation ======//
foreach($exists as $key => $value){
	if(strlen($value) == 0){
	$msg = $key." is a required field";
	$_SESSION["msgs"][] = $msg;
	}
}

//===== email validation ======//
if(strlen($email) > 0){
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  		$msg = "Invalid email format";
  		$_SESSION["msgs"][] = $msg;
	}
} 

//===== names validation ======//
foreach($names as $key => $value) {
	if(!preg_match("/^[a-zA-Z ]*$/", $value)){
		$msg = $key." may only contain letters and white space";
		$_SESSION["msgs"][] = $msg; 
	}
}

//====== password validation ======//
if(strlen($pw) > 0 && strlen($pw) < 6){
	$msg = "Password must be at least six characters";
	$_SESSION["msgs"][] = $msg; 
}
if($conf_pw !== $pw){
	$msg = "Your passwords do not match";
	$_SESSION["msgs"][] = $msg;
}

//===== dob validation =====//

if(strlen($pw) > 0){
	if(!preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/", $dob)){
	   $msg = "DOB invalid or incorrect format (mm/dd/yyyy)";
	   $_SESSION["msgs"][] = $msg;
	}
}
// $dob_check = explode('/', $dob);
// if(!checkdate((int)($dob_check[0]), (int)($dob_check[1]), (int)($dob_check[2]))){
//         $msg = "DOB invalid or incorrect format (mm/dd/yyyy)";
//         $_SESSION["msgs"][] = $msg;
// }
header("location: _22_reg_nodb_index.php");
?>















