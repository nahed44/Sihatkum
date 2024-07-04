<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>Donation Admin</title>
    <style>
        /* HOME */
    *{
    font-family: 'Poppins', sans-serif;
    margin: 0; padding: 0;
    box-sizing: border-box;
    outline: none; border: none;
    text-decoration: none;
    
    
}

html {
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-behavior: smooth;
    scroll-padding-top: 5rem;
}

.header-1{
 /*background-color: #f0f0f0;*/
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
    height: 116px;
}

.header .header-1{
    background: #fff;
    padding: 1.5rem 9%;
    display: flex;
    align-items: center;
    justify-content:space-between ;
}
   

.header .header-1  #imgg {
    display: flex;
    cursor: pointer;
}
    
#imgg {
    
    width: 155px; 
       
}

.header .header-1 .search-form{
    width: 50rem;
    height: 5rem;
    border: 0.1rem solid rgba(0,0,0,.1);
    overflow: hidden;
    background: #fff;
    display: flex;
    align-items: center;
    border-radius: .5rem;
}

.header .header-1 .search-form input{
    font-size: 1.6rem;
    padding: 0 1.2rem;
    height: 100%;
    width: 100%;
    text-transform: none;
    color: #444;
}
.header .header-1 .search-form label{
    font-size: 2.1rem;
    padding-right: 1.5rem;
    color: #444;
    cursor: pointer;
  
}
.header .header-1 .search-form button{
    background: none;
}

.header .header-1 .search-form label:hover{
    color: #3a909f;
}

.header .header-1 .icons div,
.header .header-1 .icons .icon {
    font-size: 2.3rem;
    margin-left: 1.5rem;
    color: #444;
    cursor: pointer;
}

.header .header-1 .icons div:hover,
.header .header-1 .icons .icon:hover,
.header-1 .icons .compare:hover{
    color: #3a909f;
    border-color: #3a909f;
    
}

.header-1 .compare{
    border-radius: 100%;
    border: 2px solid #444;   
}

/* dropdown menu login*/
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #3a909f;
    min-width: 150px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;

}

.dropdown-content a {
    color: #fff;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #3d7f8b;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown .dropdown-content::before{
    content: '';
    position: absolute;
    top: -5px;
    right: 120px;
    width: 20px;
    height: 20px;
    background: #3a909f;
    transform: rotate(45deg);
    z-index: -999;

}
/* dropdown menu login ends*/


 .Szero{ 
    display: flex;
    width: 20px;
    height: 20px;
    font-size: 16px;
    background-color: rgb(223, 74, 74);
    justify-content: center;
    align-items: center;
    color: #fff;
    border-radius: 50%;
    position: absolute;
    top: 34px;
    right:100px;
    border: 2px solid #fff;
    border-radius: 50%;
}
.Czero{
    display: flex;
    width: 20px;
    height: 20px;
    font-size: 13px;
    background-color: rgb(223, 74, 74);
    justify-content: center;
    align-items: center;
    color: #fff;
    border-radius: 50%;
    position: absolute;
    top: 34px;
    right: 140px;
    border: 2px solid #fff;
    border-radius: 50%;
}


#search-btn{
    display: none;
}

.header .header-2{
    background: #3a909f;
}

.header .header-2 .navbar {
    text-align: center;
}

.header .header-2 .navbar a{
    color:#fff ;
    display: inline-block;
    padding: 1.2rem;
    font-size: 1.7rem;
}

.header .header-2 .navbar a:hover{
    background: #2b606a;
}

.header .header-2.active{
       position: fixed;
       top: 0; left: 0; right: 0;
       z-index: 1000;
}
 /* home ends */


body{
    background-color: #fff;
}

