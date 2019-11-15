<?php
include_once 'db.php';

session_start();

if(isset($_GET['login'])) {
  $search = "SELECT Employee.Email, Employee.Password, Employee.Role, Patient.Email, Patient.Password, Patient.Role, FAMILY_MEMBER.Email, FAMILY_MEMBER.Password, FAMILY_MEMBER.Role FROM Employee, Patient, FAMILY_MEMBER;";
  $result = mysqli_query($conn, $search);
  while($row = mysqli_fetch_row($result)) {
    if ($row[0] == $_GET['email'] ?? '') {
      if ($row[1] == $_GET['psw'] ?? ''){
        $_SESSION['role'] = $row[2];
        switch ($_SESSION['role']) {
          case 'Doctor':
            $_SESSION['loggedIn'] = true;
            header( 'Location: doc_home.php');
            break;
          case 'Caregiver':
            $_SESSION['loggedIn'] == true;
            header( 'Location: caregiver.php');
            break;
          case 'Admin':
            $_SESSION['loggedIn'] == true;
            header( 'Location: admin.php');
            break;
          case 'Supervisor':
            $_SESSION['loggedIn'] == true;
            header( 'Location: supervisor.php');
            break;
          }
        }
      }
      if ($row[3] == $_GET['email'] ?? '') {
        if ($row[4] == $_GET['psw'] ?? ''){
          $_SESSION['loggedIn'] == true;
          $_SESSION['role'] = $row[5];
          header( 'Location: patient.php');
        }
      }
      if ($row[6] == $_GET['email'] ?? '') {
        if ($row[7] == $_GET['psw'] ?? ''){
          $_SESSION['loggedIn'] == true;
          $_SESSION['role'] = $row[8];
          header( 'Location: fam_member.php');
        }
      }
    }
  }
?>

<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <h1>Welcome to Old Farts and Darts</h1>

    <button class="open-button" onclick="openForm()" name="login" id="login" value="Login">Login</button>
    <a href="register.php" id="register" value="Register">Register </a>  

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

<?php
  if(isset($_GET['login'])) {
    echo "<p id = 'error'>Incorrect Username or Password</p>";
  }
?>

<script>

    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

</script>

<footer>
  <ul>
    <li>Phone: 717-555-5555</li>
    <br>
    <li>Email: oldfartsanddarts@fakemail.com</li>
    <br>
    <li>Fax: 171-123-4567</li>
    <br>
  </ul>
</footer>

</body>
</html>
