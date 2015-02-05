<?php
unset($jconfig);
$jconfig = new stdClass();
$jconfig->host = '50.62.209.120' ;
$jconfig->username = 'jyotirmay';
$jconfig->password = 'Shaan@123.';
$jconfig->dbname = 'jyotirmay_appdata';
$jconfig->port = 3306;

$jconfig->wwwroot = 'http://localhost/jmsdotcom';
$jconfig->dirroot = 'C:\xampp\htdocs\jmsdotcom';

require_once $jconfig->dirroot.'/functionality/db/dbconnect.php';
global $jdb;
$jdb = connectme($jconfig->host, $jconfig->username, $jconfig->password, $jconfig->dbname);
