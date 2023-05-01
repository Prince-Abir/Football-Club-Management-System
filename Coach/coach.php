<!DOCTYPE html>
<html>

<head>
    <title>Real Madrid Coaches</title>
    <link rel="stylesheet" type="text/css" href="/Coach/coach.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <div class="bg-image">
          

            <h3>"The Mentor of Champions: Real Madrid's Legendary Coaches and their Impact on the Art of Football"</h3>

            <p>The Architects of Tactical Brilliance: A Comprehensive Analysis of Real Madrid's Iconic Coaching Team and their Contribution to Shaping the Club's Vision, Philosophy, and Dominance in the World of Football.</p>
            <a class="addButton" href="/Coach/coach_insert.php"><button type="button" class="btn btn-dark btn-lg">ADD COACH</button></a>

        </div>

        <div class="container">
         


            <h1 class="title">Coach List</h1>
          
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
                FROM coach";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>";
                        echo "<td>" . $row["coach_id"] . "</td>";
                        echo "<td>" . $row["coach_name"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "<td>" . $row["position"] . "</td>";
                        echo "<td>" . $row["join_date"] . "</td>";
                        echo "<td>" . $row["end_date"] . "</td>";
                        echo "<td>" . $row["salary"] . "</td>";
                        echo "<td><a class='btn btn-primary' href='coach_update.php?id=" . $row["coach_id"] . "'>Update</a> <a class='btn btn-danger' href='coach_delete.php?id=" . $row["coach_id"] . "'>Delete</a></td>";

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