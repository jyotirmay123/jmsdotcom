<?php 
require_once(dirname(__FILE__)."/utils.php");
if(!is_loggedin()){
    header('Location: login.php');
}
?>
<html>
    <?php common_header(); 

    require_once "../config.php";

    $db = mysqli_connect($local->host, $local->user, $local->pass);
    if($db) {
        mysqli_select_db($db, $local->select_db);
    } else {
        echo "Cannot contact now, some issue!- Error code - 1";
        return;
    }

    $sql = "SELECT p.*, pt.filter as strfilter FROM projects p join projtypes pt on pt.id = p.filter";
    $proj = mysqli_query($db, $sql);

    $sql = "SELECT * FROM projtypes";
    $projtyp = mysqli_query($db, $sql);
    $pts = array();
    while($pt= $projtyp->fetch_assoc()) {
        array_push($pts, $pt);
    }
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
        <form action="./ajax/update_project.php" enctype="multipart/form-data" method="post">
            <fieldset>
                <legend>Project information</legend>
                <?php
                while($p = $proj->fetch_assoc())
                { ?>
                    <fieldset>
                        <legend><?php echo $p["name"]; ?></legend>
                        Name:
                        <input type="text" name="name_<?php echo $p["id"]; ?>" value="<?php echo $p['name']?>">
                        Description
                        <textarea name="description_<?php echo $p["id"]; ?>" rows="4" cols="35"><?php echo $p['description']?></textarea>
                        <br>
                        Hosted URL:
                        <input type="text" name="hostedurl_<?php echo $p["id"]; ?>" value="<?php echo $p['hostedurl']?>">
                        Code URL:
                        <input type="text" name="codeurl_<?php echo $p["id"]; ?>" value="<?php echo $p['codeurl']?>">
                        Filter: 
                        <select name="filter_<?php echo $p["id"]; ?>">
                        <?php foreach($pts as $pt) { ?>
                            <option <?php if ($pt['filter']==$p["strfilter"]) { ?>selected="selected"<?php } ?> 
                            value=<?php echo $pt["id"]; ?>>
                                <?php echo $pt['type']; ?>
                            </option>
                        <?php } ?>
                        </select>
                        <br>
                        Icon FIle:
                        <img src="../contents/images/portfolio/<?php echo $p['iconfile']?>" alt="" width="44" height="34">
                        <input type="file" name="iconfile_<?php echo $p["id"]; ?>" value="<?php echo $p['iconfile']?>">
                    </fieldset>
                    <br>
                <?php } ?>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </body>
</html>