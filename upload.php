<?php
// Connect to Database.
$con = new mysqli('localhost', 'root', '','testing');

// Get Image from FORM.
$file = $_FILES['image'];

// Get image name.
$imgName   = $file['name'];

// Get temp name with folder.
$tmpName   = $file['tmp_name'];

// Get Image Type
$imgType   = $file["type"];

// Call getImageExtension method to get Image Extension.
$extension = GetImageExtension($imgType);

// Set Image name for saving image.
$imageName ="img_".date("dmY")."_".time().$extension;

// Choose target path for saving image.
$targetPath = "photos/".$imageName;

// Check image is moved to target path or not.
if(move_uploaded_file($tmpName, $targetPath)) {

    // Write Query for inserting image into database
    $query = "INSERT INTO images_tbl(image_path) values('$targetPath')";

    // Execute Query
    $con->query($query);

    // Redirect to index page
    header('location: index.php');
}else{
   exit("Error While uploading image on the server");
}

// Get Image Extension
function GetImageExtension($imagetype) {
    if(empty($imagetype))
        return false;

    switch($imagetype) {
        case 'image/bmp': 
            return '.bmp';
        case 'image/gif': 
            return '.gif';
        case 'image/jpeg': 
            return '.jpg';
        case 'image/png': 
            return '.png';
        default:
            return false;
    }
}