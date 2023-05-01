
<?php


// Connect to MySQL database
$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "fcms";

$errorMessage = "";


$conn = new mysqli($host, $dbuser, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables and set to empty values
$id = $name = $position = $salary = $age = "";
$idErr = $nameErr = $positionErr = $salaryErr = $ageErr =  $joinErr = $endErr = "";

// Validate form data and process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        if (empty($_POST["join_date"])) {
            $joinErr = "Join Date is required";
        } else {
            $joinDate = $_POST["join_date"];
        }

        if (empty($_POST["end_date"])) {
            $endErr = "End Date is required";
        } else {
            $endDate = $_POST["end_date"];
            
        }

        // If all input fields are valid, insert data into MySQL table
        if ($idErr == "" && $nameErr == "" && $positionErr == "" && $salaryErr == "" && $ageErr == "" && $joinErr == "" && $endErr == "") {
            $sql = "INSERT INTO trainers (trainer_id,trainer_name,trainer_age,trainer_position,join_date,end_date,salary)
            VALUES ('$id', '$name', '$age', '$position', '$joinDate','$endDate','$salary')";

            try {
                // execute MySQL query
                if ($conn->query($sql) === TRUE) {

                    header("location: trainer.php");
                } else {

                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } catch (Exception $e) {
                if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                    $errorMessage = "Duplicate Data Cannot be Inserted!";
                } else {
                    // handle other errors
                }
            }
        } else {
            echo "All the Fields are Required!";
        }
    }
}

// Close MySQL connection
$conn->close();

?>


<!DOCTYPE html>
<html>

<head>
    <title>Add Trainer</title>
    <link rel="stylesheet" type="text/css" href="/Trainer/insert.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">


        <form method="POST">
            <p><?php echo $errorMessage; ?> </p>
            <h1>ADD TRAINER</h1>

            <div class="form-group">

                <input type="text" id="id" name="id" placeholder="Enter ID" required>
            </div>
            <div class="form-group">

                <input type="text" id="name" name="name" placeholder="Enter Name" required>
            </div>

            <div class="form-group">

                <input type="text" id="age" name="age" placeholder="Enter Age" required>
            </div>

            <div class="form-group">

                <input type="text" id="position" name="position" placeholder="Enter Position" required>
            </div>


            <div class="form-group">

                <input type="text" id="salary" name="salary" placeholder="Enter Salary" required>
            </div>

            <div class="form-group">

                <label for="join_date">JOIN DATE</label>
                <input type="date" id="join_date" name="join_date" placeholder="JOIN DATE" required>
            </div>

            <div class="form-group">

                <label for="end_date">END DATE</label>
                <input type="date" id="end_date" name="end_date" placeholder="END DATE" required>
            </div>



            <div class="form-group">
                <button type="submit" name="button">Submit</button>
            </div>

        </form>
    </div>
</body>

</html>