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
   <div class="container">
       <div class="rwo">
           <div class="col-4 mx-auto">
                  <div class="card">
                      <div class="card-header bg-dark-green text-white">Login Here</div>
                      <div class="card-body">
                          <form action="" method="post">
                              <div class="mb-3">
                                 <label for="">Name</label>
                                 <input type="text" name="name" class="form-control">
                              </div>
                              <div class="mb-3">
                                 <label for="">Email</label>
                                 <input type="email" name="email" class="form-control">
                              </div>
                              <div class="mb-3">
                                <label for="">contact</label>
                                <input type="text" name="contact" class="form-control">
                              </div>
                              <div class="row">
                                  <div class="col">
                                    <div class="mb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                     <div class="mb-3">
                                        <label for="">Conform Password</label>
                                        <input type="password" name="c_password" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <input type="submit" class="btn bg-dark-green float-end text-white" value="Signup" name="submit">
                          </form>
                         <?php 
                         if(isset($_POST['submit'])){
                             $name=$_POST['name'];
                             $email=$_POST['email'];
                             $contact=$_POST['contact'];
                             $password=md5($_POST['password']);
                             $c_password=md5($_POST['c_password']);
                             
                             if($password != $c_password){
                                 echo"<script>alert('password is invalid')</script>";
                             }
                             else{
                                 $callingCheck=mysqli_query($connect,"select * from users where email='$email'");
                                 $countCheck=mysqli_num_rows($callingCheck);
                                 if($countCheck > 0){
                                     echo "<script>alert('email has alreay login')</script>";
                                 }
                                else{
                             $query=mysqli_query($connect,"insert into users(contact,name,email,password)
                             value('$contact','$name','$email','$password')");
                             if($query){
                                 echo "<script>window.open('index.php','_self')</script>";
                             }
                             }
                            }
                         }
                         ?>
                      </div>
                  </div>
           </div>
       </div>
   </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>