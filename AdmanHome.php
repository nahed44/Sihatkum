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
    <title>Adman Home page</title>
</head>
<style>


 .products { 
    display: flex;
    align-items: center;
    overflow: hidden;
   
}

 .product-card::-webkit-scrollbar{
    display: none;

}

.products-slider {
    display: flex;
    transition: transform 0.3s ease-in-out;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scrollbar-width: none;
}

.product-card {
    flex: 0 0 auto;
    width: 266px;
    margin-right: 16px;
    scroll-snap-align: start;    
}
.product-card {
    overflow-x: auto;
    text-align: center;
    margin: 20px 16px 60px 0;
    color: #0e0d0d; 
    background-color: #f9f9f9;
    border: 1px solid #777;
    overflow: hidden;
    border-radius: 5px;
    padding: 1px;
    transition: 0.7s;
    height: 366px;
    width: 266px;
    padding: 5px;
    transition: 0.3s;     
}
.product-card:hover {
    box-shadow: 0 5px 25px rgba(12, 12, 12, 0.3);
}

h3 {
    margin-top: 14px;
    color: #000;
}
p{
    font-size: 13px;
   color: #000;
    
}

.product-card img {
    width: 100%; 
    height: 60%;

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
}

.btn-com {
    width: 30px; /* تحديد عرض الزر الثاني */
    margin-left: 2px;
}

#com i{
     text-align: center;
}
.btn-com:hover , #button:hover{
    background: #366d79;
}



.slid-btn{
    position: absolute;
    top: 200%;
    height:35px;
    width: 35px;
    color: #fff;
    border: none;
    outline: none;
    background: #000;
    font-size: 25px;
    cursor: pointer;
    border-radius: 50%;
    transform: translateY(-50%);
    border: 3px solid #fff;
    border-radius: 50%;
}

 .slid-btn:hover{
    background: #444;
}
.slid-btn#prev{
    left: -1px;
}

.slid-btn#next{
    right: -1px;
} 




