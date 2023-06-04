
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

// Function to handle checkout
function handleCheckout($productName, $price, $size)
{
    global $pdo;
    $username = $_SESSION['user']['username'];

    // Prepare the query
    $stmt = $pdo->prepare("INSERT INTO addtocart (username, product_name, price, size) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username, $productName, $price, $size]);

    // Check if the addtocart was successful
    if ($stmt->rowCount() > 0) {
        
    } else {
        echo "addtocart failed.";
    }
}

// Handle add to cart
// Handle add to cart
if (isset($_POST['add_to_cart'])) {
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $size = isset($_POST['size']) ? $_POST['size'] : ''; // Add a check for the "size" key

    handleCheckout($productName, $price, $size);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dashboard css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>

<div class="mainContainer">
    <div class="Navbar">
        <div class="logoContainer">
            <img src="./img/Starlight.png" alt="" srcset="">
        </div>
        <div class="searchContainer">
    <img src="./img/search-interface-symbol.png" alt="" srcset="">
    <input type="text" id="searchInput" placeholder="Search product" onkeyup="searchProduct()">
</div>
        <div class="cartContainer" id="cartContainer">
        <a href="cart.php"><img src="./dashboard img/shopping-bag.png" alt="" srcset=""></a>
        <span id="cartNotification" class="notification">0</span>
         </div>


        <div class="dropdown userContainer">
            <p><?php echo $_SESSION['user']['username']; ?></p>
            <img src="./dashboard img/user.png" alt="" srcset="">
            <div class="dropdown-content">
                <ul>
                    <li><img src="./dashboard img/user.png" alt="" srcset=""><a href="#">Profile</a></li>
                    <li><img src="./dashboard img/settings.png" alt="" srcset=""><a href="#">Settings</a></li>
                    <li><img src="./dashboard img/exit.png" alt="" srcset=""><a href="./PDO backend/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="sideBar">
        <h2>Categories</h2>
        <ul>
            <li class="selectSidebar">
                <input type="checkbox" id="shirt">
                <label for="shirt"></label>
                <a href="">Shirt</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="shoes">
                <label for="shoes"></label>
                <a href="">Shoes</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="bag">
                <label for="bag"></label>
                <a href="">Bag</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="sock">
                <label for="sock"></label>
                <a href="">Jeans</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="dress">
                <label for="dress"></label>
                <a href="">Dress</a>
            </li>
        </ul>
        <hr>
        <h2>Location</h2>
        <ul>
            <li class="selectSidebar">
                <input type="checkbox" id="soong">
                <label for="soong"></label>
                <a href="">Soong</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="datag">
                <label for="datag"></label>
                <a href="">Datag</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="looc">
                <label for="looc"></label>
                <a href="">Looc</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="babag">
                <label for="babag"></label>
                <a href="">Babag</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="mactan">
                <label for="mactan"></label>
                <a href="">Mactan</a>
            </li>
        </ul>
        <hr>
        <h2>Payment</h2>
        <ul>
            <li class="selectSidebar">
                <input type="checkbox" id="gcash">
                <label for="gcash"></label>
                <a href="">Gcash</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="paypal">
                <label for="paypal"></label>
                <a href="">Paypal</a>
            </li>
            <li class="selectSidebar">
                <input type="checkbox" id="gwallet">
                <label for="gwallet"></label>
                <a href="">Gwallet</a>
            </li>
        </ul>
        <hr>
        <hr>
        <h2>BSIT 2D</h2>
        </ul>
        <hr>
    </div>

    <!-- PRODUCT CONTAINER -->

    <div class="productContainer">
        <div class="navbarProduct">
            <h3>Search result for <span class="searches">"Nike"</span> </h3>
            <div class="listContainer">
                <ul>
                    <li class="productList active"><a href="#" onclick="changeStyle(this, 'All Products')">All Products</a></li>
                    <li class="productList"><a href="#" onclick="changeStyle(this, 'Popular')">Popular</a></li>
                    <li class="productList"><a href="#" onclick="changeStyle(this, 'Latest')">Latest</a></li>
                    <li class="productList"><a href="#" onclick="changeStyle(this, 'Discount')">Discount</a></li>
                    <li class="productList"><a href="#" onclick="changeStyle(this, 'More')">More</a></li>
                </ul>
            </div>
            <div class="selectproductContainer">
                <ul>
                    <li>
                        <img class="productImg" src="./product img/Nike 1.png" alt="">
                        <h2 class="productName">Nike Speed Regular</h2>
                        <p class="productPrice">₱1,500</p>
                        <div class="checkoutContainer">
                            <p>Check Out</p>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="product_name" value="Nike Speed Regular">
                            <input type="hidden" name="price" value="1500">
                            <input type="hidden" name="size" value="39">
                            <button type="submit" name="add_to_cart" class="addtoCartContainer">
                                <img class="addtocartImg" src="./dashboard img/shopping-bag.png" alt="" srcset="">
                            </button>
                        </form>
                    </li>
                </ul>
                <ul>
                    <li>
                        <img class="productImg" src="./product img/Nike 2.png" alt="">
                        <h2 class="productName">Nike Free Air</h2>
                        <p class="productPrice">₱1,499</p>
                        <div class="checkoutContainer">
                            <p>Check Out</p>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="product_name" value="Nike Free Air">
                            <input type="hidden" name="price" value="1499">
                            <input type="hidden" name="size" value="39">
                            <button type="submit" name="add_to_cart" class="addtoCartContainer">
                                <img class="addtocartImg" src="./dashboard img/shopping-bag.png" alt="" srcset="">
                            </button>
                        </form>
                    </li>
                </ul>
                <ul>
                    <li>
                        <img class="productImg" src="./product img/Nike 3.png" alt="">
                        <h2 class="productName">Nike Air Max Premium</h2>
                        <p class="productPrice">₱2,799</p>
                        <div class="checkoutContainer">
                            <p>Check Out</p>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="product_name" value="Nike Air Max Premium">
                            <input type="hidden" name="price" value="2799">
                            <input class="inputContainer" type="hidden" name="size" value="39">
                            <button type="submit" name="add_to_cart" class="addtoCartContainer">
                                <img class="addtocartImg" src="./dashboard img/shopping-bag.png" alt="" srcset="">
                            </button>
                        </form>
                    </li>
                </ul>
                <ul>
                    <li>
                        <img class="productImgQualityChange" src="./product img/Nike 5.png" alt="">
                        <h2 class="productName">Nike Foam Runner</h2>
                        <p class="productPrice">₱3,499</p>
                        <div class="checkoutContainer">
                            <p>Check Out</p>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="product_name" value="Nike Foam Runner">
                            <input type="hidden" name="price" value="3499">
                            <input class="inputContainer" type="hidden" name="size" value="39">
                            <button type="submit" name="add_to_cart" class="addtoCartContainer">
                                <img class="addtocartImg" src="./dashboard img/shopping-bag.png" alt="" srcset="">
                            </button>
                        </form>
                    </li>
                </ul>
                <ul>
                    <li>
                        <img class="productImgQualityChange" src="./product img/Nike 6.png" alt="">
                        <h2 class="productName">Nike Air Zoom</h2>
                        <p class="productPrice">₱2,999</p>
                        <div class="checkoutContainer">
                            <p>Check Out</p>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="product_name" value="Nike Air Zoom">
                            <input type="hidden" name="price" value="2999">
                            <input class="inputContainer" type="hidden" name="size" value="39">
                            <button type="submit" name="add_to_cart" class="addtoCartContainer">
                                <img class="addtocartImg" src="./dashboard img/shopping-bag.png" alt="" srcset="">
                            </button>
                        </form>
                    </li>
                </ul>
                <ul>
                    <li>
                        <img class="productImg" src="./product img/Nike 4.png" alt="">
                        <h2 class="productName">Nike Premium Zoom</h2>
                        <p class="productPrice">₱5,499</p>
                        <div class="checkoutContainer">
                            <p>Check Out</p>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="product_name" value="Nike Premium Zoom">
                            <input type="hidden" name="price" value="5499">
                            <input class="inputContainer" type="hidden" name="size" value="39">
                            <button type="submit" name="add_to_cart" class="addtoCartContainer">
                                <img class="addtocartImg" src="./dashboard img/shopping-bag.png" alt="" srcset="">
                            </button>
                        </form>
                    </li>
                </ul>
                <ul>
                    <li>
                        <img class="productImgQualityChange" src="./product img/Nike Zeus.png" alt="">
                        <h2 class="productName">Nike Zeus</h2>
                        <p class="productPrice">₱9,999</p>
                        <div class="checkoutContainer">
                            <p>Check Out</p>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="product_name" value="Nike Zeus">
                            <input type="hidden" name="price" value="9999">
                            <input class="inputContainer" type="hidden" name="size" value="39">
                            <button type="submit" name="add_to_cart" class="addtoCartContainer">
                                <img class="addtocartImg" src="./dashboard img/shopping-bag.png" alt="" srcset="">
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- PREVIEWS CONTAINER  -->

    <div id="previewsContainer" class="previewsContainer">
        <div class="previewsH1">
            <h1>Previews</h1>
        </div>
        <div class="productpreviewsContainer">
            <img class="previewsImg" src="./product img/Nike 1.png" alt="">
            <div class="productDescription">
                <h3>Nike Speed Regular</h1>
                    <p class="productpreviewPrice">₱1,500</p>
                    <div class="sizeSelection">
                        <div class="pSizeContainer">
                            <p>Single Size</p>
                        </div>
                        <div class="selectedsizeContainer">
                            <p>39</p>
                        </div>
                    </div>
                    <div class="colorSelection">
                        <img class="colorSelect" src="" alt="" srcset="">
                        <img class="colorSelect" src="" alt="" srcset="">
                        <img class="colorSelect" src="" alt="" srcset="">
                    </div>
                    <!-- DESCRIPTION AND REVIEWS -->
                    <div class="descriptionReviewsSelectionContainer">
        <p class="description">Description</p>
        <p class="reviews">Reviews</p>
      </div>
      <div class="descriptionContainer">
        <p>You want to check out this product?</p>
        <div class="checkoutContainer">
          <p>Check Out</p>
        </div>
      </div>
      <div class="userReviewsContainer">
        <div class="userInfo">
          <img class="userImg" src="./user img/Ayaka user.jpg" alt="">
          <h3 class="userName">Ayaka</h3>
        </div>
        <p class="userComment">This shoe is nice and cool. I give it 5 stars, it's great!</p>
      </div>    
      <h1>BSIT2D</h1>
    </div>
         
            </div>
        </div>
    </div>
    <script src="./js/dashboard.js"></script>
    
</div>
</body>
</html>