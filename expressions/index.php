<?php 

$files = glob('predict_images/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}


$str = '<form action="express.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>';
    
echo $str;


//$command = escapeshellcmd('./nctest.py');
//$output = shell_exec($command);
//echo $output;

?>