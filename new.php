<?php
$mess;
if (isset($_POST['upload'])) {
    include "conn.php";

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "images/" . $filename;
    $category=$_POST["sel"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    // Get all the submitted data from the form 
    $sql = "INSERT INTO articles (`title`,`image`,`content`) VALUES ('$title','$filename','$content')";

    // Execute query 
    mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: image 
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";

        echo "<script> aleart('uploaded')</script>";
    } else {
        $msg = "Failed to upload image";
        echo "<script> aleart('not uploaded')</script>";
    }
}

?>

<html>

<head>
    <?php include "link.php"; ?>
    <title>Create new article</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container rounded-lg" >

        <h2 style="text-align: center;padding-top:20px;">WRITE YOUR ARTICLES</h2>

        <form class="form" action="new.php" method="post" enctype="multipart/form-data">
        <div class="d-flex">
            <div style="margin-right: 50px;"> 
            <h3>Article Title</h3>
            <input class="form-control" type="text" placeholder="Article Name" name="title" required>
            </div>
        <div>
        <h3>News Category</h3>
                        <div class="form-group">
                <select class="form-control" name="sel" id="sel">
                    <option >Mobile</option>
                    <option>Pc/Laptop</option>
                    <option>Gaming</option>
                    <option>Other</option>
                </select>
                </div>
        </div>
        </div>   
            <h3 style="margin: 10px;">Image (Optional) </h3>
            <div class="custom-file">
            <input class="custom-file-input" id="customFile" type="file" name="image">
            <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <h3 style="margin: 10px;">Content</h3>
            <textarea class="form-control" name="content" placeholder="Write your articles " cols="30" rows="10" required></textarea>
            <input style="margin: 10px;" class="btn btn-primary" type="submit" name="upload" value="upload">
        </form>


    </div>

</body>

</html>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
        background-image: url("site_image/home.jpg");
        color: white;
    }

    .form {
        padding: 50px;
    }

    button {
        margin: 10px;
    }

    .container {
        margin-top: 50px;
        background-color: #5ec3ff;
background-image: linear-gradient(359deg, #5ec3ff 0%, #9e50ec 67%);
max-width: 60%;
    }
</style>