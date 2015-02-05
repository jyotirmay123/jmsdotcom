<?php
function connectme($host,$username,$password,$dbname) {
$con =mysqli_connect($host,$username,$password,$dbname);

// Check connection
if (mysqli_connect_errno()) {
	return '';
} else {
	return $con;
}
}
?>