</style>
<body>
<header class="header">
        <div class="header-1">
            <a href="AdmanHome.php">
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
                    <a href="Ladmin.php">Login</a>
                </div>
            </div>

                <a href="Compared.html"><i class="material-icons compare icon ">compare_arrows</i>
                    <span class="Czero">0</span></a>
                <a href="Sopping-cart.php"><i id="cart-items" class="material-icons icon">shopping_cart</i>
                    <span class="Szero">0</span></a> 
              </div>
    </div>
      <div class="header-2">
        <nav class="navbar">
            <a href="AdmanHome.php"><img src="">Home</a>

                <a href="Dadmin.php">Donation Management</a>

               <a href="Padmin.PHP">Product Management</a>
         
        </nav>
      </div> 
        
    </header>
        <div class="content">
            <div class="slider-wrapper">
                <button id="prev-slide" class="slid-btn material-symbols-rounded">chevron_left</button>
              <div class="img-bar">
                <a href="Diabetics & Pressure.php"><img src="img/إضافة عنوان.png" class="img-item"></a>
                <a href="Diabetics & Pressure.php"><img src="img/اجهزة.png" class="img-item"></a>
                <a href="Diapers and bedding.php"><img src="img/حفاضات كبار السن (1).png" class="img-item"></a>
                <a href="Medical Supplies.php"><img src="https://balsamok.com/image/cache/catalog/banners/cotton-EN-940x1140w.jpg" class="img-item"></a>
                <a href="Steam Appliances.php"><img src="img/Steam appliances.png" class="img-item"></a>

                <a href="Diabetics & Pressure.php"><img src="img/إضافة عنوان.png" class="img-item"></a>
                <a href="Diabetics & Pressure.php"><img src="img/اجهزة.png" class="img-item"></a>
                <a href="Diapers and bedding.php"><img src="img/حفاضات كبار السن (1).png" class="img-item"></a>
                <a href="Medical Supplies.php"><img src="https://balsamok.com/image/cache/catalog/banners/cotton-EN-940x1140w.jpg" class="img-item"></a>
                <a href="Steam Appliances.php"><img src="img/Steam appliances.png" class="img-item"></a>
              </div>
              <button id="next-slide" class="slid-btn material-symbols-rounded">chevron_right</button>
              
            </div>
        </div><br><br>

        <div class="Top-Categories">
            <h3>Top Categories</h3><br>
            <!--card 1-->
            <div class="cards">
                <div class="card">
                <div class="img-icon">
                    <a href="Medical Supplies.php"><img src="img/صوره شاش.png"></a>
                    <div class="info">Medical cotton and gauze</div>
                </div>
              </div>

            <!--card 2-->
                <div class="card">
                    <div class="img-icon">
                        <a href="Diabetics & Pressure.php"><img src="img/جهاز ضغط.png"></a>
                    </div>
                    <div class="info">Diabetics & Pressure</div>
                    </div> 

            <!--card 3
                <div class="card"> 
                    <div class="img-icon">
                        <a href=""><img src="C:\Users\mshab\Downloads\image-removebg-preview (3).png"></a>
                    </div>
                    <div class="info">
                        <span>Diabetics & Pressure devices</span>
                    </div>
                </div>-->
                
            <!--card 4-->
            <div class="card">
                <div class="img-icon">
                    <a href="Bathroom chairs.php"><img src="img/كرسي حمام.png"></a>
                </div>
                <div class="info">
                    <span>Mobility aids</span>
                </div>
            </div>



            <!--card 5-->
            <div class="card">
                <div class="img-icon">
                    <a href="Steam Appliances.php"><img src="img/جهاز بخار.png"></a>
                </div>
                <div class="info">
                    <span>Steam appliances</span>
                </div>
            </div>


            <!--card 6-->
            <div class="card">
                <div class="img-icon">
                    <a href="Bathroom swan.php"><img src="img/مساعده على الحركه.png"></a>
                </div>
                <div class="info">
                    <span>Elderly</span>
                </div>
            </div>

            </div>
        </div><br><br><br>

        <div class="Bestsellers">
            <h2>Bestsellers</h2><br><br>
<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "123456";

// إنشاء اتصال بقاعدة البيانات
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}


$sql = "SELECT * FROM product WHERE name_id IN (1, 5,4) LIMIT 15;"; 
$result = pg_query($conn, $sql);


if ($result) {
    echo "<div class='products'>";
    echo "<button id='prev' class='slid-btn material-symbols-rounded'>chevron_left</button>";
    echo "<div class='products-slider'>";
    while ($row = pg_fetch_assoc($result)) {
        echo "<div class='product-card'>";
        echo "<a href='Inpro.php?product_id=" . $row["product_id"] . "'>";  // رابط إلى صفحة التفاصيل
        echo "<img src='data:image/jpeg;base64," . $row["product_image"] . "' alt='" . htmlspecialchars($row["product_name"]) . "'>";
        echo "<form method='post'>"; // This form now submits to the same page
        echo "<input type='hidden' name='product_id' value='" . $row["product_id"] . "'>";
        echo "<button onclick='addToCart(" . $row["product_id"] . ")' id='button'> Add to cart </button>";
        echo "<button class='btn-com'><i class='material-icons' id='com'>compare_arrows</i></button>";
        echo "</form>";
        echo "<h3 >" . htmlspecialchars($row["product_name"]) . "</h3><br>";
        echo "<p> SAR " . htmlspecialchars($row["price"]) . "</p>";
        echo "</a>";  // نهاية الرابط
        echo "</div>"; 


    }
    echo "</div>"; 
        
    echo "<button id='next' class='slid-btn material-symbols-rounded'>chevron_right</button>";
} else {
    echo "0 results";
}


pg_close($conn);?>
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

<script src="java.js"></script>