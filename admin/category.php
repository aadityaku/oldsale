<?php include "../dbconnect.php";
if(!isset($_SESSION['admin'])){
    echo "<script>window.open('login.php','_self')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login | <?= PROJECT_NAME; ?> </title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body class="bg-dark">
<?php include "header.php";?>

<div class="container-fluid ps-0">
    <div class="row w-100 p-0">
        <div class="col-2 bg-secondary" style="height:100vh;overflow-y:scroll">
            <?php include "side.php";?>
        </div>
        <div class="col-10">
            <h2>manage Categories</h2>
            <div class="row">
                <div class="col-9">
                    <table class="table table-dark table-hover table-bordered">
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>Action</th>
                    </tr>
                    <?php 

                    $Cat = mysqli_query($connect,"select * from categories");
                    while($row = mysqli_fetch_array($Cat)){
                    ?>
                    <tr>
                        <td><?= $row['c_id'];?></td>
                        <td><?= $row['c_title'];?></td>
                        <td><a href="category.php?del_id=<?= $row['c_id'];?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    <?php } ?>
                    </table>

                    <?php 

                            if(isset($_GET['del_id'])){
                                $id = $_GET['del_id'];
                                $query = mysqli_query($connect,"delete from categories where c_id='$id'");
                                if($query){
                                    echo "<script>window.open('category.php','_self')</script>";
                                }
                                else{
                                    echo "<script>alert('failed')</script>";
                                }
                            }
                    ?>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <h6>Insert Category</h6>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="">Category title</label>
                                    <input type="text" name="c_title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="create" class="btn btn-success w-100">
                                </div>
                            </form>
                            <?php 
                            if(isset($_POST['create'])){
                                $title = $_POST['c_title'];
                                $query  = mysqli_query($connect, "insert into categories (c_title) value ('$title')");
                                if($query){
                                    echo "<script>window.open('category.php','_self')</script>";
                                }
                                else{
                                    echo "<script>alert('failed')</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>