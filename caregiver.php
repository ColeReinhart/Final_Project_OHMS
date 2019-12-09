<?php

include_once 'db.php';

session_start();
$id = $_SESSION['empID'];
if(($_SESSION['loggedIn'] = true) && ($_SESSION['role'] == "Caregiver") || $_SESSION['role'] == "Admin") {

} else {
    header("location: index.php");
}

if(isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
}


if(isset($_GET['morning'])) {
    $_SESSION['morning'] = $_GET["morning"];
}

$_SESSION['now'] = date("Y-m-d",time());
$Date_now = $_SESSION['now'];
if(isset($_SESSION['morning'])){
    if ($_SESSION['now'] == $_SESSION['date']) {
        $yup = "SELECT Morning_Med FROM Caregiver WHERE `Pat_ID` = {$_SESSION['morning']} AND Date = '$Date_now';";
        $result = mysqli_query($conn, $yup);
        if($result) {
            $row = mysqli_fetch_row($result);
            if ($row[0] == 0) {
                $sql_morning = "UPDATE `Caregiver` SET `Morning_Med` = 1 WHERE `Pat_ID` = {$_SESSION['morning']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_morning);
                unset($_SESSION['morning']);
            } else {
                $sql_morning = "UPDATE `Caregiver` SET `Morning_Med` = 0 WHERE `Pat_ID` = {$_SESSION['morning']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_morning);
                unset($_SESSION['morning']);
            }
        }
    }
}

if(isset($_GET['afternoon'])) {
    $_SESSION['afternoon'] = $_GET["afternoon"];
}

if(isset($_SESSION['afternoon'])) {
    if ($_SESSION['now'] == $_SESSION['date']) {
        $yup2 = "SELECT Afternoon_Med FROM Caregiver WHERE `Pat_ID` = {$_SESSION['afternoon']} AND Date = '$Date_now';";
        $result2 = mysqli_query($conn, $yup2);
        if($result2) {
            $row2 = mysqli_fetch_row($result2);
            if ($row2[0] == 0) {
                $sql_afternoon = "UPDATE `Caregiver` SET `Afternoon_Med` = 1 WHERE `Pat_ID` = {$_SESSION['afternoon']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_afternoon);
                unset($_SESSION['afternoon']);
            } else {
                $sql_afternoon = "UPDATE `Caregiver` SET `Afternoon_Med` = 0 WHERE `Pat_ID` = {$_SESSION['afternoon']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_afternoon);
                unset($_SESSION['afternoon']);
            }
        }
    }
}

if(isset($_GET['night'])) {
    $_SESSION['night'] = $_GET["night"];
}

if(isset($_SESSION['night'])){
    if ($_SESSION['now'] == $_SESSION['date']) {
        $yup3 = "SELECT Night_Med FROM Caregiver WHERE `Pat_ID` = {$_SESSION['night']} AND Date = '$Date_now';";
        $result3 = mysqli_query($conn, $yup3);
        if($result3) {
            $row3 = mysqli_fetch_row($result3);
            if ($row3[0] == 0) {
                $sql_night = "UPDATE `Caregiver` SET `Night_Med` = 1 WHERE `Pat_ID` = {$_SESSION['night']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_night);
                unset($_SESSION['night']);
            } else {
                $sql_night = "UPDATE `Caregiver` SET `Night_Med` = 0 WHERE `Pat_ID` = {$_SESSION['night']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_night);
                unset($_SESSION['night']);
            }
        }
    }
}

if(isset($_GET['breakfast'])) {
    $_SESSION['breakfast'] = $_GET["breakfast"];
}

