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
        header("location: /Management/management.php");
        exit;
    }

    $id = $_GET["id"];
    $sql = "DELETE FROM management WHERE management_id=$id";
    
    if ($conn->query($sql) === TRUE) {

        header("location: /Management/management.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>