.title{   
    color:#3a909f
}
    .container {
       display: flex;
      flex-direction: column;
      align-items: center;
    }
    #productsTable {
       width: 80%;
      border-collapse: collapse;
     margin-top: 20px;
        }

    #productsTable th, #productsTable td {
       border: 1px solid #dddddd;
       text-align: left;
       padding: 8px;
     }
     
    .separator {
          margin-top: 5px;
          margin-bottom: 5px;
          border-bottom: 1px solid #dddddd;
     }
       
     #color{
        background-color:#3a909f;
        color:  #f0f0f0;
        font-size: 1.4rem;
     }
     #img{
        width: 70px;
        height: 50px;
     }

     #delete{
        background: none;
        text-align: center;
        cursor: pointer;
     }
     #delete i{
        color: #000;
        font-size: 13px;
     }
     .title {   
            color: #3a909f;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #productsTable {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #productsTable th, #productsTable td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        #productsTable img {
            width: 70px;
            height: 50px;
        }

        
#h2{
    margin-bottom:100px;
    margin-top: 60px;
}
#productsTable td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    font-size: 1.2rem;  
    text-align: center;
}

.available-button {
    color: #fff;
    width: 80px;
    height: 37px;
    border-radius: 14px;
    background-color: #6eaa5e;
}




    </style>
</head>
<body>
<header class="header">
        <div class="header-1">
            <a href="AdmanHome.php">
           <img id="imgg" src="img/new_logo-removebg-preview.png">
           <a>
         <form action="" class="search-form">
            <input type="search" name="" placeholder="Search" id="search-box"/>
            <label for="search-box" class="fas fa-search"></label>
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


    <!-- <a href="Donate.php"><i class="fa-solid fa-circle-plus fa-2xl" style="color: #545e6d;" id="icon-add"></i></a>   -->
    <h2 style="font-size:1.7rem; text-align: center; margin-bottom:30px;" id="h2">Donation Management</h2>
    <div class="container">
        <table id="productsTable">
            <tr id="color">
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Status</th>
                <th>Product Note</th>
                <th>Donor Information</th>
                <th>Status</th>
                <th>Product Image</th>
                <th>Delete</th>
            </tr>


            <?php
                $conn = pg_connect("host=localhost dbname=postgres user=postgres password=123456");
                if (!$conn) {
                    echo "Error connecting to the database.";
                } else {
                    $sql = "SELECT * FROM donation";
                    $result = pg_query($conn, $sql);

                    if ($result) {
                        while ($row = pg_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["donationnumber"]) . "</td>";
                            echo "<td style=' text-align: left;'>" . htmlspecialchars($row["productname"]) . "</td>";
                            echo "<td style=' text-align: left;'>" . htmlspecialchars($row["productstatus"]) . "</td>";
                            echo "<td style=' text-align: left;'>" . htmlspecialchars($row["note"]) . "</td>";
                            echo "<td style=' text-align: left;'>" . htmlspecialchars($row["contactinfo"]) . "</td>";
                            echo "<td><button (" . $row["donationnumber"] . ")' id='syncButton1' class='available-button'>  Available  </button></td>";
                            
                            echo "<td><img src='data:image/jpeg;base64," . htmlspecialchars($row["productimage"]) . "' alt='" . htmlspecialchars($row["productname"]) . "'></td>";
                            echo "<td><form method='post'><button id='delete' type='submit' name='delete_donation' value='" . htmlspecialchars($row["donationnumber"]) . "'><i class='fas fa-trash'></i></button></form></td>";
                            // echo "<td><span class='red-circle' id='red-circle-" . $row["donationnumber"] . "'></span></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No results found.</td></tr>";
                    }

                    if (isset($_POST['delete_donation'])) {
                        $deleteProductId = $_POST['delete_donation'];
                        $deleteSql = "DELETE FROM donation WHERE donationnumber = $deleteProductId";
                        $deleteResult = pg_query($conn, $deleteSql);}
                    }
                    pg_close($conn);
            ?>
            
        </table>
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
            document.getElementById('syncButton2'),
            document.getElementById('syncButton3'),
            document.getElementById('syncButton4'),
                 
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
                        color: 'green'
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
