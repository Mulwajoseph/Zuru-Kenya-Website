<?php
// Include the database configuration file
session_start();
error_reporting(0);
include ("db_connect.php");
$active_user=$_SESSION["active_user"];
        $statusMsg = '';

        // File upload path
        $use_id=$_POST["user_id"];
        
        //t site name
        $siteName=mysqli_real_escape_string($connect,$_POST["place"]);
        $siteDescription=mysqli_real_escape_string($connect,$_POST["sitedescription"]);
$success=1;
        
//insert sitename and site description
        $insert1=mysqli_query($connect,"INSERT INTO site(user_id,place,sitedescription) VALUES('$use_id','$siteName','$siteDescription')");
        if($insert1){
            $success=1;
        }else{
            $success=0;
        }
        
        $site_id=MYSQLI_INSERT_ID($connect);
        //insert images
        $targetDir = "images/thumb/";

$count=count($_FILES["filed"]["name"]);
for($x=0;$x<=$count;$x++){
     $fileName = basename($_FILES["filed"]["name"][$x]);
        
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

        
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["filed"]["tmp_name"][$x], $targetFilePath)){
                    // Insert image file name into database
                    $insert = $connect->query("INSERT into images (file_name, uploaded_on,site_id) VALUES ('".$fileName."', NOW(),'$site_id')");
                    if($insert){
                        $success=1;
                        //echo'<script>alert("successfully uploaded");history.back();</script>';
                    }else{
                        $success=0;
                       // echo'<script>alert("failed upload");history.back();</script>';
                    } 

                }else{
                    $success=0;
                    //echo'<script>alert("file error");history.back();</script>';
                }

            }else{
               // $success=0;
                //echo'<script>alert("sorry only jpg,png,jpeg and gif allowed");history.back();</script>';
            }
           // echo $success;
}


 if($success==1){
    echo'<script>alert("successfully uploaded");history.back();</script>';
 }else{
   echo'<script>alert("failed");history.back();</script>';
 }    
        

        // Display status message
        echo $statusMsg;
?>