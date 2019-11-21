<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == 'Doctor') {
} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
}

if(isset($_GET['pat_id'])){
    
    $pat = $_GET['pat'];
    $sql = "SELECT * FROM `Patient` WHERE `Pat_ID` = '$pat'";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        while($row=mysqli_fetch_row($result)){
        $var = ($row[1]. " " . $row[2]);
    }
}
}

if(isset($_GET['submit'])){
    $Date = $_GET['Date']; 
    $Pat_ID = $_GET['Pat_ID'];
    $Doc_ID = $_GET['Doc_ID'];
if( $Date != "" & $Pat_ID != "" & $Doc_ID != ""){
    $sql = "INSERT INTO `Appointments`(Pat_ID, Doc_ID, Date) VALUES ('$Pat_ID','$Doc_ID','$Date')";
    mysqli_query($conn,$sql);
}
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Doctors Appointment</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Doctors' Appointments</h1>

        <ul>
            <li><a href="doc_home.php">Home</a></li>
            <li><a class = 'on' href="doc_appoint.php">Doctors' Appointments</a></li>
            <li><a href="roster.php">Roster</a></li>
        </ul>

        <form action="doc_appoint.php">
        <label>Patient ID</label>
        <input name="pat"type="number" value="<?php if(isset($pat)){echo $pat; } ?>">
        <input type="submit" name="pat_id" >
        </form>    
        <form action="doc_appoint.php">

            <label>Date</label>
            <input name="Date" type="date">
            <br>
            <label>Assign Doctor</label>
            <select name="Doc_ID" id="doctors" value="Doctors">
                <?php
                $sql = mysqli_query($conn, "SELECT Emp_ID, Fname, Lname FROM Employee WHERE Role = 'Doctor';");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value=" '.$row['Emp_ID'].' "> '.$row['Fname'].' </option>';     
                }
                ?>
            </select>
            <br>

            <label>Patient Name:</label>
            <input type="text" name="name" value="<?php if(isset($var)){echo $var; }?>" readonly> 
            <br>
            <input type="hidden" name="Pat_ID" type="number" value="<?php if(isset($pat)){echo $pat; } ?>">

            <input type="submit" name="submit">OKAY</input>
            <button>CANCEL</button>
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

