<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "Supervisor") || $_SESSION['role'] == "admin") {
    // echo $_SESSION['role'];
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
        <h1>New Roster</h1>

        <ul>
            <li><a href="supervisor.php">Home</a></li>
            <li><a class = 'on' href="new_roster.php">New Roster</a></li>
        </ul>

        <label>Date:</label>
        <input type="date">
        <br>

        <label>Supervisor:</label>
        <select name="supervisor" id="supervisor">
            <option value="supervisors">Supervisors</option>
        </select>
        <br>

        <label>Doctor:</label>
        <select name="doctor" id="doctor">
            <option value="doctors">Doctors</option>
        </select>
        <br>

        <label>Caregiver1:</label>
        <select name="caregiver1" id="caregiver1">
            <option value="caregiver1">Caregiver1</option>
        </select>
        <?php echo 'Group 1'?>
        <br>

        <label>Caregiver2:</label>
        <select name="caregiver2" id="caregiver2">
            <option value="caregiver2">Caregiver2</option>
        </select>
        <?php echo 'Group 2'?>
        <br>

        <label>Caregiver2:</label>
        <select name="caregiver3" id="caregiver3">
            <option value="caregiver3">Caregiver3</option>
        </select>
        <?php echo 'Group 3'?>
        <br>

        <label>Caregiver4:</label>
        <select name="caregiver4" id="caregiver4">
            <option value="caregiver4">Caregiver4</option>
        </select>
        <?php echo 'Group 4'?>
        <br>

        <button>OKAY</button>
        <button>CANCEL</button>

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