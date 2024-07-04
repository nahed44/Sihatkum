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
    <title> Donation Devices</title>
</head>
<style>
/* ديزاين الكارد */

.row {
    display: flex;
    flex-wrap: wrap;
}

.product-box { 
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
    margin-top: 15px;
    margin-right: 30px;

   
}


.product-box img {
    width: 100%; 
    height: 60%;

}

.product-box:hover {
    box-shadow: 0 5px 25px rgba(12, 12, 12, 0.3);
}

h3 {
    margin-top: 10px;
}
p{
    font-size: 10px;
}
 #H22{
    margin-top: 29px;
    margin-bottom: 33px;
    font-size: 20px;
    font-family: 'Poppins', sans-serif;
    margin-left: 20px;

}
.button-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.button{
    text-align: center;
    margin-left: 10px;
    background-color: #3a909f;
    width:200px ;
    color: #fff;
    border: hsl(0, 0%, 94%);
    height: 30px;
    margin-top: 10px;
    
}

.btn-com{
    text-align: center;
    /* margin-left: 10px; */
    background-color: #3a909f;
    width:30px ;
    color: #fff;
    border: hsl(0, 0%, 94%);
    height: 29px;
    margin-top: 10px;
    /* border-radius: 50%; */
    

}


#com i{
     text-align: center;
}
.btn-com:hover , #button:hover{
    background: #366d79;
}

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

<!-- menu navbar -->


<div class="product-container"></div>
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
}?>


<div class="row">
    <?php
    $sql = "SELECT * FROM donation";
$result = pg_query($conn, $sql);

    
if ($result) {
    echo "<h2 id='H22'> Donation Devices</h2>";
    echo "<div class='row'>";
    while ($row = pg_fetch_assoc($result)) {
        echo "<div class='product-box'>";
        echo "<img src='data:image/jpeg;base64," . $row["productimage"] . "' alt='" . htmlspecialchars($row["productname"]) . "'>";
        echo "<h3>" . htmlspecialchars($row["productname"]) . "</h3>";
        echo "<p>" . htmlspecialchars($row["productstatus"]) . "</p>";
        echo "<p>" . htmlspecialchars($row["note"]) . "</p>";
        echo "<td style=' text-align: left;'>" . htmlspecialchars($row["contactinfo"]) . "</td>";
        echo "<div class='box'>";
        echo "<button class='button' (" . $row["donationnumber"] . ")' id='syncButton1'>  Available  </button>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "0 results";
}
    ?>
    
</div><br><br><br><br>
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

        const channel = new BroadcastChannel('page_sync_channel');
        const syncButtons = [
            document.getElementById('syncButton1'),
      
        ];
        
        const updateButtonState = (syncButton) => {
            const savedState = localStorage.getItem(syncButton.id);
            if (savedState) {
                const { text, color } = JSON.parse(savedState);
                syncButton.innerText = text;
                syncButton.style.backgroundColor = color;
            }
        };

        syncButtons.forEach(button => {
            updateButtonState(button);

            button.addEventListener('click', () => {
                let newState;
                if (button.innerText === 'Available') {
                    newState = {
                        text: 'Not Available',
                        color: 'red'
                    };
                } else {
                    newState = {
                        text: 'Available',
                        color: '#3a909f'
                    };
                }
                button.innerText = newState.text;
                button.style.backgroundColor = newState.color;
                localStorage.setItem(button.id, JSON.stringify(newState)); 
                channel.postMessage({ id: button.id, ...newState });
            });
        });
        
        channel.addEventListener('message', (event) => {
            const { id, text, color } = event.data;
            const syncButton = document.getElementById(id);
            syncButton.innerText = text;
            syncButton.style.backgroundColor = color;
            localStorage.setItem(id, JSON.stringify({ text, color })); 
        });
    </script>


</body>
</html>