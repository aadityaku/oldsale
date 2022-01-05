<?php include "dbconnect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PROJECT_NAME ;?></title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="style.css">

</head>
<body>
    <?php include "header.php"?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-9">
              <div class="row">
              <?php 
                   if(isset($_GET['go'])){
                       $search=$_GET['search'];
                       $callingpost=mysqli_query($connect,"select * from posts JOIN categories ON posts.cat_id = categories.c_id  WHERE posts.title LIKE '%$search%' OR c_title LIKE '%$search%'");
                   
                   }
                   else{
                   if(isset($_GET['cat'])){
                       $c_id=$_GET['cat'];
                       $callingpost=mysqli_query($connect,"select * from posts JOIN categories ON posts.cat_id
                       =categories.c_id where posts.cat_id='$c_id'");
                   }
                   else{
                    $callingpost=mysqli_query($connect,"select * from posts");
                   }
                }
                   $count= mysqli_num_rows($callingpost);
                    if($count<1){
                    echo "<div class='alert alert-danger mt-3'>
                    <h1 class='alert-heading text-center'>Not Found </h1> <p class='text-center'> Sorry Try Again </p>
                  </div>";
                   }
                      while($row = mysqli_fetch_array($callingpost)){
                      ?>
                  <div class="col-3">   
                  <div class="card" style="height:340px;">
                      <img src="images/<?= $row['img'];?>" alt="" class="card-img-top" style="height:205px;">
                      <div class="card-body">
                          <h3 class="h6 text-truncate"><?= $row['title'];?></h3>
                          <p class="small">Rs. <?= $row['price'];?></p>
                          <a href="view.php?id=<?= $row['p_id'];?>" class="btn btn-dark text-white" >Know more</a>
                      </div>
                      </div>
                  </div>
                  <?php } ?>
              </div>
            </div>
            <div class="col-lg-3">
                <div class="list-group list-group-flush">
                <a href="" class="list-group-item list-group-item-action bg-dark-green">Category</a>
                    <?php 
                    $callingcat=mysqli_query($connect,"select * from categories");
                    while ($row = mysqli_fetch_array($callingcat)){
                        ?>
                        <a href="index.php?cat=<?= $row['c_id'];?>" class="list-group-item list-group-item-action"><i class="bi bi-chevron-left"></i><?= $row['c_title'];?></a>
                   <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>