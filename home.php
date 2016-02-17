<?php
//create "session" to store variables after page refresh
session_start();
?>

<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-2.1.4.min.js"> </script>
<script src="script.js"></script>




<div id="top">
    <a href="home.php">  <img src="http://www.logotv.com/sitewide/images/LOGO_logo.jpg" id="logo"></a>
    <div id="logo2"> PVC Sales Inc. </div>



    <div id="signin0">

    <div id='signin'>
        <form name='form2' method='post' id='form2'>
            <input type='text' name='username2' id='username2' placeholder='Username'>
            <input type='password' name='password3' id='password3' placeholder='Password'>
        </form>
    </div>
    <div id='signin2'> <button onclick='signin()' > Sign In! </button></div>

    </div>

    <a href="cart.php">
    <div id="logo3">

        <img src="http://www.toporange.com/images/Shopping-Cart.jpg" id="logo4">
       <div id="logo5"> Your Cart <?php
echo $_SESSION['varname'];
           ?> </div>
    </div>
    </a>
</div>

<div class="item">
    <img src="http://www.villages-news.com/wp-content/uploads/2015/12/img_large_18243.jpg" class="thumbnail">
    <div class="item1"> PVC pipe rod
        <br> <div class="item2"> White. 1ft length. 1.5in diameter.</div>
    </div>
    <div class="cost"> $2. </div>
    <a href='home.php?item1=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>

<div class="item">
    <img src="http://images.lowes.com/product/converted/611942/611942124633lg.jpg" class="thumbnail">
    <div class="item1"> PVC pipe elbow
        <br> <div class="item2"> White. Elbow connector 1.5in diameter. 90degree</div>
    </div>
    <div class="cost"> $3. </div>
    <a href='home.php?item2=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>

<div class="item">
    <img src="http://www.formufit.com/content/assets/prodimg/3_way_pvc_fitting_front_white.jpg" class="thumbnail">
    <div class="item1"> PVC pipe connector corner
        <br> <div class="item2"> White. 1.5in diameter. 3 way connector corner. 90degree</div>
    </div>
    <div class="cost"> $4. </div>
    <a href='home.php?item3=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>


<div class="item">
    <img src="http://www.globalspec.com/ImageRepository/LearnMore/20124/1WJW1_AS01d378070bed45471d8dcf671c6ec681d1.png" class="thumbnail">
    <div class="item1"> PVC pipe 3 to 1 connector
        <br> <div class="item2"> White. Connector. 3 to 1</div>
    </div>
    <div class="cost"> $5. </div>
    <a href='home.php?item4=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>

<div class="item">
    <img src="http://builtinvacuum.com/scaledgraphics/510_50.jpg" class="thumbnail">
    <div class="item1"> PVC pipe 2 to 1 connector
        <br> <div class="item2"> White. Connector. 2 to 1</div>
    </div>
    <div class="cost"> $4.5 </div>
    <a href='home.php?item5=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>

<div class="item">
    <img src="http://builtinvacuum.com/scaledgraphics/510_50.jpg" class="thumbnail">
    <div class="item1"> PVC pipe 2 to 1 connector
        <br> <div class="item2"> White. Connector. 2 to 1</div>
    </div>
    <div class="cost"> $999.13 </div>
    <a href='home.php?item6=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>




<?php
global $home;
$home = 'home';
require "functions.php";



session_destroy();
?>









