<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fcms";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Count the number of items
$sql = "SELECT COUNT(*) AS count FROM trainers";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

$sql = "SELECT AVG(salary) AS salary FROM trainers";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$avg = $row['salary'];

mysqli_close($conn);


?>



<!DOCTYPE html>
<html>

<head>
    <title>Real Madrid Trainers</title>
    <link rel="stylesheet" type="text/css" href="/Trainer/trainer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <div class="bg-image">


            <h3>"The Mastermind Behind the Glory: Real Madrid's Legendary Trainers and their Impact on the Club's Success"</h3>

            <p>The Architects of Athletic Excellence: A Comprehensive Analysis of Real Madrid's World-Class Training Team and their Role in Developing the Skills, Strategy, and Success of the World's Most Elite Football Club.</p>
            <a class="addButton" href="/Trainer/insert.php"><button type="button" class="btn btn-dark btn-lg">ADD TRAINER/STAFF</button></a>

        </div>

        <div class="container">



            <h1 class="title">Trainer List</h1>

            <div class="aggregate">
                <div class="totalTrainers">

                    <h3>Total number of trainers working in real madrid</h3>
                    <h2><?php echo $count; ?> </h2>


                </div>

                <div class="totalTrainers">

                    <h3>Average salary of the trainers</h3>
                    <h2><?php echo $avg; ?> </h2>


                </div>
            </div>


            <table>

                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>AGE</th>
                    <th>POSITION</th>
                    <th>JOIN DATE</th>
                    <th>RESIGN DATE</th>
                    <th>SALARY</th>
                    <th>ACTION</th>
                </tr>

                <?php

                $host = "localhost";
                $dbuser = "root";
                $dbpassword = "";
                $dbname = "fcms";



                $conn = new mysqli($host, $dbuser, $dbpassword, $dbname);

                // $conn = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // select data from table
                $sql = "SELECT *	
                FROM trainers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>";
                        echo "<td>" . $row["trainer_id"] . "</td>";
                        echo "<td>" . $row["trainer_name"] . "</td>";
                        echo "<td>" . $row["trainer_age"] . "</td>";
                        echo "<td>" . $row["trainer_position"] . "</td>";
                        echo "<td>" . $row["join_date"] . "</td>";
                        echo "<td>" . $row["end_date"] . "</td>";
                        echo "<td>" . $row["salary"] . "</td>";
                        echo "<td><a class='btn btn-primary' href='trainer_update.php?id=" . $row["trainer_id"] . "'>Update</a> <a class='btn btn-danger' href='trainer_delete.php?id=" . $row["trainer_id"] . "'>Delete</a></td>";

                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </table>

        </div>

        <section>



</body>

</html>