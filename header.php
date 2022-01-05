<nav class="navbar navbar-expand-lg navbar-dark bg-brown">
    <div class="container">
        <a href="index.php" class="navbar-brand"><?= PROJECT_NAME;?></a>
        <form action="./index.php" class="d-flex">
            <input type="search" class="form-control" name="search" size="60" placeholder="search here">
            <input type="submit" class="btn text-white bg-red ms-2" name="go">
        </form>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="./index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="user/add_post.php" class="nav-link">Post Here</a></li>
           <?php 
           if(isset($_SESSION['user'])):
            ?>
 
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            <li class="nav-item"><a href="user/post_list.php" class="nav-link">Profile</a></li>
            
          <?php else: ?>

            <li class="nav-item"><a href="signup.php" class="nav-link">Signup</a></li>
            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
           <?php endif;?>
        </ul>
    </div>
</nav>