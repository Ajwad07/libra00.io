<?php
include 'UDASH.php';
?>

<?php
include 'connect-w-book-list.php';

// Retrieve the user ID from the URL
$u_id = $_GET['updateid'];

// Fetch the current data of the user from the database
$sql = "SELECT * FROM `userlist` WHERE u_id = '$u_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$u_name = $row['u_name'];
$pwd = $row['pwd'];

// Update the user information if the form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $u_name = $_POST['u_name'];
    $pwd = $_POST['pwd'];

    $sql = "UPDATE `userlist` SET name='$name', email='$email', u_name='$u_name', pwd='$pwd' WHERE u_id = '$u_id'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>
                alert('Update success');
                window.location.href='update-infos.php';
              </script>";
    } else {
        die(mysqli_error($con));
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

    <title>Update User</title>
</head>
<style>
    body {
        background-image: url('cbg.jpeg');
        background-size: cover;
        margin-top: 160px;
    }
    /* form{
        width: 80%;
    } */
    /* .container{
        margin-top: 150px;
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
                <input type="text" class="form-control" placeholder="Enter Full Name" name="name" autocomplete="off" value="<?php echo $name; ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email" autocomplete="off" value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter Username" name="u_name" autocomplete="off" value="<?php echo $u_name; ?>">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="pwd" autocomplete="off" value="<?php echo $pwd; ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
