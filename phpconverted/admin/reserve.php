<?php
include 'connect-w-reservation-list.php'; // Adjust the path as necessary

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['u_name'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['u_name'];
$bookTitle = $_POST['title'];

$sql = "SELECT * FROM bookreservation WHERE name = '$username'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // There's an existing row for this user
    $row = mysqli_fetch_assoc($result);

    if ($row['title1'] === 'N/A') {
        $updateSql = "UPDATE bookreservation SET title1 = '$bookTitle', ret1 = '0000-00-00' WHERE name = '$username'";
        mysqli_query($con, $updateSql);
    } elseif ($row['title2'] === 'N/A') {
        $updateSql = "UPDATE bookreservation SET title2 = '$bookTitle', ret2 = '0000-00-00' WHERE name = '$username'";
        mysqli_query($con, $updateSql);
    } elseif ($row['title3'] === 'N/A') {
        $updateSql = "UPDATE bookreservation SET title3 = '$bookTitle', ret3 = '0000-00-00' WHERE name = '$username'";
        mysqli_query($con, $updateSql);
    } else {
        header("Location: dashboard.php");
        exit;
    }
} else {
    $insertSql = "INSERT INTO bookreservation (name, title1, title1_res, ret1, title2, title2_res, ret2, title3, title3_res, ret3) VALUES ('$username', '$bookTitle', 'N', '0000-00-00', 'N/A', 'N', '0000-00-00', 'N/A', 'N', '0000-00-00')";
    mysqli_query($con, $insertSql);
}

header("Location: reservation_success.php");
exit;
?>
