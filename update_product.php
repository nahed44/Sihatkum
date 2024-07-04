<?php
// متغيرات الاتصال بقاعدة البيانات
$host = "localhost";
$dbname = "postgres";
$user = "postgres";
$password = "123456";

// إنشاء الاتصال بقاعدة البيانات
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// التحقق من أن الطلب هو POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // جمع البيانات من النموذج
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // إعداد الاستعلام لتحديث بيانات المنتج
    $sql = "UPDATE product SET product_name = :product_name, price = :price, description = :description WHERE product_id = :product_id";
    $stmt = $conn->prepare($sql);
    
    // ربط المتغيرات بالاستعلام وتنفيذه
    $stmt->execute([
        ':product_id' => $product_id,
        ':product_name' => $product_name,
        ':price' => $price,
        ':description' => $description
    ]);
    
    // إغلاق الاتصال
    $conn = null;
    
    // إرسال رد إيجابي للمستخدم (يمكن أن يكون JSON لتسهيل التعامل مع الجافا سكربت)
    echo json_encode(['success' => true]);
}
?>
