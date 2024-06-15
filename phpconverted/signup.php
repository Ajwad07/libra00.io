<?php
include("header.php");
?>
<?php
// session_start(); // Start the session

$success = 0;
$user = 0;

// Check if a user is already logged in
if (isset($_SESSION['u_name']) && !empty($_SESSION['u_name'])) {
    echo "<script>
        alert('A user is currently logged in.');
        window.location.href='index.php';
    </script>";
    exit();
}

if (isset($_POST['submit'])) {
    include 'connect-w-user-list.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uname = $_POST['u_name'];
    $pwd = $_POST['pwd'];

    // Check if any field is empty
    if (empty($name) || empty($email) || empty($uname) || empty($pwd)) {
        echo "<script>
            alert('All fields are required.');
            window.location.href='signup.php';
        </script>";
        exit();
    }

    $sql = "SELECT * FROM `userlist` WHERE u_name='$uname'";
    $result = mysqli_query($con, $sql);
    $emailcheck = mysqli_query($con, "SELECT * FROM `userlist` WHERE email='$email'");

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "<script>
                alert('Username taken');
                window.location.href='signup.php';
            </script>";
            exit();
        }
    }

    if (mysqli_num_rows($emailcheck) > 0) {
        echo "<script>
            alert('Email already in use');
            window.location.href='signup.php';
        </script>";
        exit();
    } else {
        $sql = "INSERT INTO `userlist`(name, email, u_name, pwd) VALUES ('$name', '$email', '$uname', '$pwd')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>
                alert('Sign up success');
                window.location.href='login.php';
            </script>";
            exit();
        } else {
            die(mysqli_error($con));
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Sign Up</title>
    <link rel="stylesheet" href="signup1.css">
</head>

<body>
    <div class="signup-container">
        <div class="signup-box">
            <h2>Sign Up</h2>
            <form action="signup.php" method="POST">
                <input type="text" placeholder="Full Name" name="name">
                <input type="text" placeholder="Email" name="email">
                <input type="text" placeholder="Username" name="u_name">
                <input type="password" placeholder="Password" name="pwd">
                <input type="submit" value="Sign Up" name="submit">
            </form>
        </div>
    </div>
</body>

</html>

<?php
include("footer.php");
?>
