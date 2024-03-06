<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    body {
      margin: 0%;
      padding: 0%;
    }

    #navbar_container {
      height: 100px;
      display: flex;
      justify-content: space-between;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      background-color: #dadada;
    }

    #logo {
      height: 70px;
      margin-top: 20px;
      margin-left: 50px;
    }

    #heading {
      font-size: 40px;
      font-weight: bold;
      font-style: italic;
      margin-top: 20px;
    }

    #reports {
      font-size: 25px;
      margin: 30px 50px 0px 0px;
    }

    #reports>a {
      text-decoration: none;
      color: black;
      margin-left: 10px;
    }
  </style>
</head>

<body>
  <div id="navbar_container">
    <div>
      <a href="index.php">
        <img id="logo" src="https://portal.tngqatar.com/images/CompeletLogo.png" />
      </a>

    </div>
    <div>
      <p id="heading">The Next Generation School</p>
    </div>
    <div id="reports">
      <a href="index.php">Admission Form</a>
      <a href="marks.php">Marks</a>
      <a href="reports.php">Reports</a>
    </div>
  </div>
</body>

</html>