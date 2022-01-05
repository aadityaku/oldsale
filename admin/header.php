<nav class="navbar navbar-expand-lg navbar-dark bg-secondary sticky-top">
    <div class="container">
        
        <ul class="navbar-nav">
            <li class="nav-item"><a href="" class="nav-link">Home</a></li>
            <?php 
            if(isset($_SESSION['admin'])):?>
 
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
           
            <?php else: ?>

           
            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>