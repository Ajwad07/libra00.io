<?php
include 'connect-w-reservation-list.php'; // Adjust the path as necessary

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['u_name'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['u_name'];
$bookTitle = $_GET['title'];

$sql = "SELECT * FROM bookreservation WHERE name = '$username'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($row['title1'] === $bookTitle) {
        $updateSql = "UPDATE bookreservation SET title1 = 'N/A', ret1 = '0000-00-00' WHERE name = '$username'";
        mysqli_query($con, $updateSql);
    } elseif ($row['title2'] === $bookTitle) {
        $updateSql = "UPDATE bookreservation SET title2 = 'N/A', ret2 = '0000-00-00' WHERE name = '$username'";
        mysqli_query($con, $updateSql);
    } elseif ($row['title3'] === $bookTitle) {
        $updateSql = "UPDATE bookreservation SET title3 = 'N/A', ret3 = '0000-00-00' WHERE name = '$username'";
        mysqli_query($con, $updateSql);
    }
}

mysqli_close($con);

echo '<script>alert("Reservation canceled!"); window.location.href = "user-dashboard.php";</script>';
exit;
?>
