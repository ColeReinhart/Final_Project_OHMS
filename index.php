<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <h1>Welcome to Old Farts and Darts</h1>

    <button class="open-button" onclick="openForm()" name="login" id="login" value="Login">Login</button>
    <a href="register.php" id="register" value="Register">Register </a>  

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h2>Login</h2>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
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
