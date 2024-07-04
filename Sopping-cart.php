<?php
session_start(); // Initialize session handling at the top

// Ensure that the cart items are stored in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$host = 'localhost';
$dbname = 'postgres';
$user = 'postgres';
$password = '123456';
$dsn = "pgsql:host=$host;dbname=$dbname;";

// Connect to the database
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Check if the user is attempting to add or modify items in the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        if (isset($_POST['change_quantity'])) {
            // Handle quantity increase or decrease
            if ($_POST['change_quantity'] === 'increase') {
                $_SESSION['cart'][$product_id]++;
            } elseif ($_POST['change_quantity'] === 'decrease') {
                if ($_SESSION['cart'][$product_id] > 1) {
                    $_SESSION['cart'][$product_id]--;
                } else {
                    unset($_SESSION['cart'][$product_id]); // Remove the item if quantity becomes zero
                }
            }
        } elseif (isset($_POST['delete_product'])) {
            // Handle item deletion
            unset($_SESSION['cart'][$product_id]);
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Function to display cart items
function displayCartItems($pdo) {
    $totalAmount = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $productDetailsSql = "SELECT product_image, price, product_name FROM product WHERE product_id = ?";
            $productDetailsStmt = $pdo->prepare($productDetailsSql);
            $productDetailsStmt->execute([$productId]);
            while ($productDetailsRow = $productDetailsStmt->fetch(PDO::FETCH_ASSOC)) {
                $base64Image = $productDetailsRow['product_image'];
                $productPrice = $productDetailsRow['price'];
                $productName = $productDetailsRow['product_name'];
                $totalAmount += $productPrice * $quantity;

                echo "<div class='cart-item'>";
                echo "<div class='item-image'><img src='data:image/jpeg;base64," . htmlspecialchars($base64Image) . "' alt='Product'></div>"; 
                echo "<div class='item-info'>";
                echo "<div class='item-name'>" . htmlspecialchars($productName) . "</div>";
                echo "<div class='item-price'>price: $" . htmlspecialchars(number_format($productPrice, 2)) . "</div>";
                echo "<div class='quantity-controls'>";
                echo "<form action='' method='POST'>";
                echo "<input type='hidden' name='product_id' value='" . $productId . "'>";
                echo "<button type='submit' name='change_quantity' value='decrease'>-</button>";
                echo "<span class='quantity-input'>" . $quantity . "</span>";
                echo "<button type='submit' name='change_quantity' value='increase'>+</button>";
                echo "<button type='submit' name='delete_product' style='background-color: white; color: white; border: none; padding: 5px 10px; margin-left: 10px; font-size:16px;'>🗑️</button>";
                echo "</form>";
                echo "</div>";
                echo "</div></div>";
            }
        }
        echo "<div class='total-amount'>Total: $" . number_format($totalAmount, 2) . "</div>";
    } else {
        echo "<p style='font-size: 13px';>No items in the cart.</p><br><br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="home.css"/>
    <title>Shopping Cart</title>
    <style>
        body {
            margin: 0;
            
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
        }
        .shopping-cart {
            width: 100%;
            max-width: 900px;
            margin: 20px auto;
            background-color: #f9f9f9;
            border: 1px solid #e1e1e1;
            border-radius: 4px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border-bottom: 1px solid #e1e1e1;
        }
        .item-image img {
            width: 150px;
            margin-right: 20px;
            border-radius: 4px;
        }
        .item-info {
            flex-grow: 1;
        }
        .item-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .item-price {
            font-size: 16px;
            color: black;
            margin-bottom: 10px;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quantity-controls button {
            padding: 5px 10px;
            background-color: #3a909f;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 11px;
            border-radius: 4px;
            margin: 0 5px;
        }
        .quantity-controls .quantity-input {
            background-color: white;
            color: black;
            padding: 5px 10px;
            margin: 0 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-block;
            width: 30px;
            text-align: center;
        }
        .total-amount {
            text-align: center;
            font-size: 16px;
            color: #333;
            font-weight: bold;
        }
        .cart-actions {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }
        .cart-actions button {
            padding: 10px 20px;
            background-color: #3a909f;
            color: white;
            border: none;
            cursor: pointer;
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
    <div class='shopping-cart'>
        <h2>Shopping cart</h2><br>
        <?php displayCartItems($pdo); ?>
        <div class='cart-actions'>
            <button onclick="completeOrder();">Complete the order</button>
            <button onclick="window.location.href='home.php';">Continue shopping</button>
        </div>
    </div>
    <br><br><br><br><footer>
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
        function completeOrder() {
            // Redirect based on user login status
            <?php
            if (!isset($_SESSION['user_id'])) {
                echo "window.location.href = 'login.php';";
            } else {
                echo "window.location.href = 'checkout.php';";
            }
            ?>
        }
    </script>
</body>
</html>