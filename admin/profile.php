<?php 
require_once(dirname(__FILE__)."/utils.php");
if(!is_loggedin()){
    header('Location: login.php');
}
?>
<html>
    <?php 
    common_header(); 
    
    require_once "../config.php";
    
    $db = mysqli_connect($local->host, $local->user, $local->pass);
    if($db) {
        mysqli_select_db($db, $local->select_db);
    } else {
        echo "Cannot contact now, some issue!- Error code - 1";
        return;
    }

    $sql = "SELECT * FROM profile";
    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
    } else {
        echo "<pre>No Data in the database.</pre>";
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
        <form action="./ajax/update_profile.php" enctype="multipart/form-data" method="post">
            <fieldset>
                <legend>Personal information</legend>
                First name:
                <input type="text" name="firstname" value="<?php echo $row['firstname']?>">
                Last name:
                <input type="text" name="lastname" value="<?php echo $row['lastname']?>">
                DOB:
                <input type="text" name="dob" value="<?php echo $row['dob']?>">
                Address:
                <input type="text" name="address" value="<?php echo $row['address']?>">
                <br>

                Email:
                <input type="text" name="email" value="<?php echo $row['email']?>">
                Phone:
                <input type="text" name="phone" value="<?php echo $row['phone']?>">
                Website:
                <input type="text" name="website" value="<?php echo $row['website']?>">
                <br>

                Major About:
                <textarea name="majorabout" rows="4" cols="35"><?php echo $row['majorabout']?></textarea>
                Minor About:
                <textarea name="minorabout" rows="4" cols="35"><?php echo $row['minorabout']?></textarea>
                <br>

                Current Role:
                <input type="text" name="currentrole" value="<?php echo $row['currentrole']?>">
                Current Role In:
                <input type="text" name="currentrolein" value="<?php echo $row['currentrolein']?>">
                <br>

                Common 'Major About':
                <textarea name="majorcommonabout" rows="4" cols="35"><?php echo $row['majorcommonabout']?></textarea>
                Common 'Minor About':
                <textarea name="minorcommonabout" rows="4" cols="35"><?php echo $row['minorcommonabout']?></textarea>
                <br>
                <fieldset>
                <legend>Social Profiles </legend>
                    FB Link:
                    <input type="text" name="fblink" value="<?php echo $row['fblink']?>">
                    Twitter Link:
                    <input type="text" name="twitterlink" value="<?php echo $row['twitterlink']?>">
                    LinkedIN Link:
                    <input type="text" name="linkedinlink" value="<?php echo $row['linkedinlink']?>">
                    GitHub Link:
                    <input type="text" name="githublink" value="<?php echo $row['githublink']?>">
                    <br>

                    Stackoverflow Link:
                    <input type="text" name="stackoverflowlink" value="<?php echo $row['stackoverflowlink']?>">
                    Skype ID:
                    <input type="text" name="skypeid" value="<?php echo $row['skypeid']?>">
                    Google Drive ID:
                    <input type="text" name="gdriveid" value="<?php echo $row['gdriveid']?>">
            
                </fieldset>

                <fieldset>
                    <legend>Profile Pics</legend>
                    <h4>Please Upload Pics with 400*500 resolution for better fit.</h4>
                    Profile Pic 1:
                    <img src="../contents/images/img-profile/<?php echo $row['profilepic1']?>" alt="profilepic1" width="40" height="50">
                    <input type="file" name="profilepic1" value="<?php echo $row['profilepic1']?>">
                    Profile Pic 2:
                    <img src="../contents/images/img-profile/<?php echo $row['profilepic2']?>" alt="profilepic2" width="40" height="50">
                    <input type="file" name="profilepic2" value="<?php echo $row['profilepic2']?>">
                    <br>

                    Profile Pic 3:
                    <img src="../contents/images/img-profile/<?php echo $row['profilepic3']?>" alt="profilepic3" width="40" height="50">
                    <input type="file" name="profilepic3" value="<?php echo $row['profilepic3']?>">
                    Profile Pic 4:
                    <img src="../contents/images/img-profile/<?php echo $row['profilepic4']?>" alt="profilepic4" width="40" height="50">
                    <input type="file" name="profilepic4" value="<?php echo $row['profilepic4']?>">
                    <br>

                    Profile Pic 5:
                    <img src="../contents/images/img-profile/<?php echo $row['profilepic5']?>" alt="profilepic5" width="40" height="50">
                    <input type="file" name="profilepic5" value="<?php echo $row['profilepic5']?>">
                    Profile Pic 6:
                    <img src="../contents/images/img-profile/<?php echo $row['profilepic6']?>" alt="profilepic6" width="40" height="50">
                    <input type="file" name="profilepic6" value="<?php echo $row['profilepic6']?>">
                    <br>
                </fieldset>
                Main Pic 3:
                <img src="../contents/images/img/<?php echo $row['mainpic']?>" alt="mainpic" width="40" height="50">
                <input type="file" name="mainpic" value="<?php echo $row['mainpic']?>">
                <br>
                

                <br>
                <input type="submit" value="Submit">
            </fieldset>
        </form>

    </body>
</html>