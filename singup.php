
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname']; // Note: Corrected variable name spelling from 'lasttname' to 'lastname'
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Consider using password_hash($password, PASSWORD_DEFAULT) for hashing

    // Connection to the database
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=123456");
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }

    // Insert query
    $query = "INSERT INTO customer (firstname, lastname, phonenumber, email, password) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($conn, $query, array($firstname, $lastname, $phonenumber, $email, $password));

    if ($result) {
        echo "<script>alert('Registration successful!')</script>";
        // Retrieve the newly inserted customer ID
        $_SESSION['customerID'] = pg_fetch_result(pg_query($conn, "SELECT LASTVAL()"), 0, 0);
        // Redirect the user to the cart page or main page
        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Error: " . pg_last_error($conn) . "')</script>";
    }

    // Close the connection
    pg_close($conn);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="ss.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="bg-img">
        <div class="content">
            <header>Sign Up</header>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="firstname" required   placeholder="First Name">
                </div>
        <div class="field space">
                    <span class="fa fa-user"></span>
                    <input type="text"  name="lasttname" required placeholder="Last Name">
                  
                </div>
    <div class="field space">
                    <span class="fa fa-user"></span>
                    <input type="text"  name="phonenumber" required placeholder="Phone Number">
                  
                </div>
                <div class="field space">
                    <span class="fa fa-envelope"></span>
                    <input type="email" name="email" required placeholder="Email">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="pass-key" name="password" required placeholder="Password">
                    <span class="show">SHOW</span>
                </div>
                
    <br>
                <div class="field">
                    <input type="submit" value="SIGN UP" onclick="showAlert()" id="submitButton" >
                </div>
            </form>
            <div class="signup">
                Already have an account? <a href="login.html">Login Now</a>
            </div>
   
        </div>
    </div>
    <script>
        const pass_fields = document.querySelectorAll('.pass-key');
        const showBtns = document.querySelectorAll('.show');
        
        showBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                pass_fields.forEach(field => {
                    if(field.type === "password") {
                        field.type = "text";
                        btn.textContent = "HIDE";


btn.style.color = "#3498db";
                    } else {
                        field.type = "password";
                        btn.textContent = "SHOW";
                        btn.style.color = "#222";
                    }
                });
            });
        });
    </script>
 <script>
function showAlert() {
 alert("Hello! Know You Are One Of Sihatkum Family. ");
}
</script>

 

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins:400,500&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  user-select: none;
}
.bg-img{
  background: url('bg.jpg');
  height: 100vh;
  background-size: cover;
  background-position: center;
}
.bg-img:after{
  position: absolute;
  content: '';
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0,0,0,0.7);
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 999;
  text-align: center;
  padding: 60px 32px;
  width: 370px;
  transform: translate(-50%,-50%);
  background: rgba(255,255,255,0.04);
  box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
}
.content header{
  color: white;
  font-size: 33px;
  font-weight: 600;
  margin: 0 0 35px 0;
  font-family: 'Montserrat',sans-serif;
}
.field{
  position: relative;
  height: 45px;
  width: 100%;
  display: flex;
  background: rgba(255,255,255,0.94);
}
.field span{
  color: #222;
  width: 40px;
  line-height: 45px;
}
.field input{
  height: 100%;
  width: 100%;
  background: transparent;
  border: none;
  outline: none;
  color: #222;
  font-size: 16px;
  font-family: 'Poppins',sans-serif;
}
.space{
  margin-top: 16px;
}
.show{
  position: absolute;
  right: 13px;
  font-size: 13px;
  font-weight: 700;
  color: #222;
  display: none;
  cursor: pointer;
  font-family: 'Montserrat',sans-serif;
}
.pass-key:valid ~ .show{
  display: block;
}
.pass{
  text-align: left;
  margin: 10px 0;
}
.pass a{
  color: white;
  text-decoration: none;
  font-family: 'Poppins',sans-serif;
}
.pass:hover a{
  text-decoration: underline;
}
.field input[type="submit"]{
  background: #3a909f;
  border: 1px solid #2691d9;
  color: white;
  font-size: 18px;
  letter-spacing: 1px;
  font-weight: 600;
  cursor: pointer;
  font-family: 'Montserrat',sans-serif;
}
.field input[type="submit"]:hover{
  background: grey;
}
.login{
  color: white;
  margin: 20px 0;
  font-family: 'Poppins',sans-serif;
}
.links{
  display: flex;
  cursor: pointer;
  color: white;
  margin: 0 0 20px 0;
}
.facebook,.instagram{
  width: 100%;
  height: 45px;
  line-height: 45px;
  margin-left: 10px;
}
.facebook{
  margin-left: 0;
  background: #4267B2;
  border: 1px solid #3e61a8;
}
.instagram{
  background: #E1306C;
  border: 1px solid #df2060;
}
.facebook:hover{
  background: #3e61a8;
}
.instagram:hover{
  background: #df2060;
}
.links i{
  font-size: 17px;
}
i span{
  margin-left: 8px;
  font-weight: 500;
  letter-spacing: 1px;
  font-size: 16px;
  font-family: 'Poppins',sans-serif;
}
.signup{
  font-size: 15px;
  color: white;
  font-family: 'Poppins',sans-serif;
}
.signup a{
  color: #3498db;
  text-decoration: none;
}
.signup a:hover{
  text-decoration: underline;
}

.para-2 {
  text-align: center;
  color: white;
  font-size: 15px;
  margin-top: -10px;
  font-family: 'Poppins',sans-serif;
}
.para-2 a {
  color:#3498db;
}
</style>



      
</body>
</html>