<?php

require_once('./PDO backend/functions.php');

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$dbHost = "localhost";
$dbName = "clothingweb";
$dbUser = "root";
$dbPass = "root123";

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle product deletion
if (isset($_POST['delete'])) {
    $productId = $_POST['delete'];
    $username = $_SESSION['user']['username'];

    $stmt = $pdo->prepare("DELETE FROM addtocart WHERE username = ? AND product_id = ?");
    $stmt->execute([$username, $productId]);
    // You can add additional logic here if needed, such as displaying a success message
}

// Retrieve the cart items for the logged-in user
$username = $_SESSION['user']['username'];

$stmt = $pdo->prepare("SELECT * FROM addtocart WHERE username = ?");
$stmt->execute([$username]);
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate the total price
$totalPrice = 0;
foreach ($cartItems as $item) {
    $totalPrice += $item['price'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cart css/cart.css">
    <title>Cart</title>
</head>
<body>
    <div class="navBar">
        <div class="logoContainer">
           <a href="dashboard.php"><img src="./img/Starlight.png" alt="" srcset=""></a> 
        </div>
        <a href="dashboard.php"><div class="gobackContainer">
           <h3>Go Back</h3>
            <img src="./img/Go Back.png" alt="">
        </div></a>
    </div>
    <div class="middleContent">
        <div class="middleContentImgContainer">
            <img src="./img/Shopping Cart.png" alt="">
        </div>
        <p>Limited Time Offer - <a href="dashboard.php"><span> Shop Now!</span></a></p>
        <p>Here at <a href="dashboard.php"><span>Starlight!</span></a></p>
        <h3>Your Shopping Cart</h3>
    </div>

    <?php if (!empty($cartItems)) : ?>
        <div class="tableContainer">
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item) : ?>
                        <tr>
                            <td><?php echo $item['product_name']; ?></td>
                            <td><?php echo $item['size']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                            <td>
                                <form method="post" action="">
                                    <button type="submit" name="delete" value="<?php echo $item['product_id']; ?>">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Total Price:</th>
                        <td><?php echo $totalPrice; ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php else : ?>
        <p class="cartEmpty">Your cart is empty.</p>
    <?php endif; ?>
</body>
</html>