if(isset($_SESSION['breakfast'])){
    if ($_SESSION['now'] == $_SESSION['date']) {
        $yup4 = "SELECT Breakfast FROM Caregiver WHERE `Pat_ID` = {$_SESSION['breakfast']};";
        $result4 = mysqli_query($conn, $yup4);
        if($result4) {
            $row4 = mysqli_fetch_row($result4);
            if ($row4[0] == 0) {
                $sql_breakfast = "UPDATE `Caregiver` SET `Breakfast` = 1 WHERE `Pat_ID` = {$_SESSION['breakfast']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_breakfast);
                unset($_SESSION['breakfast']);
            } else {
                $sql_breakfast = "UPDATE `Caregiver` SET `Breakfast` = 0 WHERE `Pat_ID` = {$_SESSION['breakfast']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_breakfast);
                unset($_SESSION['breakfast']);
            }
        }
    }
}

if(isset($_GET['lunch'])) {
    $_SESSION['lunch'] = $_GET["lunch"];
}

if(isset($_SESSION['lunch'])){
    if ($_SESSION['now'] == $_SESSION['date']) {
        $yup5 = "SELECT Lunch FROM Caregiver WHERE `Pat_ID` = {$_SESSION['lunch']} AND Date = '$Date_now';";
        $result5 = mysqli_query($conn, $yup5);
        if($result5) {
            $row5 = mysqli_fetch_row($result5);
            if ($row5[0] == 0) {
                $sql_lunch = "UPDATE `Caregiver` SET `Lunch` = 1 WHERE `Pat_ID` = {$_SESSION['lunch']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_lunch);
                unset($_SESSION['lunch']);
            } else {
                $sql_lunch = "UPDATE `Caregiver` SET `Lunch` = 0 WHERE `Pat_ID` = {$_SESSION['lunch']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_lunch);
                unset($_SESSION['lunch']);
            }
        }
    }
}

if(isset($_GET['dinner'])) {
    $_SESSION['dinner'] = $_GET["dinner"];
}

if(isset($_SESSION['dinner'])){
    if ($_SESSION['now'] == $_SESSION['date']) {
        $yup6 = "SELECT Dinner FROM Caregiver WHERE `Pat_ID` = {$_SESSION['dinner']} AND Date = '$Date_now'";
        $result6 = mysqli_query($conn, $yup6);
        if($result6) {
            $row6 = mysqli_fetch_row($result6);
            if ($row6[0] == 0) {
                $sql_dinner = "UPDATE `Caregiver` SET `Dinner` = 1 WHERE `Pat_ID` = {$_SESSION['dinner']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_dinner);
                unset($_SESSION['dinner']);
            } else {
                $sql_dinner = "UPDATE `Caregiver` SET `Dinner` = 0 WHERE `Pat_ID` = {$_SESSION['dinner']} AND Date = '$Date_now'";
                mysqli_query($conn, $sql_dinner);
                unset($_SESSION['dinner']);
            }
        }
    }
}


