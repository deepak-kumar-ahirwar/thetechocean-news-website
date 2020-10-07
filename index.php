<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "link.php";
  include "conn.php"; ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
</head>
<body>
<?php include "link.php"; ?>
<div class="navbar">
<?php require "navbar.php"; ?>
</div>
<div class="container card-container">
  <div class="row card-row">
    <?php
    include "conn.php";
    $result = mysqli_query($conn, "SELECT * FROM articles");
    while ($row = mysqli_fetch_array($result)) {
    ?>

      <div class="card col-sm-5 " style="width: 25rem;">
        <img src="images/<?php echo $row['image']; ?>" style="width: 20rem;" class="card-img-top card-images" alt="image">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['title']; ?></h5>
          <p class="card-text"><?php echo $row['content']; ?></p>
          <a href="#" class="btn btn-primary">Read more.</a>
        </div>
      </div>
    <?php } ?>
  </div>
  </div>
  <?php include "footer.php"; ?>
</body>

</html>

<style>
body{
  background-color: #050506;
background-image: linear-gradient(160deg, #050506 0%, #404141 100%);


	background-image: url('site_image/home.jpg');
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
	font-family: 'Montserrat', sans-serif;
	transition: 0.5s;

}
.card-container{
  margin-top:70px;
}
.card-row{
  padding: 15px;
}
.card{
  -webkit-box-shadow: 10px 10px 24px -5px rgba(0,167,176,1);
-moz-box-shadow: 10px 10px 24px -5px rgba(0,167,176,1);
box-shadow: 10px 10px 24px -5px rgba(0,167,176,1);

  background-color: #08AEEA;
background-image: linear-gradient(0deg, #08AEEA 0%, #2AF598 100%);

  margin:10px;


}
.card-images{
  border:2px black solid;
}
.card-titile{
  color: red;
}
</style>