<script type='text/javascript'>
    function reslogin () {
        document.getElementById('signin0').innerHTML = "<div id='signin'><form name='form2' method='post' id='form2'><input type='text' name='username2' id='username2' placeholder='Username'><input type='password' name='password3' id='password3' placeholder='Password'></form></div><div id='signin2'> <button onclick='signin()' > Sign In! </button></div>"
    }
    var2 = "<a href='<?php global $home; echo $home; ?>.php?user=true'> Logout </a>"

</script>
<?php








//To show all error messages remove the next line
error_reporting(0);


if (isset($_GET['checkout']) && $_SESSION['username'] != null) {

checkout();
}
function checkout () {

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


    $sql = "DELETE FROM cart WHERE Username='" . $_SESSION['username'] . "'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";

        runMyFunction();
        header('Location: home.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}




global $home;

if ( $_SESSION['username'] != null) {
    if (isset($_GET['item1'])) {
        $_SESSION['checkout'] = 1;
        check();
    }
    if (isset($_GET['item2'])){
        $_SESSION['checkout'] = 2;
        check();
    }
    if (isset($_GET['item3'])){
        $_SESSION['checkout'] = 3;
        check();
    }
    if (isset($_GET['item4'])) {
        $_SESSION['checkout'] = 4;
        check();
    }
    if (isset($_GET['item5'])){
        $_SESSION['checkout'] = 5;
        check();
    }
    if (isset($_GET['item6'])){
        $_SESSION['checkout'] = 6;
        check();
    }
    if (isset($_GET['item7'])) {
        $_SESSION['checkout'] = 7;
        check();
    }
    if (isset($_GET['item8'])){
        $_SESSION['checkout'] = 8;
        check();
    }
    if (isset($_GET['item9'])){
        $_SESSION['checkout'] = 9;
        check();
    }

}


if (isset($_GET['do']) && $_SESSION['username'] == null) {
    header('Location: ' . $home . '.php');
}

if (isset($_GET['user'])) {
    echo "Logged out";
    global $name;
    global $pass;
    $_POST['username2'] = 0;
    $_POST['password3'] = 0;
    $_SESSION['username'] = null;
    $_SESSION['varname'] = 0;
    header('Location: ' . $home . '.php');

}




if ( ! empty($_POST['username2'])){
    $name = ($_POST['username2']);
    checkPass();
}
if (empty($_POST['username2'])){
    echo "<script type='text/javascript'>
reslogin();
 </script>";
}

if ( $_SESSION['username'] != null) {

    global $name;
    $name = $_SESSION['username'];

    echo "<script type='text/javascript'>
document.getElementById('signin0').innerHTML = 'You are logged in as ' +  $name + '<br>' +  var2;
 </script>";
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
                        global $used3;
                        $used3 = "Your Password accepted.";
                        global $name;
                        $_SESSION['username'] = $name;
                        echo "<script type='text/javascript'>
document.getElementById('signin0').innerHTML = 'You are logged in as ' +  $name ;
 </script>";

                        runMyFunction();

                        //header('Location: ' . $home . '.php');

                    }
                    else {global $used3;$used3 = "<br> Your Password was denied.";}
                    break;
                case ($usrn != $name):
                    global $used;
                    if ($used == "Your Username was accepted!") {}
                    else {$used = "Your Username is incorrect.";}
                    break;

            }

        }
    }
    else {
       // echo "No results found in table.";
    }
}
$conn->close();







function insertInfo2 () {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "mydb";


    //$_SESSION['checkout2']++;


// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "UPDATE cart SET Amount='" . $_SESSION['checkout2'] . "' WHERE Username='" . $_SESSION['username'] . "' AND Item='" . $_SESSION['checkout'] . "'";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        //global $home;
        //header('Location: ' . $home . '.php');
    } else {
        //global $error;
        //$error = "Error: " . $sql . "<br>" . $conn->error;
    }



}



function check () {

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


    $sql = "SELECT * FROM cart WHERE Username='" . $_SESSION['username'] . "' AND Item='" . $_SESSION['checkout'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            // if it find an item has already been made, up date it.

            $_SESSION['checkout2'] = $row['Amount'];
            $_SESSION['checkout2']++;
            //echo $_SESSION['checkout2'];

            insertInfo2();
            runMyFunction();

        }
    }
    else {
        // if Username & item have not been found, add them to table.
        insertInfo();
        //echo "No results found in table.";
        global $home;

    }
    header('Location: home.php');
}


function insertInfo () {
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

    $sql = "INSERT INTO cart ( Username, Item, Amount ) VALUES (" . $_SESSION['username'] . "," . $_SESSION['checkout'] . ", 1 )";

    if ($conn->query($sql) === TRUE) {
        global $home;
        //echo "New record created successfully2";
       // header('Location: ' . $home . '.php');
    } else {
        global $error;
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }

    $_POST['insert'] = null;
    global $insert;
    $insert = null;

    runMyFunction();
}




//check the amount of items in a cart
function runMyFunction () {
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
            //echo "Amount = " . $row['Amount'] . ",";


            $_SESSION['checkout2'] = $row['Amount'];
            // echo $_SESSION['checkout2'];

            $_SESSION['foof'] = $_SESSION['foof'] + $_SESSION['checkout2'];
            //echo "foof = " . $_SESSION['foof'] . ",";


            //insertInfo2();
            //runMyFunction();

        }
        $_SESSION['varname'] = $_SESSION['foof'];
        $_SESSION['foof'] = 0;
    }
    else {
        $_SESSION['varname'] = 0;
    }
    global $home;
    //header('Location: ' . $home . '.php');
}


$conn->close();
//session_destroy();
 ?>