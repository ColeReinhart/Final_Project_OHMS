<?php
include_once 'db.php';

session_start();

if(($_SESSION['loggedIn'] = true) && $_SESSION['role'] == "Admin") {
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
$add = $_GET['add'] ?? NULL;
if(isset($add)){
    $pat = $_GET['pat']?? NULL;
    $date = $_GET['date']?? NULL;
    $group = $_GET['group']?? NULL;
    $sql = "UPDATE Patient SET `Group` = '$group', Admission_Date = '$date' WHERE `Pat_ID` = '$pat'";
    mysqli_query($conn,$sql);
    // header("Location:admin.php");

}
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Admin Home</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Admin Home</h1>
        <ul>
            <li><a class="on" href="admin.php">Home</a></li>
            <li><a href="role.php">Roles</a></li>
            <li><a href="ad_emp.php">Employee</a></li>
            <li><a href="ad_pat.php">Patients</a></li>
            <li><a href="reg_app.php">Registration Approval</a></li>
            <li><a href="roster.php">Roster</a></li>
            <li><a href="ad_report.php">Admin's Report</a></li>
            <li><a href="payment.php">Payment</a></li>
            <li><a href='doc_appoint.php'>Doctor Appointments</a></li>
            <li><a href='new_roster.php'>New Roster</a></li>
        </ul>
        <h3>Additional Information</h3>
        <form action="admin.php">
        <label>Patient ID</label>
        <input name="pat"type="number" min = 1 value="<?php if(isset($pat)){echo $pat; } ?>">
        <input type="submit" name="pat_id" >
        </form>    
            <br>
        <form Method="GET" action="admin.php">
        <input name="pat"type="hidden" value="<?php if(isset($pat)){echo $pat; } ?>">
        <label>Group</label>
        <select name="group" class="input_space">
            <option> Choose Group </option>
            <option value="A"> A </option>
            <option value="B"> B </option>
            <option value="C"> C </option>
            <option value="D"> D </option>

        </select>  
    <br>
        <label>Admission Date</label>
        <input type="text" name="date" value="<?php echo(date("Y-m-d",time()));?>" readonly>  
    <br>
    <label>Patient name</label>
        <input type="text" name="name" value="<?php if(isset($var)){echo $var; }?>" readonly> 
        <input type="submit" name="add" >
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