<?php
session_start();
// Include the database configuration file
include 'config.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileType = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
$fileName = uniqid().".".$fileType;
$targetFilePath = $targetDir . $fileName;

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $statement = $pdo->prepare("INSERT into images (file_name, uploaded_on) VALUES (?, NOW())");

            $data = array(
              $fileName
            );
            $insert = $statement->execute($data);
            if($insert){
                header("location: index.php");
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>
