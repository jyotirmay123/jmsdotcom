<?php
require_once '../../lib/applibrary.php';
if (!isset($_POST['to'])) {
?>
<html>
<body>
<form name ="mailsendingform" method="post" action = "<?php echo $_SERVER["PHP_SELF"];?>" >
From :: <input type = "text" name ="from" />
To :: <input type = "text" name ="to" />
Subject :: <input type = "text" name ="subject" />
Message :: <input type = "text" name ="message" />

<input type = "submit" name = "sendmail" value = "Send Mail" />
</form>
</body>
</html>
<?php } else {
	echo phpmail($_POST['to'], $_POST['from'], $_POST['subject'], $_POST['message']);
}
