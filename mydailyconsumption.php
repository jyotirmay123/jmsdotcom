<?php
require_once 'config.php';
require_once $jconfig->dirroot.'\functionality\db\dbconnect.php';



$Jdb = connectme($jconfig->host,$jconfig->username,$jconfig->password,$jconfig->dbname);

$datainserting = mysqli_query($jdb,"INSERT INTO user_location (userid, latitude, longitude, street, town, country, postcode, fulladdress)
VALUES (2,23,43,'dfsdf','sdfdsf','dsfdsf',757105,'dsfdsf'");

if($datainserting) {
	echo 'successfull';
} else {
	echo 'unsuccessfull';
}