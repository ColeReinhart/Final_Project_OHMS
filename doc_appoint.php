<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == 'Doctor') {
} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    unset($_SESSION['logout']);
    $_SESSION['role'] = NULL;
    header("location: index.php");
}
?>

<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Doctors' Appointments</h1>

        <ul>
            <li><a href="doc_home.php">Home</a></li>
            <li><a class = 'on' href="doc_appoint.php">Doctors' Appointments</a></li>
            <li><a href="pat_doc.php">Patients' of the Doctor</a></li>
        </ul>

        <form action="">
            <label>Patient ID</label>
            <input type="text">
            <br>

            <label>Date</label>
            <input type="date">
            <br>

            <select name="doctors" id="doctors" value="Doctors">
                <option value="stuff">Stuff</option>
            </select>
            <br>

            <label>Patient Name:</label>
            <?php echo 'Patient Name'?>
            <br>

            <button>OKAY</button>
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

