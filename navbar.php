
 <?php include "link.php";
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }
    echo '
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand logo-font" href="index.php">
            TheTechOcean
        </a>

        <!-- links toggle -->
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#links" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <!-- account toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#account" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="links">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Tech news
                        </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a style="  background-color: green; border-radius: 10px; color:white; " class="dropdown-item" href="#">Mobile</a></li>
                        <li> <a style="  background-color: green; border-radius: 10px; color:white; " class="dropdown-item" href="#">Pc/Laptop</a></li>
                        <li>  <a style="  background-color: green; border-radius: 10px; color:white; " class="dropdown-item" href="#">Gaming</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
               
            </ul>
        </div> ';

    if (!$loggedin) {
        echo '
        <div class="collapse navbar-collapse" id="account">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="signup.php">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="userhome.php">Log in</a></li>
            </ul>
        </div>';
    }
    if ($loggedin) {
        $username = $_SESSION['username'];
        echo '
     <div class="collapse navbar-collapse" id="account">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link active" href="userhome.php" > ' . $username . ' </a></li>
              <li  class="nav-item"><a style="  background-color: green; border-radius: 2px;margin-left:5px; color:white; " class="nav-link" href="logout.php">Log out</a></li>
              </ul>
        </div>
         ';
    }
    echo '</div>
 </nav>';
 ?>

 <style>
     .active{
        background-color: red;
         border-radius: 2px;
          color:white; 
     }
.li{
    margin: 5px;
}
 </style>