<?php

$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "fcms";

$conn = new mysqli($host, $dbuser, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!isset($_GET["id"])) {
        header("location: /Coach/coach.php");
        exit;
    }

    $id = $_GET["id"];
    $sql = "DELETE FROM coach WHERE coach_id=$id";
    
    if ($conn->query($sql) === TRUE) {

        header("location: /Coach/coach.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>