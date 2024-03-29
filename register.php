<?php
include_once 'db.php';

echo "<a id = 'back' href = 'index.php'>⬅️</a>";

if(isset($_GET['submit'])){
    $role = $_GET['select']; 
    $fname = $_GET['Fname'];
    $lname = $_GET['Lname'];
    $email = $_GET['Email'];
    $phone = $_GET['Phone'];
    $password = $_GET['Password'];
    $birth = $_GET['Birth'];
    $relation = $_GET['Relation'];
    $contact = $_GET['Contact'];
    $code = $_GET['Code'];
if($role == "Patient" & $fname != "" & $lname != "" & $email != "" & $phone != ""
& $password != "" & $birth != "" & $relation != "" & $contact != "" & $code != ""){
    $sql = "INSERT INTO `Patient`(Fname, Lname, Phone, Email, Password, DoB, Family_Code, Emergency_Contact, Relation_to_Emergency_Contact, Role) VALUES ('$fname','$lname','$phone','$email','$password','$birth','$code','$contact','$relation','$role')";
    mysqli_query($conn,$sql);
    $sql_search = "SELECT Pat_ID FROM Patient WHERE Email = '$email'";
    $result_search = mysqli_query($conn,$sql_search);
    $row_id = mysqli_fetch_row($result_search);
    $sql_care = "INSERT INTO   `Caregiver` (Pat_ID, Morning_Med, Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner) Values ('$row_id[0]',0,0,0,0,0,0)";
    mysqli_query($conn,$sql_care);
    $sql_pay = "INSERT INTO   `Payment` (Pat_ID, Total_due) Values ('$row_id[0]', 0)";
    mysqli_query($conn,$sql_pay);

    header("Location:index.php");
}
elseif(($role == "Doctor" or $role == "Caregiver" or $role == "Supervisor" or $role == "Admin") & $fname != "" & $lname != "" & $email != "" & $phone != ""
& $password != "" & $birth != ""){
    $sql = "INSERT INTO `Employee`(Fname, Lname, Phone, Email, Password, DoB, Role) VALUES ('$fname','$lname','$phone','$email','$password','$birth','$role')";
    mysqli_query($conn,$sql);
    header("Location:index.php");
}
elseif($role == "Family Member" & $fname != "" & $lname != "" & $email != "" & $phone != ""
& $password != "" & $birth != "" & $code != ""){

    $sql = "INSERT INTO `FAMILY_MEMBER`(Fname, Lname, Phone, Email, Password, DoB, Role, Family_Code) VALUES ('$fname','$lname','$phone','$email','$password','$birth','$role','$code')";
    mysqli_query($conn,$sql);
    header("Location:index.php");
    
}

}
?>

<script>
    function isPatient(pat){
        if (pat.value == "Patient"){
        document.getElementById("patient").style.display = "block";
        document.getElementById("family").style.display = "block";

    }
        else if(pat.value == "Family Member"){ 
            document.getElementById("family").style.display = "block";
            document.getElementById("patient").style.display = "none";

        }

        else {
        document.getElementById("patient").style.display = "none";
        document.getElementById("family").style.display = "none";
    }
    }
    </script>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Register</title>
</head>
<body>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="icon" href="https://goingconcern-fe8.kxcdn.com/wp-content/uploads/2019/05/Hide-Your-Pain-Harold-1024x576.jpg">

    <h1>Welcome to Old Farts and Darts</h1>

    <h2>Register</h2>
    <form action="register.php" class = 'reg'>
    <div class="column">
    <?php 
    echo "<label for='Role'>Role</label>
    <select name='select' class='input_space' onchange='isPatient(this)'>";
    $sql = "SELECT Role FROM Role";
    $result = mysqli_query($conn, $sql);
    if($result) {
        while($row = mysqli_fetch_row($result)) {
            echo "<option value = '$row[0]'>$row[0]</option>";
        }
    }
    ?>
    </select>
        <br>
        <label for="Fname">First Name</label><input class="input_space" type="text" name="Fname"><br>
        <label for="Lname">Last Name</label><input class="input_space" type="text" name="Lname"><br>
        <label for="Email">Email</label><input class="input_space" type="email" name="Email"><br>
    </div>
        <div class=" column float_right input_space">

        <label for="Phone" class="input_space">Phone Format: ex: 000-0000</label><input class="input_space" type="tel" name="Phone" pattern="[[0-9]{3}-[0-9]{4}"><br>
        <label for="Password" class="input_space">Password</label><input class="input_space" type="password" name="Password"><br>
        <label for="Birth" class="input_space">Date Of Birth</label><input class="input_space" type="date" name="Birth"><br>
        <div id="family" style="display: none;">
        <label for="patient">Family Code (For Patient Family Member)</label> <input class = "input_space" type="text" id="family" class="family" name="Code" /><br />
        </div>
        <div id="patient" style="display: none;">

    <label for="Contact">Emergency Contact Phone Number Format: ex: 000-0000</label> <input type="text" id="patient" name="Contact" pattern="[[0-9]{3}-[0-9]{4}" /><br />
    <label for="Relation">Relation to Emergency Contact</label> <input type="text" id="patient" name="Relation" /><br />
        </div>

        <input id="button" type="submit" name="submit" value="Enter">

    </form>

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