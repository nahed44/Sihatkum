<!-- <?php 
$conn = pg_connect("host=localhost dbname=postgres user=postgres password=123456");
if (!$conn) {
    echo "Error connecting to the database.";
    exit;
}


if (isset($_POST['add_product'])) {

    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $category = $_POST['name_id'];
    $Description = $_POST['description'];
    $price = $_POST['price'];
    
    $insertSql = "INSERT INTO product (product_id, product_name,name_id, description, price)
    VALUES ('$productId' ,'$productName', '  $category', '$Description', '$price');";

    // $insertSql .= "INSERT INTO categories (category_name)
    //  VALUES ('$category');";

    $insertResult = pg_query($conn, $insertSql);
    if ($insertResult) {
        echo "<script>alert('Product added successfully.'); window.location.href = 'Padmin.php';</script>";
    } else {
        echo "<script>alert('Add Product failed.'); window.location.href = 'Padmin.php';</script>";
    }
}
 pg_close($conn);
?>-->

