<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Website</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <div class="Navbar">
        <ul>
            <li><a href="">New</a></li>
            <li><a href="">Dresses</a></li>
            <li><a href="">Accessories</a></li>
            <li><a href="#Sale">Sale</a></li>
            <li><a href="" id="signupLink">Signup</a></li>
            <li><a href="" id="loginLink">Login</a></li>
           
        </ul>
        <div class="blurry-background" id="blurryBackground"></div>
        <div class="newblurry-background" id="newblurryBackground"></div>
        <div class="login-form" id="loginForm">
  <h2>Login</h2>
  <form action="./PDO backend/functions.php" method="POST">
    <!-- Your login form fields here -->
    <input type="text" name="login_username" placeholder="Username">
    <input type="password" name="login_password" placeholder="Password">
    <button type="submit" name="login_submit">Submit</button>
  </form>
</div>

<div class="signup-form" id="signupForm">
  <h2>Signup</h2>
  <form action="./PDO backend/functions.php" method="POST">
    <!-- Your Signup form fields here -->
    <input type="text" name="signup_username" placeholder="Username">
    <input type="password" name="signup_password" placeholder="Password">
<button type="submit" name="signup_submit">Submit</button>

  </form>
</div>

        <div class="logoMain">
            <img src="./img/Starlight.png" alt="" srcset="">
        </div>
        <div class="searchBar">  <img class="imgSearch" src="./img/search-interface-symbol.png" alt="" srcset="">
            <input type="text" placeholder="Search">
            <div class="basketContainer"><img class="imgBasket" src="./img/shopping-basket.png" alt="" srcset=""></div>
            
        </div></div>
      
    <div class="mainContainer">
        <div class="betterYou"> <p class="">Trendy Collection's</p>
            <h1>Building </h1>
            <h1>a better you</h1>

        </div>
        <div class="Anyone"><p>Anyone can beat you but no one can beat your</p>
            <p class="outfit">outfit as long as you wear Starlight outfits.</p></div>
            <div class="startShopping">
                <p>Start shopping <img src="./img/right-arrow (3).png" alt="" srcset=""> </p>
            </div>
            <div class="model">
                <img class="girlModel" src="./img/young-teen-woman-sunglasses-hat-holding-shopping-bags-her-hands-feeling-so-happiness-isolated-green-wall__1_-removebg-preview.png" alt="" srcset="">
                <img class="orangeCircle" src="./img/color Orange.jpg" alt="" srcset="">
                <img class="bluewhiteCircle" src="./img/skyBG.png" alt="" srcset="">
                <img class="pinkCircle" src="./img/Pink.jpg" alt="" srcset="">
            </div>
            <div class="bottomContainer">
                <img src="./img/fascinating-woman-winter-fur-coat-posing-removebg-preview.png" alt="" srcset="">
                <div class="naturalHealth">
                    <h1>Natural Health</h1>
                    <p>Blog | Article</p>
                </div>
                <div class="fashionBlogger">
                    <h3>Hannah</h3>
                    <p>Fashion Blogger</p>
                    <img src="./img/portrait-european-girl-with-tanned-skin-dark-hair-removebg-preview.png" alt="" srcset="">
                </div>
                <div class="starLightRating">
                    <p class="starQoute">,,</p>
                    <h3>I just love Starlight!</h3>
                    <p class="starComment">Their product are so much premium to</p>
                    <p class="starComment">make you feel confidence. I can't think</p>
                    <p class="starComment">of buying from anyone but them.</p>
                    <p class="ratings">4.9<img class="starImg" src="./img/star.png" alt="" srcset=""></p><hr><p class="overall">Overall rating</p>
                </div>
                    <div class="manyReact">
                        <img class="peopleReact" src="./reaction img/happy-beautiful-girl-gasping-amazed-clap-hands-smiling-looking-surprised-receive-great-news-bein.jpg" alt="" srcset="">
                        <img class="peopleReact1" src="./reaction img/angry-young-handsome-man-looking-camera-showing-empty-hands-shouting-isolated-blue-background.jpg" alt="" srcset="">
                        <img class="peopleReact2" src="./reaction img/handsome-curly-afro-american-guy-points-index-fingers-with-joy-smiles-pleasantly-being-good-mood-picks-you-his-merry-company-wears-white-t-shirt-models-yellow-wall.jpg" alt="" srcset="">
                        <img class="peopleReact3" src="./reaction img/scared-young-man-panic-screaming-looking-axious-jumping-startled-shocked-shaking-hands-nervously-standing-white-background.jpg" alt="" srcset="">
                        <img class="peopleReact4" src="./reaction img/young-man-green-shirt-wearing-glasses-looking-front-confused-blowing-cheeks-pointing-with-thumbs-sides-standing-orange-wall.jpg" alt="" srcset="">
                    </div>
                    <div class="heartContainer">
                        <img src="./img/heart.png" alt="" srcset="">
                    </div>
            </div>  
    </div>
    <div class="middleContainer"> 
        <div class="shopContainer">
            <div class="selectContainer">
                <h2>Styles</h2>
                <p>Shop the latest fashion </p>
                <p>outfits at Starlight.</p>
            </div>
            <div class="selectContainer">
                <h2>Empire Waist</h2>
                <p>Shop now</p>
            </div>
            <div class="selectContainer">
                <h2>Wedding Vibes</h2>
                <p>All popular fashion designers</p>
                <p>products are available on our </p>
                <p>all outfits.</p>
            </div>
            <div class="selectContainer">
                <h2>Classic Trumpets</h2>
                <p>Shop now</p>
            </div>
           
                </div>
                <div class="leftArrow">
                    <img src="./img/left-arrow (2).png" alt="" srcset="">
                </div>
                <div class="salesContainer active">
                    <div class="selectsalesContainer" id="container0">
                        <img src="./clothes img/simple-white-sweater-unisex-streetwear-apparel-removebg-preview.png" alt="">
                        <div class="priceContainer">
                            <h3 class="nameofProduct">White Sweater</h3>
                            <p class="priceofProduct">₱200</p>
                        </div>
                    </div>
                    <div class="selectsalesContainer" id="container1">
                        <img src="./clothes img/short-sleeve-shirt-cloth-hanger-with-white-wall-background-removebg-preview.png" alt="">
                        <div class="priceContainer">
                            <h3 class="nameofProduct">Black T-shirt</h3>
                            <p class="priceofProduct">₱130</p>
                        </div>
                    </div>
                    <div class="selectsalesContainer" id="container2">
                        <img src="./clothes img/blue-t-shirt-removebg-preview.png" alt="">
                        <div class="priceContainer">
                            <h3 class="nameofProduct">Blue T-shirt</h3>
                            <p class="priceofProduct">₱100</p>
                        </div>
                    </div>
                    <div class="selectsalesContainer" id="container3">
                        <img src="./clothes img/green-front-sweater-removebg-preview.png" alt="">
                        <div class="priceContainer">
                            <h3 class="nameofProduct">Green Longsleeve</h3>
                            <p class="priceofProduct">₱350</p>   </div>
                     </div>
                     <div class="selectsalesContainer" id="container4">
                        <img src="./clothes img/pink-sweater-front-removebg-preview.png" alt="">
                        <div class="priceContainer">
                            <h3 class="nameofProduct">Pink Sweater</h3>
                            <p class="priceofProduct">₱350</p>   </div>
                     </div>
                     <div class="selectsalesContainer" id="container5">
                        <img src="./clothes img/hanes longsleeve.png" alt="">
                        <div class="priceContainer">
                            <h3 class="nameofProduct">Hanes Longsleeve</h3>
                            <p class="priceofProduct">₱450</p>   </div>
                     </div>
                     <div class="selectsalesContainer" id="container6"> 
                        <img src="./clothes img/TriBlend Tshirt.png" alt="">
                        <div class="priceContainer">
                            <h3 class="nameofProduct">Tri-Blend tshirt</h3>
                            <p class="priceofProduct">₱550</p>   </div>
                     </div>
            <div class="rightArrow">
                <img src="./img/right-arrow (3).png" alt="" srcset="">
            </div>
        </div>
        <div class="bigsaleTitle" id="Sale">
            <h3 class="bigSale">Big <span>Sale</span> </h3>
        </div>
        <div class="footerContainer">
            <div class="ourPartnerContainer">
                <h1>Our Partners</h1>
            </div>
            <div class="partnersLogo">
                <img src="./partner img/New York.png" alt="" class="Logo">
                <img src="./partner img/FS Logo.png" alt="" class="Logo">
                <img src="./partner img/PikPok.png" alt="" class="Logo">
                <img src="./partner img/Social Shop.png" alt="" class="Logo">
            </div>
            <div class="allrightReserved">
                <p>©2023 Starlight BSIT2D. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>