<?php 
    $con = new mysqli('localhost', 'root', '','testing');
    $query = "SELECT image_path FROM images_tbl";
    $result = $con->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Images</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" id="image">
        <input type="submit" id="insert" value="Insert">
    </form>

    <div id="show">
        <?php while($row = $result->fetch_assoc()){ ?>
            <img src="<?php echo $row['image_path'] ?>" alt="image">
        <?php } ?>
    </div>
</body>
</html>