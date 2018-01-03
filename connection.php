<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "social";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
//$sql = "CREATE DATABASE IF NOT EXISTS social";
//if ($conn->query($sql) === FALSE) {
//    echo "Error creating database: " . $conn->error;
//}
// sql to create table

//$sql = "CREATE TABLE PersonalDetail (
//id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//firstname VARCHAR(30) NOT NULL,
//lastname VARCHAR(30) NOT NULL,
//email VARCHAR(50) NOT NULL,
//reg_date TIMESTAMP,
//password VARCHAR(50)NOT NULL 
//)";
//
//if($conn->query($sql)===TRUE){
//    echo "Successfully created table";
//}
// else {
//     echo "failed";
//}

function SignIn(){
    session_start();
    if(!empty(filter_input(INPUT_POST, 'email'))){
        $sql = mysqli_query($conn,"SELECT * FROM PersonalDetail WHERE email = '$_POST[email]' AND password= '$_POST[pass]'");
        $row = mysqli_fetch_array($sql);
        if(!empty($row[email]) AND !empty($row[password])){
            $_SESSION['email'] = $row['password'];
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
        }
        else{
            echo "Sorry wrong user name and password";
        }
    }
} 
if(isset($_POST['submit']))
{
	SignIn();
}
//$conn ->close();
?>
