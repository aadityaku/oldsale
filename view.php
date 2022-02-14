<?php include "dbconnect.php"?>
<?php
$id=$_GET['id'];

$callingpost= mysqli_query($connect,"select * from posts JOIN categories ON posts.cat_id = categories.c_id
JOIN users ON posts.user_id = users.id where p_id='$id'");
 $data=mysqli_fetch_array($callingpost);

?>
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
            <div class="col-lg-3">
                <div class="list-group list-group-flush">
                <a href="" class="list-group-item list-group-item-action bg-dark-green">Category</a>
                <?php 
                    $callingcat=mysqli_query($connect,"select * from categories");
                    while ($row = mysqli_fetch_array($callingcat)){
                        
                        ?>
                        <a href="index.php?cat=<?= $row['c_id'];?>" class="list-group-item list-group-item-action"><i class="bi bi-chevron-right float-end"></i><?= $row['c_title'];?></a>
                   <?php } ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-4">
                        <img src="images/<?= $data['img'];?>" alt="" class="card-img-top">
                    </div>

                    <div class="col-8">
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <td><?= $data['title'];?></td>

                            </tr>
                            <tr>
                                <th>Price</th>
                                <td><?= $data['price'];?></td>
                            </tr>
                            <tr>
                                <th>Area</th>
                                <td><?= $data['area'];?></td>
                            </tr>
                            <tr>
                                <th>Date of Purchase</th>
                                <td><?= $data['dop'];?></td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td><?= $data['c_title'];?></td>
                            </tr>
                            <tr>
                                <th>user name</th>
                                <td><?= $data['name'];?></td>
                            </tr>
                            <tr>
                                <th>contact</th>
                                <td><?= $data['contact'];?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-border mt-3">
                    <div class="card">
                        <div class="card-header bg-dark-green">Description</div>
                        <div class="card-body">
                            <p class="lead"><?= $data['descr'];?></p>
                        </div>
                    </div>

                  <div class="row mt-3">
                      <div class="col-12">
                          <h4 class="h5 text-muted text-uppercase">Realeted Post</h5>
                          <hr>
                      </div>
                      <?php 
                      $cat_id=$data['cat_id'];
                   $callingPost = mysqli_query($connect, "select * from posts where p_id != '$id' AND cat_id = '$cat_id'");
                   $count_cat=mysqli_num_rows($callingPost);
                   if($count_cat>=1){
                   while($row = mysqli_fetch_array($callingPost)){
                       
                       ?>
                      <div class="col-3">
                          <div class="card" style="height:340px;">
                            <img src="images/<?= $row['img'];?>" alt="" class="card-img-top" style="height:205px;">
                            <div class="card-body">
                                <h6 class="h6 text-truncate"><?= $row['title'];?></h6>
                                <p class="small">Rs. <?= $row['price']?></p>
                                <a href="view.php?id=<?= $row['p_id'];?>" class="btn btn-dark text-light">Read more</a>
                            </div>
                          </div>
                      </div>
                      <?php } 
                      }
                      else{
                        echo "<div class='alert alert-danger mt-3'>
                        <h1 class='alert-heading text-center'>Not Found </h1> <p class='text-center'>This type of product</p>
                      </div>";
                      }
                          ?>
                  </div>
            
           
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>