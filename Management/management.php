<!DOCTYPE html>
<html>

<head>
    <title>Real Madrid Management</title>
    <link rel="stylesheet" type="text/css" href="/Management/management.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <div class="bg-image">
            <!-- <img src="/images/management-officials.jpg" alt=""> -->

            <h3>"Behind the Success: The Strategic Brilliance of Real Madrid's Management Team"</h3>

            <p>"The Art of Management Excellence: A Comprehensive Analysis of Real Madrid's Visionary Management Team and their Impact on the Legacy of the World's Greatest Football Club"</p>
            <a class="addButton" href="/Management/insert.php"><button type="button" class="btn btn-primary btn-lg">ADD MANAGER</button></a>

        </div>

        <div class="container">
            <!-- <a href="create_management.php" class="button"  class="btn btn-primary btn-lg">Add New Record</a> -->


            <h1 class="title">Manager List</h1>
          
            <table>

                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>POSITION</th>
                    <th>SALARY</th>
                    <th>AGE</th>
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
                $sql = "SELECT management_id,name,position,salary,age	
                FROM management";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>";
                        echo "<td>" . $row["management_id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["position"] . "</td>";
                        echo "<td>" . $row["salary"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "<td><a class='btn btn-primary' href='update.php?id=" . $row["management_id"] . "'>Update</a> <a class='btn btn-danger' href='delete.php?id=" . $row["management_id"] . "'>Delete</a></td>";

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