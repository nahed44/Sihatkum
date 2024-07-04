<?php
session_start(); // Start the session at the top to ensure it's available
echo "<script>console.log('here');</script>";

$authenticated = false;
if (isset($_POST['verify'])) {
   if ($_POST['verify'] == "LOGIN") {
       echo "<script>console.log('Verification passed');</script>";
   } else {
       echo "<script>console.log('Verification failed: verify not LOGIN');</script>";
   }
} else {
   echo "<script>console.log('Verification failed: verify not set');</script>";
}

if (isset($_POST['verify']) && $_POST['verify'] == "LOGIN") {
   echo "<script>console.log('here1');</script>";
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    // Assume $conn is your database connection already set up earlier
    $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=123456");
    echo "<script>console.log('here2');</script>";
    if (!$conn) {
        echo "Error: Unable to connect to the database.";
    } else {
        $query = "SELECT * FROM customer WHERE email=$1 AND password=$2";
        $res = pg_query_params($conn, $query, array($Email, $Password));
        echo "<script>console.log('here3');</script>";
        if (!$res) {
            echo "An error occurred.\n";
            exit;
        }
        echo "<script>console.log('here4');</script>";
        if (pg_num_rows($res) > 0) {
         echo "<script>console.log('here5');</script>";
         $row = pg_fetch_assoc($res); // Fetch the data as an associative array
         $_SESSION['username'] = $row['firstname'];  // تخزين اسم المستخدم في الجلسة
         $_SESSION['authenticated'] = true; // Set a session variable on successful login
         $_SESSION['email'] = $Email; // Store the user email in the session
         $_SESSION['customerid'] = $row['customerid']; // Set customer ID from the database
         $authenticated = true;
         //  header('Location: home.php');//
         // exit;//

            // $_SESSION['customerid'] = 16; // Set customer ID from the database

                        // Additional session variables like user ID can be set here if needed
        }
    }

    if (!$authenticated) {
        echo "Login not valid";
    } else {

        header('Location: checkout.php'); // Redirect to another page upon successful login
        exit; // Ensure that no further code is executed once a redirect is issued
    }
}
echo "<script>console.log('here7');</script>";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="CSS\userLogin.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <div class="bg-img">
         <div class="content">
            <header>Login</header>
            <form action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="post">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" name="Email" required placeholder="Enter Your Email ">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" name="Password" class="pass-key" required placeholder="Password">
                  <span class="show">SHOW</span>
               </div>
               <br>
               <div class="field">
                  <input type="submit" value="LOGIN" name="verify">
               </div>
            </form>
           
            <div class="signup">
               Don't have account?
               <a href="singup.php">Signup Now</a>
            </div>
   <br><br>
   <p class ="para-2">
         <a href="Ladmin.php"> Admin here </a>
         </div>
      </div>
      <script>
         const pass_field = document.querySelector('.pass-key');
         const showBtn = document.querySelector('.show');
         showBtn.addEventListener('click', function(){
            if(pass_field.type === "password"){
               pass_field.type = "text";
               showBtn.textContent = "HIDE";
               showBtn.style.color = "#3498db";
            }else{
               pass_field.type = "password";
               showBtn.textContent = "SHOW";
               showBtn.style.color = "#222";
            }
         });
      </script>
   </body>
</html>