if(isset($_GET['Date'])) {
    $_SESSION['date'] = $_GET["Date"];
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="https://goingconcern-fe8.kxcdn.com/wp-content/uploads/2019/05/Hide-Your-Pain-Harold-1024x576.jpg">

    <title>Caregiver Home</title>
</head>
    <body>
        <form action="" class = "logout">
            <button type="submit" class="btn" name = "logout">Logout</button>
        </form>
        <h1>Caregiver Home</h1>

        <ul>
            <li><a class = 'on' href="caregiver.php">Home</a></li>
            <li><a href="roster.php">Roster</a></li>
        </ul>

        <br>
        <form>
        <label>Date:</label>
        <?php
            $time = date("Y-m-d",time());

        echo"<input name='Date' type='date' value='$time' >";
        ?>
        <input name="sub_date" type="submit" value = "Submit">
</form>
<form>
        <table>
            <tr>
                <th>Name</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
            </tr>
            <tr>
                <?php
                
                // Add reset day button
            if(isset($_SESSION['date'])){
                echo "<h3>{$_SESSION['date']}</h3>";
                $Date = $_SESSION['date'] ?? date("Y-m-d",time());
                $sequel1 = "SELECT Group1_id FROM Roster WHERE Roster.Schedule_Date = '$Date'";
                $result1 = mysqli_query($conn, $sequel1);
                $row1 = mysqli_fetch_row($result1);
                $sequel2 = "SELECT Group2_id FROM Roster WHERE Roster.Schedule_Date = '$Date'";
                $result2 = mysqli_query($conn, $sequel2);
                $row2 = mysqli_fetch_row($result2);
                $sequel3 = "SELECT Group3_id FROM Roster WHERE Roster.Schedule_Date = '$Date'";
                $result3 = mysqli_query($conn, $sequel3);
                $row3 = mysqli_fetch_row($result3);
                $sequel4 = "SELECT Group4_id FROM Roster WHERE Roster.Schedule_Date = '$Date'";
                $result4 = mysqli_query($conn, $sequel4);
                $row4 = mysqli_fetch_row($result4);
                            if($row1[0] == (" $id ") ){
                            $sql1 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, `Group`, Patient.Pat_ID FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE `Group` = 'A' AND `Date` = '$Date' ";
                $res_1 = mysqli_query($conn, $sql1);
                if($res_1) {
                    while($row1 = mysqli_fetch_row($res_1)) {
                        if($row1[2] == 1){
                            $r1 = "✔";
                        }
                        else{
                            $r1 = "✘";
                        }
                        if($row1[3] == 1){
                            $r2 = "✔";
                        }
                        else{
                            $r2 = "✘";
                        }
                        if($row1[4] == 1){
                            $r3 = "✔";
                        }
                        else{
                            $r3 = "✘";
                        }
                        if($row1[5] == 1){
                            $r4 = "✔";
                        }
                        else{
                            $r4 = "✘";
                        }
                        if($row1[6] == 1){
                            $r5 = "✔";
                        }
                        else{
                            $r5 = "✘";
                        }
                        if($row1[7] == 1){
                            $r6 = "✔";
                        }
                        else{
                            $r6 = "✘";
                        }
                        echo"<td>$row1[0] $row1[1]</td>
                        <td><form><input value='$row1[9]' name='morning' type='submit'>$r1</form></td>
                        <td><form><input value='$row1[9]' name='afternoon'type='submit'>$r2</form></td>
                        <td><form><input value='$row1[9]' name='night'type='submit'>$r3</form></td>
                        <td><form><input value='$row1[9]' name='breakfast'type='submit'>$r4</form></td>
                        <td><form><input value='$row1[9]' name='lunch'type='submit'>$r5</form></td>
                        <td><form><input value='$row1[9]' name='dinner'type='submit'>$r6</form></td>
                        </tr>
                        ";
                    }
                }
            }

            if($row2[0] == (" $id ") ){


                $sql2 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, `Group`,Patient.Pat_ID FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE `Group` = 'B' AND `Date` ='$Date'";
            $res_2 = mysqli_query($conn, $sql2);
            if($res_2) {

                while($row2 = mysqli_fetch_row($res_2)) {
                    if($row2[2] == 1){
                        $r1 = "✔";
                    }
                    else{
                        $r1 = "✘";
                    }
                    if($row2[3] == 1){
                        $r2 = "✔";
                    }
                    else{
                        $r2 = "✘";
                    }
                    if($row2[4] == 1){
                        $r3 = "✔";
                    }
                    else{
                        $r3 = "✘";
                    }
                    if($row2[5] == 1){
                        $r4 = "✔";
                    }
                    else{
                        $r4 = "✘";
                    }
                    if($row2[6] == 1){
                        $r5 = "✔";
                    }
                    else{
                        $r5 = "✘";
                    }
                    if($row2[7] == 1){
                        $r6 = "✔";
                    }
                    else{
                        $r6 = "✘";
                    }
                    echo"<td>$row2[0] $row2[1]</td>
                    <td><form><input value='$row2[9]' name='morning' type='submit'>$r1</form></td>
                    <td><form><input value='$row2[9]' name='afternoon'type='submit'>$r2</form></td>
                    <td><form><input value='$row2[9]' name='night'type='submit'>$r3</form></td>
                    <td><form><input value='$row2[9]' name='breakfast'type='submit'>$r4</form></td>
                    <td><form><input value='$row2[9]' name='lunch'type='submit'>$r5</form></td>
                    <td><form><input value='$row2[9]' name='dinner'type='submit'>$r6</form></td>
                    </tr>
                    ";
                }}
            }
            elseif($row3[0] == (" $id ") ){

                $sql3 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, `Group`,Patient.Pat_ID FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE `Group` = 'C' AND `Date` = '$Date' ";
            $res_3 = mysqli_query($conn, $sql3);

            if($res_3) {

                while($row3 = mysqli_fetch_row($res_3)) {
                    if($row3[2] == 1){
                        $r1 = "✔";
                    }
                    else{
                        $r1 = "✘";
                    }
                    if($row3[3] == 1){
                        $r2 = "✔";
                    }
                    else{
                        $r2 = "✘";
                    }
                    if($row3[4] == 1){
                        $r3 = "✔";
                    }
                    else{
                        $r3 = "✘";
                    }
                    if($row3[5] == 1){
                        $r4 = "✔";
                    }
                    else{
                        $r4 = "✘";
                    }
                    if($row3[6] == 1){
                        $r5 = "✔";
                    }
                    else{
                        $r5 = "✘";
                    }
                    if($row3[7] == 1){
                        $r6 = "✔";
                    }
                    else{
                        $r6 = "✘";
                    }
                    echo"<td>$row3[0] $row3[1]</td>
                    <td><form><input value='$row3[9]' name='morning' type='submit'>$r1</form></td>
                    <td><form><input value='$row3[9]' name='afternoon'type='submit'>$r2</form></td>
                    <td><form><input value='$row3[9]' name='night'type='submit'>$r3</form></td>
                    <td><form><input value='$row3[9]' name='breakfast'type='submit'>$r4</form></td>
                    <td><form><input value='$row3[9]' name='lunch'type='submit'>$r5</form></td>
                    <td><form><input value='$row3[9]' name='dinner'type='submit'>$r6</form></td>
                    </tr>
                    ";
                }}
            }
            elseif($row4[0] == (" $id ") ){

                $sql4 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, `Group`,Patient.Pat_ID FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE `Group` = 'D' AND `Date` = '$Date' ";
            $res_4 = mysqli_query($conn, $sql4);

            if($res_4) {

                while($row4 = mysqli_fetch_row($res_4)) {
                    if($row4[2] == 1){
                        $r1 = "✔";
                    }
                    else{
                        $r1 = "✘";
                    }
                    if($row4[3] == 1){
                        $r2 = "✔";
                    }
                    else{
                        $r2 = "✘";
                    }
                    if($row4[4] == 1){
                        $r3 = "✔";
                    }
                    else{
                        $r3 = "✘";
                    }
                    if($row4[5] == 1){
                        $r4 = "✔";
                    }
                    else{
                        $r4 = "✘";
                    }
                    if($row4[6] == 1){
                        $r5 = "✔";
                    }
                    else{
                        $r5 = "✘";
                    }
                    if($row4[7] == 1){
                        $r6 = "✔";
                    }
                    else{
                        $r6 = "✘";
                    }
                    echo"<td>$row4[0] $row4[1]</td>
                    <td><form><input value='$row4[9]' name='morning' type='submit'>$r1</form></td>
                    <td><form><input value='$row4[9]' name='afternoon'type='submit'>$r2</form></td>
                    <td><form><input value='$row4[9]' name='night'type='submit'>$r3</form></td>
                    <td><form><input value='$row4[9]' name='breakfast'type='submit'>$r4</form></td>
                    <td><form><input value='$row4[9]' name='lunch'type='submit'>$r5</form></td>
                    <td><form><input value='$row4[9]' name='dinner'type='submit'>$r6</form></td>
                    </tr>
                    ";
                }}
            }
            }
                ?>
            </tr>
        </table>
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


