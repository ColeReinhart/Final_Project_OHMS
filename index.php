<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "Final_OHMS";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

if(isset($_GET['login'])) {
  $search = "SELECT Employee.Email, Employee.Password, Employee.Role, Patient.Email, Patient.Password  FROM Employee, Patient;";
  $result = mysqli_query($conn, $search);
  while($row = mysqli_fetch_row($result)) {
    if ($row[0] == $_GET['email'] ?? '') {
      if ($row[1] == $_GET['psw'] ?? ''){
        switch ($row[2]) {
          case 'doctor':
            header( 'Location: doc_home.php');
            break;
          case 'caregiver':
            header( 'Location: caregiver.php');
            break;
          case 'family_member':
            header( 'Location: fam_member.php');
            break; 
          case 'admin':
            header( 'Location: admin.php');
            break;
          case 'supervisor':
            header( 'Location: supervisor.php');
            break;
          }
        }
      }
      if ($row[3] == $_GET['email'] ?? '') {
        if ($row[4] == $_GET['psw'] ?? ''){
            header( 'Location: patient.php');
        }
      }
    }
  }

    
  

?>

<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <h1>Welcome to Old Farts and Darts</h1>

    <button class="open-button" onclick="openForm()" name="login" id="login" value="Login">Login</button>
    <input type="submit" name="register" id="register" value="Register">

<div class="form-popup" id="myForm">
  <form action="" class="form-container">
    <h2>Login</h2>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn" name = "login">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>

    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

</script>

</body>
</html>
