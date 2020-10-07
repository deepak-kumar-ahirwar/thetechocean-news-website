<?php
$aleart=false;
$error=false;
include "conn.php" ;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST['username'];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $passHash=password_hash($pass, PASSWORD_DEFAULT);
    $cpass=$_POST["cpass"];
    $sqlexists="SELECT * FROM `loginid` WHERE email='$email' " ;
    $result = mysqli_query($conn,$sqlexists);
    $numexists = mysqli_num_rows($result);
    if($numexists>0){
        $error="Account already registered.";
    }else{
    if($pass==$cpass){
    $sql="INSERT INTO `loginid` (`username`,`email`, `pass`, `time`) VALUES ('$username','$email', '$passHash', current_timestamp());" ;
    $result=mysqli_query($conn,$sql);
    if($result){
        $aleart=true;
    }  
}
    else{
        $error="password do not match . please check your password";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include "link.php" ;
include "conn.php" ; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
</head>
<body>
<?php require "navbar.php"; ?>
<?php 
if($aleart){
    echo '<div class="Salert">
    <strong>Success! </strong>Your accound is successfully created and now you can login. <a href="login.php">Login now.</a>
  </div>';
}
?>
<?php 
if($error){
    echo '<div class="Dalert">
    <strong>Failed! </strong> '.$error.'
  </div>';
}
?>
    
   <div class="container login-container">
      <div class="row">
        <div class="col-md-6 ads">
          <h1><span id="fl">TheTech</span><span id="sl">Ocean</span></h1>
          <h3>Welcome</h3>
          <img class="svg" src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        
        </div>
        <div class="col-md-6 login-form">
          <div class="profile-img">
            <img src="site_image/avtar.png" alt="profile_img" height="140px" width="140px;">
          </div>
          <h3 style="color: white;">Sign Up</h3>
          <form action="login.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="cpass" placeholder="Confirm Password">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
            </div>
            <div  class="form-group acc">
                <p href="#">Have an account ?</p>
            </div>
            <div class="form-group acc">
                <button class="btn btn-success btn-sm" style="border-radius: 20px;" href="login.php">Login</button>
            </div>
            </div>
          </form>

    </form>
    </div>
      </div>
      
</body>
</html>

<style>
      body {
       background-image: url('site_image/home.jpg');
  font-family: 'Montserrat', sans-serif;
  transition: 0.5s;
}

.login-container {
  margin-top: 8%;
  border: 1px solid #CCD1D1;
  border-radius: 5px;
 -webkit-box-shadow: 10px 10px 24px -5px rgba(245,137,197,1);
-moz-box-shadow: 10px 10px 24px -5px rgba(245,137,197,1);
box-shadow: 10px 10px 24px -5px rgba(245,137,197,1);
  max-width: 60%;

  
}
.svg{
    margin-top: 25%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}

.ads {
    background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  color: #fff;
  padding: 15px;
  text-align: center;
  
}

.ads h1 {
  margin-top: 20%;
}

#fl {
  font-weight: 600;
}

#sl {
  font-weight: 100 !important;
}

.profile-img {
  text-align: center;
}

.profile-img img {
  border-radius: 50%;
  /* animation: mymove 2s infinite; */
}

@keyframes mymove {
  from {border: 1px solid #F2F3F4;}
  to {border: 8px solid #F2F3F4;}
}

.login-form {
  padding: 15px;


}

.login-form h3 {
  text-align: center;
  padding-top: 15px;
  padding-bottom: 15px;
}

.acc {
  text-align: center;
 color: white;
}
.form-control {
  font-size: 14px;
}

.forget-password a {
    color: white;
    align-items: center;
    align-content: center;
    text-align: center;
  font-weight: 500;
  text-decoration: none;
  font-size: 14px;
}

</style>
