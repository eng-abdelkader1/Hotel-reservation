<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Hoppa Hotel | Reservation</title>
  <link rel="stylesheet" href="index.css" />
  <script src="https://kit.fontawesome.com/6ebb479a58.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <nav id="navbar">
      <div class="container">
        <h1 class="logo">
          <a href="index.html">HPT</a>
        </h1>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li>
            <a class="current" href="reservations.html">Reservations</a>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <section id="contact" class="py-3">
    <div class="container">
      <h1 class="heading"><span class="text-primary">Reservation</span></h1>
      <p>Please fill out the form below to register.</p>
      <form action="reservations.php" method="POST">
        <div class="form-group">
          <label for="b1">Name</label>
          <input type="text" id="b1" name="name" required />
        </div>
        <div class="form-group">
          <label for="b2">Lastname</label>
          <input type="text" id="b2" name="lastname" required />
        </div>
        <div class="form-group">
          <label for="b3">ID Number</label>
          <input type="text" id="b3" name="id" required />
        </div>
        <div class="form-group">
          <label for="numcredit">Number of Days</label>
          <input type="number" id="numcredit" name="days" min="1" required />
        </div>
        <div class="form-group">
          <label for="room">Type of Reservation</label>
          <select class="btn" id="room" name="room" required>
            <option value="a">None</option>
            <option value="b">Room for One Person</option>
            <option value="c">Room for Two Persons</option>
            <option value="d">Suite</option>
          </select>
        </div>
        <div class="form-group">
          <button type="button" onclick="calccost()" class="btn">Calculate The Cost</button>
          <input type="text" id="totalCost" name="totalCost" readonly />
        </div>
        <div class="form-group">
          <button type="button" onclick="printStatus()" class="btn">Status</button>
          <span id="s1"></span>
        </div>
        <div class="form-group">
          <button type="submit" class="btn">Submit</button>
        </div>
      </form>
    </div>
  </section>

  <script>
    function printStatus() {
      document.getElementById("s1").innerText = "Registered";
    }

    function calccost() {
      const basePrice = { b: 100, c: 170, d: 250 };
      const roomType = document.getElementById("room").value;
      const days = parseInt(document.getElementById("numcredit").value, 10) || 0;
      const total = days * (basePrice[roomType] || 0);
      document.getElementById("totalCost").value = total;
    }

    function Alert() {
      let name = document.getElementById("b1").value;
      let lname = document.getElementById("b2").value;
      let ID = document.getElementById("b3").value;
      window.alert(`Hello\n${name} ${lname}`);
    }
  </script>

  <footer id="foot">
    <p>Hotel HPT &copy; 2024, All Rights Reserved</p>
  </footer>

 <?php
 
  // Define connection parameters
  define("db_SERVER", "localhost");
  define("db_USER", "root");
  define("db_PASSWORD", "");
  define("db_DBNAME", "hotel");

  // Create connection
  $con = mysqli_connect(db_SERVER, db_USER, db_PASSWORD, db_DBNAME);

  if (!$con) {
      die("Connection failed: " . mysqli_connect_error()); // Connection failed
  } else {
      // Connection successful, log to console
      echo '<script>console.log("PHP: Database connection successful");</script>';
  }

  // Get POST data
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $lname = $_POST["lastname"];
      $ID = $_POST["id"];
      $roomType = $_POST["room"];
      $days = $_POST["days"];

      // Validate input
      if (empty($name) || empty($lname) || empty($ID) || empty($roomType) || empty($days)) {
          echo "All fields are required.";
      } else {
          // Create SQL query with embedded variables
          $sql = "INSERT INTO guest (name, lastname, ID, days, roomType) VALUES ('$name', '$lname', '$ID', '$days', '$roomType')";

          // Execute query and check for success
          if (mysqli_query($con, $sql)) {
            echo '<script>alert("New guest added successfully.");</script>';
          } else {
            echo '<script>alert("error database.");</script>';
              echo "Error: " . mysqli_error($con);
          }
      }
  }

  // Close connection
  mysqli_close($con);
  ?>
</body>
</html>