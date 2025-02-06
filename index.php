
<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    // Use a prepared statement to avoid SQL injection
    $sql = "SELECT * FROM customers WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    
    // Ensure user_id is treated as an integer
    $stmt->bind_param("i", $_SESSION["user_id"]);
    
    $stmt->execute();
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt->close();
}
?>


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | African-Violet</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
     <!-- HEADER -->
     <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="index.php" class="logo"> African-Violet <i class="" ></i></a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="products.php">Products</a>
            <a href="blog.php">Blog</a>
            <a href="research.php">Research</a>
        </nav>
        <?php if (isset($user)): ?>
            <a href="logout.php" class="btn"><?= htmlspecialchars($user["uname"]) ?>, Logout</a>
        
        
    <?php else: ?>
        <a href="login.php" class="btn">Login</a>

        
    <?php endif; ?>
        
    </header>
     <!-- HOME -->
     <section class="home" id="home">
        <div class="row">
            <div class="content ">
                <h3>African-Violet For Your Beautiful Home</h3>
                <a href="products.php" class="btn">Get one right now</a>
            </div>

        </div>
    </section>


    
        <!-- FOOTER -->
        <section class="footer">
            <div class="box-container">
    
                <div class="box">
                    <h3>quick links</h3>
                    <a href="index.php"><i class="fas fa-arrow-right"></i> Home</a>
                    <a href="about.php"><i class="fas fa-arrow-right"></i> About</a>
                    <a href="products.php"><i class="fas fa-arrow-right"></i> Products</a>
                    <a href="blog.php"><i class="fas fa-arrow-right"></i> Blog</a>
                    <a href="research.php"><i class="fas fa-arrow-right"></i> Research</a>
                </div>
    
                <div class="box">
                    <h3>contact info</h3>
                    <a href="#"><i class="fas fa-phone"></i> 9843567896 </a>
                    <a href="#"><i class="fas fa-envelope"></i> AfricanViolet@hotmail.com</a>
                    <a href="#"><i class="fas fa-envelope"></i> Chhaimale ,Kathmandu</a>
                </div>
    
                <div class="box">
                    <h3>Social Media Sites</h3>
                    <a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
                    
                    <a href="#"><i class="fab fa-instagram"></i> instagram</a>
                    <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>
                    
                </div>
            </div>
    
            <div class="credit">Author <span>Biraj Acharya</span> | all rights reserved 2025</div>
        </section>
    
    <!-- SWIPER -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- Custom JS File Link  -->
    <script src="js/script.js"></script>
</body>
</html>