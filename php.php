<?php
$conn = pg_connect("host=localhost dbname=postgres user=postgres password=123456");
if (!$conn) {
    echo "Error connecting to the database.";
    exit;
}


if (isset($_POST['add_Donate'])) {

    // $productId = $_POST['donationnumber'];
    $ProductName = $_POST["productname"];
    $Description = $_POST["productstatus"];
    $price = $_POST["Note"];
    $Contact=$_POST["contactinfo"];
    
    $insertSql = "INSERT INTO donation ( ProductName,productStatus, Note, contactinfo)
    VALUES ('$ProductName', '$Description', '$price', ' $Contact');";;

$insertResult = pg_query($conn, $insertSql);
if ($insertResult) {
    echo "<script>alert('Product added successfully.'); window.location.href = 'home.php';</script>";
} else {
    echo "<script>alert('Add Product failed.'); window.location.href = 'home.php';</script>";
}
}
pg_close($conn);
?>
<!-- <script> 
    function addDonate() {
        var addSuccessful = true; 

        if (addSuccessful) {
            alert('Product added successfully.');
            
            window.location.href = "Padmin.php"; 
        } else {
            alert('Add Product failed.');
        }
    }
</script>-->