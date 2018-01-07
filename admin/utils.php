<?php
require_once dirname(__FILE__).'/../config.php';
$db = mysqli_connect($local->host, $local->user, $local->pass);
if($db) {
    mysqli_select_db($db, $local->select_db);
} else {
    echo "<span style='color: red;'>Cannot contact now, some issue!- Error code - 1</span>\n";
    return;
}

function common_header(){
       
    echo '<head>
        <title>Jyotirmay Senapati</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <meta name="description" content="JJ- My Personal Website!"/>
        <link href="../contents/images/jj.ico" rel="icon" type="image/x-icon" />
        <section>
            <a href="profile.php">Profile Update</a>
            </hr></hr>
            <a href="resume.php">Resume Update</a>
            </hr></hr>
            <a href="project.php">Project Update</a>
            </hr></hr>
            <a href="blog.php">Blog Update</a>
            </hr></hr>
            <a href="login.php">Admin Login</a>
            </hr></hr>
        </section>
    </head>';

}

function is_loggedin(){
    $db = $GLOBALS['db'];
    
    if(!isset($_COOKIE["user"])) {
        return false;
    } else {
        $sql = "SELECT cookie FROM `login`";
        $cookie = mysqli_query($db, $sql);
        $ck = $cookie->fetch_assoc();
        if ($ck["cookie"] != $_COOKIE["user"]){
            return false;
        } else {
            return true;
        }
    }
}
?>
