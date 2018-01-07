<?php 
require_once(dirname(__FILE__)."/utils.php");
?>
<html>
    <?php 
    common_header(); 
    ?>
	<body style="background-color : lightgrey; text-align: center"> 
		<style>
			input {
				margin: 4 4 4 4;
			}
			textarea {
				margin: 4 4 4 4;
			}
		</style>
		<?php 
		if(is_loggedin()){
			echo "<br><br><span style='color: blue;'>YOU ARE LOGGEDIN.</span>";
		} else {
			if (!isset($_POST['username'])) { ?>
			
			<form name ="loginForm" method="post" action = "<?php echo $_SERVER["PHP_SELF"];?>" >
				Username:: <input type = 'text' name = "username" />
				password:: <input type = 'password' name = "password" />
				<input type = 'submit' name = "signin" value = 'Log In' />
			</form>

			<?php } else {

				require_once '../config.php';

				$db = mysqli_connect($local->host, $local->user, $local->pass);
				if($db) {
					mysqli_select_db($db, $local->select_db);
				} else {
					echo "<span style='color: red;'>Cannot contact now, some issue!- Error code - 1</span>\n";
					return;
				}

				$pass = md5($_POST['password']);
				$creds = mysqli_query($db,"SELECT * FROM `login`");
				$cred= $creds->fetch_assoc();

				if(($cred["username"] == $_POST["username"]) && ($cred["password"] == $pass)){
					$cookie_name = "user";
					$cookie_value = md5($cred["username"]);
					setcookie($cookie_name, $cookie_value, time() + (86400/6), "/");
					$sql = "UPDATE `login` SET cookie = '".$cookie_value."'";
					mysqli_query($db, $sql);
					header('Location: index.php');
				} else {
					header('Location: ../index.php');
				}

				mysqli_close($db);	
			} 
		} ?>
	</body>
</html>
