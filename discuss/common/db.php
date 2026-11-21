<?php
$host="localhost";
$username="root";
$password=null;
$database="discuss";



try {
    $conn=new mysqli($host,$username,$password,$database);

    // echo "Connected successfully<br>";

} catch (mysqli_sql_exception $e) {

    echo "Database Error: " . $e->getMessage();
}

// if($conn->connect_error){
//     die('not connected with DB'.$conn->connect_error);
// }
// echo "db connected";

?>