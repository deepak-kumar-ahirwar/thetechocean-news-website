<?php
$login=false;
$error=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "conn.php" ;
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $sql="Select * from loginid where email='$email' ";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    if($num==1){
        while($row=mysqli_fetch_assoc($result)){
            $username=$row['username'];
            if(password_verify($pass,$row['pass']))
            {
                $login=true;
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['email']=$email;
                $_SESSION['loggedin']=true;
                header("location:userhome.php");
        }
        else{
            $error=" your email and password is incorrect. please check your email and password ";
         }
        }
    }  
    else{
       $error=" your email and password is incorrect. please check your email and password ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "link.php";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php require "navbar.php"; ?>
<?php 
if($login){
    echo '<div class="Salert">
    <strong>Success! </strong>you are Login in.
  </div>';
}
?>
<?php 
if($error){
    echo '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Failed!</strong>' .$error.'
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
          <h3 style="color: white;">Login</h3>
          <form action="login.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
            </div>
            <div class="form-group forget-password">
                <a href="#">Forget Password</a>
            </div>
          </form>
        </div>
      </div>
      <?php include "footer.php"; ?>
</body>
</html>

<style>
   body {
       background-image: url('site_image/home.jpg');
  font-family: 'Montserrat', sans-serif;
  transition: 0.5s;
}

.login-container {

  margin-top: 10%;
  border: 1px solid #CCD1D1;
  border-radius: 5px;
-webkit-box-shadow: 10px 10px 24px -5px rgba(245,137,197,1);
-moz-box-shadow: 10px 10px 24px -5px rgba(245,137,197,1);
box-shadow: 10px 10px 24px -5px rgba(245,137,197,1);

  max-width: 50%;
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