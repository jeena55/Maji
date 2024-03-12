<?php

session_start();

if (isset($_SESSION['custId'])) {
    $custId = $_SESSION['custId'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

// Create connection <div id="basket" class="w-w-1/4"></div>
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ((isset($_POST['paymentMethod']) && (isset($_POST['amountMoney'])))) {
    $paymentMethod = $_POST['paymentMethod'];
    $amountMoney = $_POST['amountMoney'];
}


$takeawaySQL = "INSERT INTO takeaway(takeawayBranch) VALUES ('ลาดกระบัง')";
$conn->query($takeawaySQL);
$takeawayId = $conn->insert_id;

$createOrder = "INSERT INTO orders(takeawayId, orderDateTime, orderStatus, custId) VALUES ($takeawayId, NOW(), 'ได้รับออเดอร์', 2)";
$conn->query($createOrder);
$orderId = $conn->insert_id;

if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {

    foreach ($_SESSION['basket'] as $index => $item) {
        $menuId = $item['menuId'];
        $menuQuantity = $item['menuQuantity'];

        $menuSQL = "INSERT INTO orderDetail (orderId, menuId, menuQuantity, menuStatus) VALUES ($orderId, $menuId, $menuQuantity, 'ได้รับเมนู')";
        $conn->query($menuSQL);
    }

    unset($_SESSION['basket']);
}

$payment = "INSERT INTO payment(orderId, promotionId, amountMoney, paymentMethod, paymentDateTime, paymentStatus) VALUES ($orderId, 1, $amountMoney, '$paymentMethod', NOW(), 'ชำระเงินเสร็จสิ้น')";
$conn->query($payment);



$conn->close();


?>
