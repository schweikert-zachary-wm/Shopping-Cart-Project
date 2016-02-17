<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-2.1.4.min.js"></script>
    <script src="script.js"> </script>

<!-- to write javascript in php
$message = "wrong answer";
echo "<script type='text/javascript'>alert('$message');</script>";
-->
<?php

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



$sql2 = "SELECT * FROM users";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<br> id_field: ". $row["id_field"]. ", " . "    AnotherThing: ". $row["AnotherThing"]. ", " . "One Last field:". $row["One Last field"] . "<br>";
    }
} else {
    echo "Not being used";
}




if ( ! empty($_POST['username'])){
    $name = ($_POST['username']);
    insertInfo();
}

function checkPass () {

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


$sql = "SELECT * FROM users";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $usrn = $row["Username"];
            $name = ($_POST['username2']);
            $pass = ($_POST['password3']);
            switch ($usrn) {
                case ($usrn == $name):
                    $pass2= $row["Password"];

                    global $used;
                    $used = "Your Username was accepted!";






                   if ($pass2 == $pass) {
                       echo "<script type='text/javascript'>alert('victory');</script>";
                       global $used3;
                       header('Location: home.php');
                       $used3 = "Your Password accepted.";
                   }
                    else {
                        global $used3;
                        $used3 = "<br> Your Password was denied.";
                    }


                    break;
                case ($usrn != $name):
                    global $used;
                    if ($used == "Your Username was accepted!") {





                    }
                    else {
                        $used = "Your Username is incorrect.";
                    }

                    break;
            }

        }

    // output data of each row

} else {
    echo "No results found in table.";
}
}


$conn->close();

function insertInfo () {
    echo "hi thar";
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

    $name = ($_POST['username']);
    $password = ($_POST['password']);
    $email = ($_POST['email']);
    $address = ($_POST['address']);


    $sql = "INSERT INTO users ( Email, Username, Password, Address ) VALUES ( " . $email . "," . $name . "," . $password . "," . $address . ")";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: home.php');
    } else {
        global $error;
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
$_POST['insert'] = null;
    global $insert;
    $insert = null;


}

$conn->close();


if ( ! empty($_POST['username2'])){
    $name = ($_POST['username2']);
    checkPass();
}
?>




<form name='form2' method='post' id="form2" class="navbar-form navbar-right">
    <input type='text' name="username2" id='username2' placeholder="Username" class="form-control">
    <input type='password' name='password3' id='password3' placeholder="Password" class="form-control">
</form>
<button onclick="signin()" > Sign In! </button>


<form name='form' method='post' id="form">
    <input type='text' name="username" id='username' placeholder="username"  >
    <input type='email' name="email" id='email' placeholder="email"  >
    <input type='password' name='password' id='password' placeholder="password"  >
    <input type='password' name='password2' id='password2' placeholder="password2"  >
    <input type="text" id="address" name="address" placeholder="address" >

</form>
<button onClick='signup()'>Sign Up!</button>
<div id='error'> <?php global $used; echo $used; ?><?php global $used3; echo $used3; global $error; echo $error; ?></div>







<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<div class="item">
    <img src="http://newtonsbuilding.com.au/wp-content/uploads/2013/06/pvc-tee.jpg" class="thumbnail">
    <div class="item1"> PVC pipe 4 way intersection
        <br> <div class="item2"> White. Connector. Intersection</div>
    </div>
    <div class="cost"> $5. </div>
    <a href='home.php?item6=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>

<div class="item">
    <img src="http://www.cepex.com/en/wp-content/files_mf/pvcfittings43.jpg" class="thumbnail">
    <div class="item1"> PVC pipe 90 degree corner
        <br> <div class="item2"> Gray. Connector. Corner. 90 degrees</div>
    </div>
    <div class="cost"> $2. </div>
    <a href='home.php?item7=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>

<div class="item">
    <img src="http://ecx.images-amazon.com/images/I/41oMQ6BNWhL._SY355_.jpg" class="thumbnail">
    <div class="item1"> PVC pipe 6inch diameter, 3 ft length
        <br> <div class="item2"> White. 3 ft length, 6 inch diameter, tube</div>
    </div>
    <div class="cost"> $2.5 </div>
    <a href='home.php?item8=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>

<div class="item">
    <img src="http://ecx.images-amazon.com/images/I/41fgvyxOtvL._AC_UL70_SR70,70_.jpg" class="thumbnail">
    <div class="item1"> PVC pipe 5inch diameter, 3 ft length
        <br> <div class="item2"> White. 3 ft length,  inch diameter, tube</div>
    </div>
    <div class="cost"> $2.5 </div>
    <a href='home.php?item9=true'><div class="cart"> <img src="http://www.toporange.com/images/Shopping-Cart.jpg" class="cartpic" > Add to Cart</div></a>
</div>







