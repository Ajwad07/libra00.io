<?php
include 'connect-w-book-list.php'; // Ensure this file includes your database connection

if (isset($_GET['deleteid'])) {
    $u_id = $_GET['deleteid'];

    $sql = "DELETE FROM `userlist` WHERE u_id = '$u_id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>
                alert('Delete success');
                window.location.href='display-user-list.php';
              </script>";
    } else {
        die(mysqli_error($con));
    }
}
?>
