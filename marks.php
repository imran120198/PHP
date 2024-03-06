<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>
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

<body>
  <div>
    <?php require("navbar.php") ?>
    <h1 id="heading">Marks Details</h1>
    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <span>
        Maths :
        <input type="number" placeholder="Enter Maths Marks" name="maths" />
      </span>
      <span>
        Science :
        <input type="number" placeholder="Enter Science Marks" name="science" />
      </span>
      <span>
        English :
        <input type="number" placeholder="Enter English" name="english" />
      </span>
      <span>
        Urdu :
        <input type="number" placeholder="Enter Urdu Marks" name="urdu" />
      </span>
      <span>
        Social Science :
        <input type="number" placeholder="Enter Social Science Marks" name="sst" />
      </span>

      <button type="submit" name="submit_marks">
        Submit
      </button>
    </form>
  </div>
  </div>
</body>

</html>

<?php

require("connection.php");

$marks_table = "CREATE TABLE IF NOT EXISTS marks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    maths  INT(3) NOT NULL,
    science  INT(3) NOT NULL,
    english  INT(3) NOT NULL,
    urdu INT(3) NOT NULL,
    sst  INT(3) NOT NULL
)";

if (mysqli_query($conn, $marks_table) == false) {
  echo "" . mysqli_error($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["submit_marks"])) {
    $maths = $_POST['maths'];
    $science = $_POST['science'];
    $english = $_POST['english'];
    $urdu = $_POST['urdu'];
    $sst = $_POST['sst'];

    $insert_sql = "INSERT INTO marks (maths, science, english, urdu, sst) VALUES ('$maths','$science','$english','$urdu', '$sst')";

    if (mysqli_query($conn, $insert_sql) == false) {
      echo "Error" . mysqli_error($conn);
    } else {
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
    }
  }
}
?>