<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <script src="https://kit.fontawesome.com/c4254e24a8.js"></script>
    <link rel="stylesheet" href="home.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Add/Edit Product</title>
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

     #delete {
        margin-left: 12px;
        background: none;
        cursor: pointer;
      
     }
     #delete .d{
        color: #000;
        font-size: 13px;
     }
     #Edit{
        margin-left: 7px;
        background: none;
        cursor: pointer;
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

        #icon-add {
            margin-left: 450px;
            margin-top:70px;
            font-size:29px;
        }
        
        #ss{
            margin-bottom:100px;
            margin-top: -19px;
        }
#productsTable td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    font-size: 1.2rem;  
    text-align: center;
}


/* Popup */
#editPopup {
    display: none; 
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000; 
    background: #ffffff; 
    padding: 30px; 
    border-radius: 8px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1); /* ظل خفيف وأنيق */
    width: 400px; 
    max-width: 90%; 
}

#editForm {
    display: flex;
    flex-direction: column;
}

#editForm div {
    margin-bottom: 10px; 
}

#editForm label {
    font-weight: bold; 
    margin-bottom: 5px; 
}

#editForm input, #editForm textarea {
    padding: 8px; 
    border: 1px solid #cccccc; 
    border-radius: 4px; 
    width: calc(100% - 16px); 
}

#editForm button {
    padding: 10px 20px;
    background-color: #3a909f; 
    color: white; 
    border-radius: 5px;
    cursor: pointer; 
    border: none;
    margin-top: 10px; 
}

#editForm button:hover {
    background-color: #366d79; 
}


.editForm input:focus, textarea:focus {
    border-color: #4CAF50; 
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5); 
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
    <!-- Popup Window -->
<div id="editPopup" style="display:none; position:fixed; left:50%; top:50%; transform:translate(-50%, -50%); z-index:100; background:white; padding:20px; border-radius:5px; box-shadow:0 0 10px rgba(0,0,0,0.5);">
    <form id="editForm">
        <input type="hidden" id="editId" name="product_id">
        <div>
            <label>Product Name:</label>
            <input type="text" id="editName" name="product_name" required>
        </div>
        <div>
            <label>Price:</label>
            <input type="text" id="editPrice" name="price" required>
        </div>
        <div>
            <label>Description:</label>
            <textarea id="editDescription" name="description" required></textarea>
        </div>
        <div>
            <button type="button" onclick="closePopup()">Cancel</button>
            <button type="submit">Save Changes</button>
        </div>
    </form>
</div>

    <div><a href="Add-newp.php"><i class="fa-solid fa-circle-plus fa-2xl" style="color: #545e6d;" id="icon-add"></i></a></div>  
    <h2 style="font-size:1.9rem; text-align: center; margin-bottom:30px;" id=ss >Product management</h2>
    <div class="container">
      
        <table id="productsTable" >


            <tr div id="color">
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Description</th>
                <th>Category id</th>
                <th>product img</th>
                <th>Edit</th>
                <th>Delete</th>
            </div>
         </tr>
<?php
    $conn = pg_connect("host=localhost dbname=postgres user=postgres password=123456");
        if (!$conn) {
            echo "Error connecting to the database.";
            exit;
        }
        
        $sql = "SELECT * FROM product";
        $result = pg_query($conn, $sql);
            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["product_id"]) . "</td>";;
                    echo "<td>" . htmlspecialchars($row["product_name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["price"]) . "</td>";
                    echo "<td style=' text-align: left;'>" . htmlspecialchars($row["description"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["name_id"]) . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . htmlspecialchars($row["product_image"]) . "' alt='" . htmlspecialchars($row["product_name"]) . "'></td>";
                    echo "<td><button id='Edit' onclick=\"showPopup('" . htmlspecialchars($row['product_id']) . "', '" . htmlspecialchars($row['product_name']) . "', '" . htmlspecialchars($row['price']) . "', '" . htmlspecialchars($row['description']) . "')\"><i class='fas fa-edit'></i></button></td>";
                    echo "<td><form method='post'><button id='delete' type='submit' name='delete_product_id' value='" . htmlspecialchars($row["product_id"]) . "'><i class='fas fa-trash d'></i></button></form></td>";
                    echo "</tr>";
                    }
                } else {
                    echo "0 results"; 
                }
                if (isset($_POST['delete_product_id'])) {
                    $deleteProductId = $_POST['delete_product_id'];
$deleteSql = "DELETE FROM product WHERE product_id = $deleteProductId";
                    $deleteResult = pg_query($conn, $deleteSql);}
                    // header("Location: Padmin.php"); 
            
              
                pg_close($conn);
                ?>
            </table>
    </div><br><nr><br><br><br>
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
    function showPopup(id, name, price, description) {
    document.getElementById('editId').value = id;
    document.getElementById('editName').value = name;
    document.getElementById('editPrice').value = price;
    document.getElementById('editDescription').value = description;
    document.getElementById('editPopup').style.display = 'block';
}

function closePopup() {
    document.getElementById('editPopup').style.display = 'none';
}

document.getElementById('editForm').onsubmit = function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    fetch('update_product.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert('Product updated successfully!');
        closePopup();
        location.reload(); // تحديث الصفحه
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to update product.');
    });
};

</Script>  
</body>
</html>