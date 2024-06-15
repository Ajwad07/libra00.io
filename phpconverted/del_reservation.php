<?php
session_start();

// Include the database connection
include 'connect-w-reservation-list.php';

// Get the reservation title from the URL
$title = $_GET['title'];

// SQL to check if the title matches title1, title2, or title3
$sql = "SELECT title1, title2, title3
        FROM bookreservation
        WHERE title1 = '$title' OR title2 = '$title' OR title3 = '$title'";
$result = $con->query($sql);
$result = $result->fetch_assoc();

// Check if the title matches title1, title2, or title3
if ($result['title1'] == $title) {
    $update_sql = "UPDATE bookreservation SET title1 = 'N/A' WHERE name = '".$_SESSION['u_name']."' ";
    $con->query($update_sql);
} elseif ($result['title2'] == $title) {
    $update_sql = "UPDATE bookreservation SET title2 = 'N/A' WHERE name = '".$_SESSION['u_name']."' ";
    $con->query($update_sql);
} elseif ($result['title3'] == $title) {
    $update_sql = "UPDATE bookreservation SET title3 = 'N/A' WHERE name = '".$_SESSION['u_name']."' ";
    $con->query($update_sql);
}

// Redirect to user dashboard
header("Location: user-dashboard.php");
exit;
?>
