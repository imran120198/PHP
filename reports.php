<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <style>
        #form {
            height: 50px;
            display: flex;
            justify-content: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        #form>input {
            width: 50%;
            border-radius: 20px;
            font-size: 20px;
            padding-left: 20px;
        }

        #form>button {
            width: 100px;
            font-size: 20px;
            border-radius: 20px;
            margin-left: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php require("navbar.php") ?>

    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="name" placeholder="Enter Name">
        <button type="submit" name="submit">Search</button>
    </form>

    <?php
    // Database connection
    require("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['name'];

        $query = "SELECT admission.id, admission.name, admission.fathername, admission.mothername, 
        admission.mobile, admission.email, admission.address, 
        marks.maths, marks.science, marks.english, marks.urdu, marks.sst 
        FROM admission 
        INNER JOIN marks ON admission.id = marks.id WHERE name = '$search'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Output data in a table
            echo "<table border='1' style='width:85%; margin:auto; font-size:18px'>";
            echo "<tr><th>Name</th><th>Father Name</th><th>Mother Name</th><th>Mobile</th><th>Email</th><th>Address</th><th>Maths</th><th>Science</th><th>English</th><th>Urdu</th><th>Social Science</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['fathername'] . "</td>";
                echo "<td>" . $row['mothername'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['maths'] . "</td>";
                echo "<td>" . $row['science'] . "</td>";
                echo "<td>" . $row['english'] . "</td>";
                echo "<td>" . $row['urdu'] . "</td>";
                echo "<td>" . $row['sst'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<tr><td colspan='12'>No data found</td></tr>";
        }

        // Free result set
        mysqli_free_result($result);
    }

    // Close connection
    mysqli_close($conn);
    ?>
</body>

</html>