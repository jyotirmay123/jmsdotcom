<html>
<head>
<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
<link rel="icon" href="../../images/favicon.ico" type="image/x-icon">
</head>
<body>
<?php if (!isset($_POST['email'])) { ?>
<form name ="signupform" method="post" action = "<?php echo $_SERVER["PHP_SELF"];?>" >
Username:: <input type = 'text' name = "username" />
Email_id:: <input type = 'text' name = "email" />
password:: <input type = 'password' name = "password" />
<input type = 'submit' name = "signin" value = 'Sign Up' />
</form>

<?php } else {
	require_once '../db/dbconnect.php';
	
	if ($dbobj = connectme('50.62.209.120', 'jyotirmay', 'Shaan@123.', 'jyotirmay_appdata')) {
echo 'database connected';
} else {
echo 'database not connected';
}
echo $pass = md5($_POST['password']);
$x = mysqli_query($dbobj,"INSERT INTO appuser (username, email, password, firstname, lastname, timecreated)
VALUES ('".$_POST['username']."','".$_POST['email']."','".$_POST['password']."','jyotirmay', 'senapati',".time().")");

echo "successfull::".$x;

mysqli_close($dbobj);
	
	
	
	
	
	
	
	
	
} ?>
</body>


</html>