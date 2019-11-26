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

if(isset($_GET['morning'])){
    $Pat_id = $row1[9];
    echo $Pat_id;
    $sql_morning = "UPDATE `Caregiver` SET `Morning_Med` = 1 WHERE `Pat_ID` = $Pat_id";
    mysqli_query($conn, $sql_morning);
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet" type="text/css">

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

        <label>List of Patient Duties:</label>
        <?php echo 'All the Duties Go Here'?> 
        <br>
        <form>
        <label>Date:</label>
        <?php
            $time = date("Y-m-d",time());

        echo"<input name='Date' type='date' value='$time'>";
        ?>
        <input name="sub_date" type="submit">
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
            if(isset($_GET["sub_date"])){
            $Date = $_GET['Date'] ?? date("Y-m-d",time());
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
                $sql1 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, `Group`, Patient.Pat_ID FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE `Group` = 'A' ";
            $res_1 = mysqli_query($conn, $sql1);
            if($res_1) {
                while($row1 = mysqli_fetch_row($res_1)) {
                    if($row1[2] == 1){
                        $r1 = "Completed";
                    }
                    else{
                        $r1 = "Not Completed";
                    }
                    if($row1[3] == 1){
                        $r2 = "Completed";
                    }
                    else{
                        $r2 = "Not Completed";
                    }
                    if($row1[4] == 1){
                        $r3 = "Completed";
                    }
                    else{
                        $r3 = "Not Completed";
                    }
                    if($row1[5] == 1){
                        $r4 = "Completed";
                    }
                    else{
                        $r4 = "Not Completed";
                    }
                    if($row1[6] == 1){
                        $r5 = "Completed";
                    }
                    else{
                        $r5 = "Not Completed";
                    }
                    if($row1[7] == 1){
                        $r6 = "Completed";
                    }
                    else{
                        $r6 = "Not Completed";
                    }
                echo"<td>$row1[0] $row1[1]</td>
                <td><form><input value='' name='morning' type='submit'>$r1</form></td>
                <td><form><input value='' name='afternoon'type='submit'>$r2</form></td>
                <td><form><input value='' name='night'type='submit'>$r3</form></td>
                <td><form><input value='' name='breakfast'type='submit'>$r4</form></td>
                <td><form><input value='' name='lunch'type='submit'>$r5</form></td>
                <td><form><input value='' name='dinner'type='submit'>$r6</form></td>
                ";

                }}

            }

            if($row2[0] == (" $id ") ){

                $sql2 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, `Group` FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE `Group` = 'B' ";
            $res_2 = mysqli_query($conn, $sql2);
            if($res_2) {

                while($row2 = mysqli_fetch_row($res_2)) {
                    if($row1[2] == 1){
                        $r1 = "Completed";
                    }
                    else{
                        $r1 = "Not Completed";
                    }
                    if($row1[3] == 1){
                        $r2 = "Completed";
                    }
                    else{
                        $r2 = "Not Completed";
                    }
                    if($row1[4] == 1){
                        $r3 = "Completed";
                    }
                    else{
                        $r3 = "Not Completed";
                    }
                    if($row1[5] == 1){
                        $r4 = "Completed";
                    }
                    else{
                        $r4 = "Not Completed";
                    }
                    if($row1[6] == 1){
                        $r5 = "Completed";
                    }
                    else{
                        $r5 = "Not Completed";
                    }
                    if($row1[7] == 1){
                        $r6 = "Completed";
                    }
                    else{
                        $r6 = "Not Completed";
                    }
                echo"<td>$row1[0] $row1[1]</td>
                <td><input type='checkbox'>$r1</td>
                <td><input type='checkbox'>$r2</td>
                <td><input type='checkbox'>$r3</td>
                <td><input type='checkbox'>$r4</td>
                <td><input type='checkbox'>$r5</td>
                <td><input type='checkbox'>$r6</td>
                ";
                }}
            }
            elseif($row3[0] == (" $id ") ){

                $sql3 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, `Group` FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE `Group` = 'C' ";
            $res_3 = mysqli_query($conn, $sql3);

            if($res_3) {

                while($row3 = mysqli_fetch_row($res_3)) {
                    if($row3[2] == 1){
                        $r1 = "Completed";
                    }
                    else{
                        $r1 = "Not Completed";
                    }
                    if($row3[3] == 1){
                        $r2 = "Completed";
                    }
                    else{
                        $r2 = "Not Completed";
                    }
                    if($row3[4] == 1){
                        $r3 = "Completed";
                    }
                    else{
                        $r3 = "Not Completed";
                    }
                    if($row3[5] == 1){
                        $r4 = "Completed";
                    }
                    else{
                        $r4 = "Not Completed";
                    }
                    if($row3[6] == 1){
                        $r5 = "Completed";
                    }
                    else{
                        $r5 = "Not Completed";
                    }
                    if($row3[7] == 1){
                        $r6 = "Completed";
                    }
                    else{
                        $r6 = "Not Completed";
                    }
                echo"<td>$row3[0] $row3[1]</td>
                <td><input type='checkbox'>$r1</td>
                <td><input type='checkbox'>$r2</td>
                <td><input type='checkbox'>$r3</td>
                <td><input type='checkbox'>$r4</td>
                <td><input type='checkbox'>$r5</td>
                <td><input type='checkbox'>$r6</td>
                ";
                }}
            }
            elseif($row4[0] == (" $id ") ){

                $sql4 = "SELECT  Fname, Lname,Morning_Med,Afternoon_Med, Night_Med, Breakfast, Lunch, Dinner, `Group` FROM Caregiver JOIN  Patient ON Patient.Pat_ID = Caregiver.Pat_ID WHERE `Group` = 'D' ";
            $res_4 = mysqli_query($conn, $sql4);

            if($res_4) {

                while($row4 = mysqli_fetch_row($res_4)) {
                    if($row4[2] == 1){
                        $r1 = "Completed";
                    }
                    else{
                        $r1 = "Not Completed";
                    }
                    if($row4[3] == 1){
                        $r2 = "Completed";
                    }
                    else{
                        $r2 = "Not Completed";
                    }
                    if($row4[4] == 1){
                        $r3 = "Completed";
                    }
                    else{
                        $r3 = "Not Completed";
                    }
                    if($row4[5] == 1){
                        $r4 = "Completed";
                    }
                    else{
                        $r4 = "Not Completed";
                    }
                    if($row4[6] == 1){
                        $r5 = "Completed";
                    }
                    else{
                        $r5 = "Not Completed";
                    }
                    if($row4[7] == 1){
                        $r6 = "Completed";
                    }
                    else{
                        $r6 = "Not Completed";
                    }
                echo"<td>$row4[0] $row4[1]</td>
                <td><input type='checkbox'>$r1</td>
                <td><input type='checkbox'>$r2</td>
                <td><input type='checkbox'>$r3</td>
                <td><input type='checkbox'>$r4</td>
                <td><input type='checkbox'>$r5</td>
                <td><input type='checkbox'>$r6</td>
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


