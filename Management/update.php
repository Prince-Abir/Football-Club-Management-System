<?php



$id = "";
$name = "";
$position = "";
$salary = "";
$age = "";

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

    $sql = "SELECT * FROM management WHERE management_id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /Management/management.php");
        exit;
    }

    $id = $row["management_id"];
    $name = $row["name"];
    $position = $row["position"];
    $salary = $row["salary"];
    $age = $row["age"];
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Define variables and set to empty values
    $id = $name = $position = $salary = $age = "";
    $idErr = $nameErr = $positionErr = $salaryErr = $ageErr = "";


    if (isset($_POST["button"])) {

        // Validate ID
        if (empty($_POST["id"])) {
            $idErr = "ID is required";
        } else {
            $id = $_POST["id"];
        }

        // Validate Name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = $_POST["name"];
        }

        // Validate Position
        if (empty($_POST["position"])) {
            $positionErr = "Position is required";
        } else {
            $position = $_POST["position"];
        }

        // Validate Salary
        if (empty($_POST["salary"])) {
            $salaryErr = "Salary is required";
        } else {
            $salary = $_POST["salary"];
        }

        // Validate Age
        if (empty($_POST["age"])) {
            $ageErr = "Age is required";
        } else {
            $age = $_POST["age"];
        }

        // If all input fields are valid, insert data into MySQL table
        if ($idErr == "" && $nameErr == "" && $positionErr == "" && $salaryErr == "" && $ageErr == "") {
            $sql = "UPDATE management SET name='$name', position='$position', salary='$salary', age='$age' WHERE management_id=$id";
            if ($conn->query($sql) === TRUE) {

                header("location: /Management/management.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "All the Fields are Required!";
        }
    }


    // Close MySQL connection
    $conn->close();
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Record</title>
    <link rel="stylesheet" type="text/css" href="/Management/management.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>Update Record</h1>

        <form method="POST">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Name" required value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" id="position" name="position" placeholder="Enter Position" required value="<?php echo $position; ?>">
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" id="salary" name="salary" placeholder="Enter Salary" required value="<?php echo $salary; ?>">
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" placeholder="Enter Age" required value="<?php echo $age; ?>">
            </div>


            <div class="form-group">
                <button type="submit" name="button">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>