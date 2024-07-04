<?php
session_start();

$host = 'localhost';
$dbname = 'postgres';
$user = 'postgres';
$password = '123456';
$dsn = "pgsql:host=$host;dbname=$dbname;";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'], $_POST['action'])) {
        $product_id = $_POST['product_id'];
        $action = $_POST['action'];

        switch ($action) {
            case 'add_to_cart':
                // Add to cart logic
                if (!isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id] = 1;
                } else {
                    $_SESSION['cart'][$product_id]++;
                }
                break;
            case 'compare':
                // Add to compare logic
                if (!isset($_SESSION['compare'][$product_id])) {
                    $_SESSION['compare'][$product_id] = 1;
                }
                break;
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

?>

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
    <title>Search - <?php echo $search_query; ?></title>
<style>
 
.products {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}
.product-card {
    text-align: center;
    margin: 15px; 
    text-decoration: none; 
    color: #0e0d0d; 
    background-color: #f9f9f9;
    border: 1px solid #000;
    overflow: hidden;
    border-radius: 5px;
    padding: 1px;
    transition: 0.7s;
    display : inline-block;
    height: 366.7px;
    width: 266px; 
    padding: 5px;
    transition: 0.3s;
       
}
.product-card:hover {
    box-shadow: 0 5px 25px rgba(12, 12, 12, 0.3);
}
header h1{
    margin-left: 37px;
    font-size: 25px;
    margin-bottom: 20px;
    margin-top: 20px;
    font-family: 'Almarai';
}
h3 {
    margin-top: 10px;
    
}
p{
    font-size: 10px;
}


.product-card img {
    width: 100%; 
    height: 60%;

}
#com i{
     text-align: center;
}
.btn-com:hover , #button:hover{
    background: #366d79;
}

#button,
.btn-com {
    background-color: #3a909f;
    width: 200px;
    color: #f0f0f0;
    border: hsl(0, 0%, 94%);
    height: 30px;
    display: inline-block;
    vertical-align: middle; /* توسيط الأزرار عموديًا */
    margin-top: 10px;
    cursor: pointer;
}

.btn-com {
    width: 30px; /* تحديد عرض الزر الثاني */
    margin-left: 2px;
}
.nop{
    font-size: 16px;
    margin-left: 110px;
    font-weight: 400;
    margin-bottom: 33px;
    margin-top: 49px;
    
}

.buttons {
        padding: 10px 10px;
        background-color: #3a909f;
        color: white;
        border: none;
        text-align: center;
        font-size: 16px; font-weight: 400;
        text-align: center;
        justify-content:center;
        margin-bottom: 140px;
    }
    .buttons {
        width: 1000px;
        text-align: center;
        margin-left: 110px; 
        padding-top: -100;
        cursor: pointer;
    }

   button:hover{
    background:  #366d79;
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
    <?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "123456";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

if (isset($_GET['search'])) {
    $search_query = $_GET['search'];


$sql = "SELECT * FROM product WHERE product_name ILIKE '%$search_query%'";
$result = pg_query($conn, $sql);
echo "<title>Search - $search_query</title>";
echo "<br><header><h1>Search - $search_query</h1></header><br>";    
if (pg_num_rows($result) > 0) {
        echo "<div class='products'>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<div class='product-card'>";
            echo "<img src='data:image/jpeg;base64," . $row["product_image"] . "' alt='" . htmlspecialchars($row["product_name"]) . "'>";
            echo "<div class='button-card'>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
            echo "<button type='submit' name='action' id='button' value='add_to_cart'>Add to cart</button>";
            echo "<button type='submit' name='action' class='btn-com' value='compare'><i class='material-icons'>compare_arrows</i></button>";
            echo "</form>";
            echo "<h3>" . htmlspecialchars($row["product_name"]) . "</h3>";
            echo "<p> SAR " . htmlspecialchars($row["price"]) . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p class= 'nop'> No products containing the term <b>\"$search_query\"</b> were found.</p>";
        echo "<a href='home.php'><button class='buttons'> Continue</button></a>";
    }}
    

pg_close($conn);
?>
<br><br><br><br><br><footer>
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
</body>
</html>
