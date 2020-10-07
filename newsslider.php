
<div class="container">
  <h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <?php
      include "conn.php";
      $result = mysqli_query($conn, "select * from articles ORDER BY id DESC LIMIT 3");
      while ($row = mysqli_fetch_array($result)) {
      ?>
      <div class="item">
        <img src="images/<?php echo $row['image'] ; ?>" alt="Los Angeles" style="width:%;">
        <div class="carousel-caption">
          <h3><?php echo $row['title'] ; ?></h3>
          <p><?php echo $row['content'] ;?></p>
        </div>
      </div>
        <?php } ?> 
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>