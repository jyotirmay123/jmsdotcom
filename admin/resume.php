<?php 
require_once(dirname(__FILE__)."/utils.php");
if(!is_loggedin()){
    header('Location: login.php');
}
require_once "../config.php";

$db = mysqli_connect($local->host, $local->user, $local->pass);
if($db) {
    mysqli_select_db($db, $local->select_db);
} else {
    echo "Cannot contact now, some issue!- Error code - 1";
    return;
}

$sql = "SELECT * FROM experience";
$expr = mysqli_query($db, $sql);

$sql = "SELECT * FROM education";
$edu = mysqli_query($db, $sql);

$sql = "SELECT * FROM programming";
$prog = mysqli_query($db, $sql);

$sql = "SELECT * FROM ide";
$ide = mysqli_query($db, $sql);

$sql = "SELECT * FROM `language`";
$lang = mysqli_query($db, $sql);

$sql = "SELECT * FROM office";
$ofc = mysqli_query($db, $sql);

$sql = "SELECT * FROM hobby";
$hoby = mysqli_query($db, $sql);

$sql = "SELECT * FROM `resume`";
$res = mysqli_query($db, $sql);
$cv = $res->fetch_assoc();
?>
<html>
    <?php common_header(); ?>

    <body style="background-color : lightgrey; text-align: center"> 
    <style>
            input {
                margin: 4 4 4 4;
            }
            textarea {
                margin: 4 4 4 4;
            }
        </style>


        <form action="./ajax/update_resume.php" enctype="multipart/form-data" method="post">
            <fieldset>
                <legend>Career information</legend>
                <fieldset>
                <legend>Experience</legend>
                <?php 
                while($exp = $expr->fetch_assoc()){?>
                    Designation: <input type="text" name="expr_designation_<?php echo $exp["id"]; ?>" value="<?php echo $exp['designation']?>">
                    Start: <input type="text" name="expr_start_<?php echo $exp["id"]; ?>" value="<?php echo $exp['start']?>">
                    End: <input type="text" name="expr_end_<?php echo $exp["id"]; ?>" value="<?php echo $exp['end']?>">
                    Company: <input type="text" name="expr_company_<?php echo $exp["id"]; ?>" value="<?php echo $exp['company']?>">
                    <br>
                    URL: <input type="text" name="expr_url_<?php echo $exp["id"]; ?>" value="<?php echo $exp['url']?>">
                    Address: <input type="text" name="expr_address_<?php echo $exp["id"]; ?>" value="<?php echo $exp['address']?>">
                    Description: <textarea name="expr_description_<?php echo $exp["id"]; ?>" rows="4" cols="35"><?php echo $exp['description']?></textarea>
                    <br><hr>
                <?php
                }
                ?>
                </fieldset>
                <fieldset>
                <legend>Education</legend>
                <?php 
                while($ed = $edu->fetch_assoc()){?>
                    Degree: <input type="text" name="edu_degree_<?php echo $ed["id"]; ?>" value="<?php echo $ed['degree']?>">
                    Start: <input type="text" name="edu_start_<?php echo $ed["id"]; ?>" value="<?php echo $ed['start']?>">
                    End: <input type="text" name="edu_end_<?php echo $ed["id"]; ?>" value="<?php echo $ed['end']?>">
                    School: <input type="text" name="edu_school_<?php echo $ed["id"]; ?>" value="<?php echo $ed['school']?>">
                    <br>
                    URL: <input type="text" name="edu_url_<?php echo $ed["id"]; ?>" value="<?php echo $ed['url']?>">
                    Address: <input type="text" name="edu_address_<?php echo $ed["id"]; ?>" value="<?php echo $ed['address']?>">
                    Description: <textarea name="edu_description_<?php echo $ed["id"]; ?>" rows="4" cols="35"><?php echo $ed['description']?></textarea>
                    <br><hr>
                <?php
                }
                ?>
                </fieldset>
                <fieldset>
                <legend>Programming Skills</legend>
                <h6><u>Please put something between 1 and 100 in Level.</u></h6>
                <?php 
                while($pr = $prog->fetch_assoc()){?>
                    
                    Name: <input type="text" name="prog_name_<?php echo $pr["id"]; ?>" value="<?php echo $pr['name']?>">
                    
                    Level: <input type="text" name="prog_level_<?php echo $pr["id"]; ?>" value="<?php echo $pr['level']?>">
                    
                    <br><hr>
                <?php
                }
                ?>
                </fieldset>
                <fieldset>
                <legend>Language Skills</legend>
                <h6><u>Please put something between 1 and 100 in Level.</u></h6>
                <?php 
                while($lg = $lang->fetch_assoc()){?>
                    
                    Name: <input type="text" name="lang_name_<?php echo $lg["id"]; ?>" value="<?php echo $lg['name']?>">
                    
                    Level: <input type="text" name="lang_level_<?php echo $lg["id"]; ?>" value="<?php echo $lg['level']?>">
                    
                    <br><hr>
                <?php
                }
                ?>
                </fieldset>
                <fieldset>
                <legend>IDE Used</legend>
                <h6><u>Please put something between 1 and 100 in Level.</u></h6>
                <?php 
                while($id = $ide->fetch_assoc()){?>
                    
                    Name: <input type="text" name="ide_name_<?php echo $id["id"]; ?>" value="<?php echo $id['name']?>">
                    
                    Level: <input type="text" name="ide_level_<?php echo $id["id"]; ?>" value="<?php echo $id['level']?>">
                    
                    <br><hr>
                <?php
                }
                ?>
                </fieldset>
                <fieldset>
                <legend>Office Skills</legend>
                <h6><u>Please put something between 1 and 100 in Level.</u></h6>
                <?php 
                while($of = $ofc->fetch_assoc()){?>
                    
                    Name: <input type="text" name="ofc_name_<?php echo $of["id"]; ?>" value="<?php echo $of['name']?>">
                    
                    Level: <input type="text" name="ofc_level_<?php echo $of["id"]; ?>" value="<?php echo $of['level']?>">
                    
                    <br><hr>
                <?php
                }
                ?>
                </fieldset>
                <fieldset>
                <legend>Hobbies</legend>
                <h6><u>Please put something between 1 and 100 in Level.</u></h6>
                <?php 
                while($hb = $hoby->fetch_assoc()){?>
                    
                    Name: <input type="text" name="hoby_name_<?php echo $hb["id"]; ?>" value="<?php echo $hb['name']?>">
                    
                    Level: <input type="text" name="hoby_level_<?php echo $hb["id"]; ?>" value="<?php echo $hb['level']?>">
                    
                    <br><hr>
                <?php
                }
                ?>
                </fieldset>
                <fieldset>
                <legend>Resume</legend>
                Resume: 
                <embed src="../contents/file/<?php echo $cv['filename']?>" width="40" height="50" type='application/pdf'>
                <input type="file" name="resume" value="<?php echo $cv['filename']?>">
                </fieldset>
                <br>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </body>
</html>