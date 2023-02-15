<?php
if (isset($_GET['serialno'])){

    echo '<form action="update.php" method="post">';
    echo '<br>';
    echo '<input type="hidden" name="serialno" value="'. $_GET['serialno'] .'">';

    $con = mysql_connect("localhost","root","");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("sys", $con);

    $id=$_GET['serialno'];
    $result = mysql_query("SELECT * FROM main WHERE serialno = '$id'");

    while($row = mysql_fetch_array($result)){
        echo'Date: '.'<input type="text" name="date" value="'. $row['date'] .'">'; 
        echo '<br>';
        echo'Work Description: '.'<input type="text" name="desc" value="'. $row['desc'].'">';
        echo '<br>';
        echo'Company Name: '.'<input type="text" name="comp" value="'. $row['comp'] .'">'; 
        echo '<br>';

        echo '<input name="save" type="submit" value="Save" />';
    }

    echo '</form>';
}
?>
<html>

<head>
    <script src=
        "https://code.jquery.com/jquery-3.2.1.min.js">
    </script>

    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        type="text/javascript">
    </script>
    
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
</head>

<body>
    <div class="container">
        <h1>GeeksForGeeks</h1>
        <form>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>User Id</label>
                    <input type='text' name="user_id"
                        id='user_id' class='form-control'
                        placeholder='Enter user id'
                        onkeyup="GetDetail(this.value)" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name"
                        id="first_name" class="form-control"
                        placeholder='First Name'
                        value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name"
                        id="last_name" class="form-control"
                        placeholder='Last Name'
                        value="">
                </div>
            </div>
        </div>
    </form>
    </div>
    <script>

        // onkeyup event will occur when the user
        // release the key and calls the function
        // assigned to this event
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("first_name").value = "";
                document.getElementById("last_name").value = "";
                return;
            }
            else {

                // Creates a new XMLHttpRequest object
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {

                    // Defines a function to be called when
                    // the readyState property changes
                    if (this.readyState == 4 &&
                            this.status == 200) {
                        
                        // Typical action to be performed
                        // when the document is ready
                        var myObj = JSON.parse(this.responseText);

                        // Returns the response data as a
                        // string and store this array in
                        // a variable assign the value
                        // received to first name input field
                        
                        document.getElementById
                            ("first_name").value = myObj[0];
                        
                        // Assign the value received to
                        // last name input field
                        document.getElementById(
                            "last_name").value = myObj[1];
                    }
                };

                // xhttp.open("GET", "filename", true);
                xmlhttp.open("GET", "gfg.php?user_id=" + str, true);
                
                // Sends the request to the server
                xmlhttp.send();
            }
        }
    </script>
</body>

</html>
<?php

// Get the user id
$user_id = $_GET['user_id'];

// Database connection
$con = mysqli_connect("localhost", "root", "", "gfg");

if ($user_id !== "") {
    
    // Get corresponding first name and
    // last name for that user id   
    $query = mysqli_query($con, "SELECT first_name,
    last_name FROM userdata WHERE user_id='$user_id'");

    $row = mysqli_fetch_array($query);

    // Get the first name
    $first_name = $row["first_name"];

    // Get the first name
    $last_name = $row["last_name"];
}

// Store it in a array
$result = array("$first_name", "$last_name");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
