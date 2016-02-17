<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-2.1.4.min.js"> </script>
<script src="script.js"></script>

<?php session_start(); ?>

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

<?php

runMyFunction2();
//check the amount of items in a cart
function runMyFunction2 () {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "mydb";


// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM cart WHERE Username='" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // if it find an item has already been made, up date it.


            $_SESSION['item'] = $row['Item'];
            //$_SESSION['item'] = 1;
            $_SESSION['amount'] = $row['Amount'];



            echo "<div class='item'>
     <div id='test" . $_SESSION['item'] . "' class='thumbnail'> </div>
    <div class='item1'> PVC pipe rod
            <br> <div class='item2'> White. 1ft length. 1.5in diameter.</div>
    </div>
    <div class='cost'> $2. </div>
    <div class='cart2'> x " . $_SESSION['amount'] . "</div>
</div>";


            //echo 'Number of item = ' . $_SESSION['item'] . ', ';
           // echo 'Amount of item = ' . $_SESSION['amount'] . '. ';


            //insertInfo2(); ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //runMyFunction();///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        }

    }
    else {
        // if Username & item have not been found, add them to table.
        echo "No results found in table.";}

}
global $home;
$home = 'cart';

?>

<a href="<?php global $home; echo $home; ?>.php?checkout=true"><div id="checkout"> Checkout </div> </a>

<?php

global $home;
$home = 'cart';
require "functions.php";




?>
