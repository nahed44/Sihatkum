<?php
session_start();

// Initialize the cart array if it's not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handling the POST request to add a product to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if the product is already in the cart and add/increment accordingly
    if (!array_key_exists($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$product_id] = 1; // Add new item with quantity 1
    } else {
        $_SESSION['cart'][$product_id]++; // Increment the quantity if already in the cart
    }

    // Instead of redirecting, just refresh the current page to stay on it
    header("Location: " . $_SERVER['PHP_SELF']);
        exit;
}

// Initialize the compare array if it's not already set
if (!isset($_SESSION['compare'])) {
    $_SESSION['compare'] = array();
}

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

// Handle remove action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_product_id'])) {
    $remove_product_id = $_POST['remove_product_id'];
    if (array_key_exists($remove_product_id, $_SESSION['compare'])) {
        unset($_SESSION['compare'][$remove_product_id]);  // Remove product from compare
        echo "Product removed";
        exit;
    }
}

function displayComparedItems($pdo) {
    echo "<div class='compared-items'>";
echo "<div class='table-responsive'>";
echo "<h3>PRODUCT DETAILS</h3>";
echo "<div class='compared-items'>";

if (!empty($_SESSION['compare'])) {
    echo "<div class='left-column'>";
    echo "<p>Product:</p>";
    echo "<p>Image:</p>";
    echo "<p>Price:</p>";
    echo "<p>Description:</p>";
    echo "</div>";

    foreach ($_SESSION['compare'] as $productId => $status) {
        $sql = "SELECT product_id, product_name, price, product_image , description FROM product WHERE product_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            ?>
            <div class="product-detail">
                <div class="right-column">
                    <p><?php echo htmlspecialchars($product['product_name']); ?></p></a>
                    <p><img src="data:image/jpeg;base64,<?php echo $product['product_image']; ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>"></p>
                    <p>SAR <?php echo htmlspecialchars($product['price']); ?></p>
                    <p class='desc'><?php echo htmlspecialchars($product["description"]); ?><br><br></p><br> 
                </div>
                <form method="post">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['product_id']); ?>">
                    <button class='btn-add' type="submit" name="action" id="add_to_cart_button" value="add_to_cart">Add to cart</button>
                    <button  class="btn-remove" onclick="removeProduct(<?php echo $productId; ?>)">Remove</button>
                </form>
            </div>
            <?php
        }
    }
} else {
    echo "<p class='no-products'>No products added for comparison.</p>";
    echo "<a href='home.php'><button class='continue-button'>Continue</button></a>";
}

echo "</div>"; // Close the div with class 'compared-items'
echo "</div>"; // Close the div with class 'table-responsive'
echo "</div>"; // Close the div with class 'compared-items'

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
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    <title>مقارنة المنتجات</title>
</head>
<style>
     .table-responsive {
            display: none;  
            border: 1px solid #ddd; /* حدود أكثر سمكاً */
            
            border-top: 30px solid #ddd;
            border-bottom: 50px solid #ddd;
            margin: 30px; margin-top: 0;
            padding: 10px;
            width: 1300px;
        }
.compared-items {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
      
        margin-bottom: 100px;
        justify-content: center;
        text-align: center;
        padding-top: 40px;
        font-size: 10px;
        margin-left: 15px;
}

.product-detail {
    padding: 10px;
    margin: 10px;
    width: 45%;
    
    
}

.table-responsive h3 {

    text-align: left;
    margin-top: -35px;
    font-size: 15px;
    font-weight: 500;
}
.left-column{
    margin-top: -50px;
    text-align: left;
    font-size: 15px;
    line-height: 7.8;
    font-weight: 600;
    
}

.product-detail p {
    margin: 5px 0;
    padding: 10px;
    margin-top:-68px;
    line-height: 8.6;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;

}

.btn-remove, .btn-add {
    padding: 10px 20px;
    margin: 10px 5px 0 0;
    background-color: #3a909f;
    color: white;
    border: none;
    cursor: pointer;
   
}

.btn-remove:hover, .btn-add:hover {
    background-color: #366d79;
}
.product-detail img {
    width: 155px; 
    margin-top: 50px;

}
.page-title{
    margin-left: 35px ;
    margin-top: 10px;
}

.no-products{
            padding: 10px;
            margin-bottom: 10px;
            justify-content: center;
            text-align: left;
            font-size: 16px;
            margin-left: 70px;
            
        
    }

.continue-button {
      
        background-color: #3a909f;
        color: white;
        border: none;
        text-align: center;
        font-size: 16px; font-weight: 400;
        text-align: center;
        justify-content:center;
    }
    .continue-button{
        height: 50px;
        width: 140px;
        margin-left: 10px;
        text-align: center;
        cursor: pointer;
      
        
    }

    .continue-button:hover{
    background:  #366d79;
   }

/* .desc{ 
  
    padding: 0;
    margin: 0;
    width: 100%;
    line-height: -9px; 
}*/

</style>
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
                    <a href="login.php">Login</a>
                    <a href="singup.php">Register</a>
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
        
    </header><br/>
    <main>
        <div id="content">
            <h1 class="title page-title">The comparison between products</h1>
            <?php displayComparedItems($pdo); ?>
        </div>
    </main>
    <script>
function removeProduct(productId) {
    // Use AJAX to send a POST request to the server
    var formData = new FormData();
    formData.append('remove_product_id', productId);

    fetch(window.location.href, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Remove the product element from the page
        var productElement = document.getElementById('product_' + productId);
        if (productElement) {
            productElement.remove();
        }
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener("DOMContentLoaded", function() {
    // قم بفحص إذا كانت هناك منتجات في المقارنة
    var comparedItems = document.querySelector('.compared-items');
    var tableResponsive = document.querySelector('.table-responsive');

    if (comparedItems && comparedItems.children.length != 0) {
        // إذا كانت الصفحة فارغة، قم بإخفاء البوردر بالكامل
        tableResponsive.style.display = 'block';
    } 
});


</script>

</body>
</html>