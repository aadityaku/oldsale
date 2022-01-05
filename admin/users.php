<?php include "../dbconnect.php";?>
<?php
if(!isset($_SESSION['admin'])){
echo "<script>window.opne('login.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PROJECT_NAME;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="../style.css">
</head>
<body class="bg-dark">
    <?php include "header.php";?>
    <div class="container-fulid ps-0">
        <div class="row w-100 p-0">
            <div class="col-2 bg-secondary" style="height:100vh;overflow-y:scroll">
            <?php include "side.php";?>
        </div>
        <div class="col-10">
            <h2>Manage Category</h2>
            <div class="row">
                <div class="col-12">
                    <table class="table bordered-0 table-hover table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $query=mysqli_query($connect,"select * from users");
                    while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?= $row['id'];?></td>
                        <td><?= $row['name'];?></td>
                        <td><?= $row['email'];?></td>
                        <td><?= $row['contact'];?></td>
                        <td><a href="users.php?del_id=<?= $row['id'];?>" class="btn bg-danger"><i class="bi bi-trash"></a></td>
                    </tr>
                   <?php }?>
                    </table>
                    <?php 
                    if(isset($_GET['del_id'])){
                        $id=$_GET['del_id'];
                        $del =mysqli_query($connect,"delete from users where id='$id'");
                        if($del){
                            echo "<script>window.open('users.php','_self')</script>";
                        }
                        else{
                            echo "<script>alert('Failed')</script>";

                        }
                    }
                    ?>
                </div>
            </div>
        </div>      
      </div>        
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>