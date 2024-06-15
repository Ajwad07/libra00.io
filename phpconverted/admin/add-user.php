<?php
include 'admin panel.php';
?>
<?php
include 'connect-w-book-list.php'; // Make sure this file includes the connection to your database

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uname = $_POST['u_name'];
    $pwd = $_POST['pwd'];

    // Check for duplicate email or username
    $duplicateCheckSql = "SELECT * FROM `userlist` WHERE email = '$email' OR u_name = '$uname'";
    $duplicateCheckResult = mysqli_query($con, $duplicateCheckSql);

    if (mysqli_num_rows($duplicateCheckResult) > 0) {
        echo "<script>
                alert('Email or Username already taken');
                window.location.href='add-user.php';
            </script>";
    } else {
        // Insert new user data
        $sql = "INSERT INTO `userlist` (name, email, u_name, pwd) VALUES ('$name', '$email', '$uname', '$pwd')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Data inserted successfully
            echo "<script>
                    alert('User added successfully');
                    window.location.href='display-user-list.php';
                </script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Add User</title>
</head>
<style>
    body {
        background-image: url('cbg.jpg');
        background-size: cover;
    }
    /* form{
        width: 80%;
    } */
    .form-group label {
        color: white;
        font-weight: bold;
    }
    .form-group {
        margin-left: 50px;
    }
.btn  {
        margin-left: 50px;
    }
    .form-control::placeholder {
        font-weight: bold;
    }
    /* .form-control {
        width: 75%;
    } */
</style>
<body>
    <div class="container my-5 ml-5 mr-5">
        <form method="post">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" placeholder="Enter Full Name" name="name" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter Username" name="u_name" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="pwd" autocomplete="off" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
