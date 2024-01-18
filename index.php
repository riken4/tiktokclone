<!DOCTYPE html>
<html lang="en">
<head>
   <title>Video upload</title>
   <?php
   include("config.php");
   if(isset($_POST['but_upload'])){
    $maxsize = 104857600; //5mb 5242880

    $name = $_FILES['file']['name'];
    $target_dir = "videos/";
    $target_file = $target_dir . $_FILES["file"]["name"];

    //select file type
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //valid file extensions
    $extensions_arr = array("mp4","ogg","avi","3gp","mov","mpeg","mp4v","jpg");

    //check extesnsion
    if (in_array($videoFileType, $extensions_arr)) {

        //check file size
        if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]['size'] == 0)){
            echo "file too large. File must be less than 5MB.";
        }else {
            //supload
            if (move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                //Insert record
                $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";
                mysqli_query($conn,$query);
                echo "upload successfully.";
            }
        }

    }else{
        echo "invalid file extension.";
    }
   }
   ?>
</head>
<style>
    padding-top:300px; 
    margin-left:40%;
</style>
<body>
<form method="post" action="" enctype="multipart/form-data">
<input type='file' name='file'>
<input type="submit" name="but_upload" value=upload video>
</form>

    
</body>
</html>