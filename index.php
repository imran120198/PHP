<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Details</title>
  <style>
    #heading {
      display: flex;
      justify-content: center;
    }

    #form {
      display: flex;
      justify-content: center;
      width: 40%;
      margin: auto;
      flex-direction: column;
    }

    #form>span {
      font-size: 20px;
      text-align: right;
    }

    #form>span>input {
      height: 40px;
      width: 70%;
      font-size: 20px;
      margin-bottom: 20px;
      padding-left: 10px;
    }

    #form>button {
      height: 40px;
      font-size: 20px;
      cursor: pointer;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <?php require("navbar.php") ?>
  <div>
    <h1 id="heading">Student Details</h1>
    <div>
      <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <span>
          Full Name :
          <input type="text" placeholder="Enter Name" name="name" />
        </span>
        <span>
          Father's Name :
          <input type="text" placeholder="Enter Father Name" name="fathername" />
        </span>
        <span>
          Mother's Name :
          <input type="text" placeholder="Enter Mother Name" name="mothername" />
        </span>
        <span>
          Mobile :
          <input type="number" placeholder="Enter Mobile Number" name="mobile" />
        </span>
        <span>
          Email :
          <input type="email" placeholder="Enter Email" name="email" />
        </span>
        <span>
          Address :
          <input type="text" placeholder="Enter Address" name="address" />
        </span>

        <button type="submit" name="submit_addmision">
          Submit
        </button>
      </form>
    </div>
  </div>

</body>

</html>

<?php

require("connection.php");



$admission_table = "CREATE TABLE IF NOT EXISTS admission (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    fathername VARCHAR(100) NOT NULL,
    mothername VARCHAR(100) NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $admission_table) == false) {
  echo "" . mysqli_error($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["submit_addmision"])) {
    $name = $_POST['name'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $insert_sql = "INSERT INTO admission (name,fathername,mothername,mobile, email,address) VALUES ('$name','$fathername','$mothername','$mobile', '$email', '$address')";

  }

  if (mysqli_query($conn, $insert_sql) == false) {
    echo "Error" . mysqli_error($conn);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }
}

?>