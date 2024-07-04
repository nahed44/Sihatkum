<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="home.css"/>
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Product Display</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            transition: width none;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .product {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 10px;
            overflow: hidden; /* Add this line to fix float issues */
        }

        .product h2 {
            margin-bottom: 10px;
        }

        .product p {
            margin-bottom: 10px;
        }

        .product button {
            background-color: #3a909f;
            color: #f0f0f0;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        /* .material-icons { 
            color: #f0f0f0;
            background-color: #3a909f;
            border-radius: 50%;
            border: 1px solid rgba(105, 105, 115, 1);
            margin-top: 10px;
        }*/

        .prodect-price {
            font-size: 18px;
            font-weight: bold;
        }

        .product-image {
            width: 33%;
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 5px rgba(12, 12, 12, 0.3);
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        /* .material-icons { 
            color: #fff;
            background-color: #3a909f;
            border-radius: 50%;
            padding: 8px;
            margin-top: 10px;
            margin-right: 5px;
            float: right;
        }*/

        .btn-add-to-cart {
            background-color: #3a909f;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            float: left;
        }
        .btn-add-to-cart:hover{
            background-color: #366d79;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<header class="header">
        <div class="header-1">
            <a href="home.php">
           <img id="img" src="img/new_logo-removebg-preview.png">
           <a>
         <form action="search.php" class="search-form">
            <input type="search" name="search" placeholder="Search" id="search-box"/>
            <button type="submit"> <label for="search-box" class="fas fa-search"></label></button>
         </form>

         <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>

            <div class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="material-icons icon">person</i>
                </a>
                <div class="dropdown-content">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="profile.php">Hello, <?= htmlspecialchars($_SESSION['username']) ?></a>
                    <a href="logout.php">Logout </a>
                    <?php else: ?>
                        <a href="login.php"> Login</a>
                        <a href="singup.php">Register</a>
                        <?php endif; ?>
                </div>
            </div>

                <a href="Compared.php"><i class="material-icons compare icon ">compare_arrows</i>
                    <span class="Czero" id="compare_arrows">0</span></a> 
                <a href="Sopping-cart.php"><i class="material-icons icon" >shopping_cart</i>
                    <span class="Szero" id="cart">0</span></a> 
              </div>
    </div>
      <div class="header-2">
        <nav class="navbar">
            <a href="Donate.php"><img src="">Donation</a>

            <div class="drop">
                <a href="#">Medical devices</a>
                <div class="down-content">
                    <a href="Diabetics & Pressure.php">Diabetics & Pressure devices</a>
                    <a href="Steam Appliances.php">Steam appliances</a>
                </div>
            </div>

                <a href="Medical Supplies.php">Medical Supplies</a>

                <div class="drop">
                    <a href="#">Mobility aids</a>
                    <div class="down-content">
                        <a href="Cane and crutch.php">Cane and crutch</a>
                        <a href="Bathroom chairs.php">Bathroom chairs</a>
                    </div>
                </div>

            <div class="drop">
                <a href="#">Elderly</a>
                <div class="down-content">
                    <a href="Diapers and bedding.php">Diapers and bedding</a>
                    <a href="Bathroom swan.php">Bathroom swan</a>
                </div>
            </div>
               <a href="Donation_devices.php"> Donation devices</a>
         
        </nav>
      </div> 
        
    </header>

<div class="container">
    <?php
    // Database connection
    $host = "localhost";
    $port = "5432"; // Port for PostgreSQL
    $dbname = "postgres";
    $user = "postgres";
    $password = "123456";

    $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : die('Product ID is required');

    try {
        $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to retrieve product
        $sql = "SELECT * FROM product WHERE product_id = :product_id"; // Replace 'id' with your product ID column name
        $stmt = $conn->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);// Display product
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product) {
            echo "<div class='product'>";
            echo "<img class='product-image' src='data:image/jpeg;base64," .  $product["product_image"] . "' alt='" . htmlspecialchars( $product["product_name"]) . "'>";
            echo "<div class='product-details'>";
            echo "<h2>" . $product["product_name"] . "</h2>";
            echo "<p>" . $product["description"] . "</p>";
            echo "<p class='product-price'>" . $product["price"] . "</p>";
            echo "<button class='btn-add-to-cart'>Add to Cart</button>";
            echo "</div>"; echo "</div>";
        } else {
            echo "Product not found";
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</div>
 <footer>
    <div class="footer">
        <div class="footer-left">
            <h2>About Us</h2>
            <ul class="footer-links">
                <i class="material-icons arrow_forward">arrow_forward_ios</i>
                <a href="about.html">About Us</a> <br>
                <i class="material-icons arrow_forward" style="  margin-left:43px;">arrow_forward_ios</i>
                <a href="Donation Policy.html">Donation Policy</a>
            </ul>
        </div>

        <div class="footer-center ">
            <h2>Address</h2>
            <div class="info">
                <div class="place">
                    <span class="fas fa-map-marker-alt"></span>
                    <span class="text">Prince Abdulaziz Ibn Musaid Ibn Jalawi St, Riyadh</span>
                </div>
                <div class="phone">
                    <span class="fas fa-phone-alt"></span>
                    <span class="text">+966-503858467</span>
                </div>
                <div class="email">
                    <span class="fas material-icons far">mail</span>
                    <span class="text">Sihatkum@gmail.com</span>
                </div>
            </div>

        </div>
    
        <div class="footer-right">
            <h2>Contact Us</h2>
            <form>
                <i class="material-icons far">mail</i>
                <input type="email" placeholder="Enter your email id" required>
                <button type="submit"><i class="fa-solid fa-arrow-right fas"></i></button>
            </form>
        <div class="social-icons">
            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
        </div></div>
    </div>
    
    <!-- <div class="footer-bottom"> -->
        <hr>
            <p class="links-text">Copyright © 2024, Sihatkum, All Rights Reserved</p>
       
</footer>
<script>
    // You can add JavaScript code if needed
</script>

</body>
</html>