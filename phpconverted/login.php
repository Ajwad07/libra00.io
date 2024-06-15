<?php
include("header.php");

if (isset($_POST['submit'])) {
    include 'connect-w-user-list.php';
    $name = $_POST['u_name'];
    $pwd = $_POST['pwd'];

    // Check if the user is already logged in
    if (isset($_SESSION['u_name'])) {
        echo "<script>
                alert('Logout before logging in');
                window.location.href='login.php';
            </script>";
        exit();
    }

    // Fetch the user details from the database
    $result = mysqli_query($con, "SELECT * FROM `userlist` WHERE u_name='$name' AND pwd='$pwd'");

    if (mysqli_num_rows($result)) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['u_name'] = $name;
        $_SESSION['email'] = $user['email']; // Assuming the email is also fetched and stored in the session

        // Check if the logged-in user is an admin
        if (strpos($user['email'], '@lib.com') !== false) {
            echo "<script>
                    window.location.href='/phpconverted/admin/count.php';
                </script>";
        } else {
            echo "<script>
                    window.location.href='index.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('Incorrect username or password');
                window.location.href='login.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="login4.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Login</h2>
      <form action="login.php" method="POST">
        <div class="textbox">
          <input type="text" placeholder="Username" name="u_name" required>
        </div>
        <div class="textbox">
          <input type="password" placeholder="Password" name="pwd" required>
        </div>
        <input type="submit" class="btn" name="submit" value="Login">
      </form>
      <a href="forgetpass.html" class="admin-btn">Forgot password</a>
      <a href="signup.php" class="signup-btn">Sign Up</a>
    </div>
  </div>

<?php
include("footer.php");
?>

</body>
</html>
