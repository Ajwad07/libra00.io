<?php
include 'connect-w-reservation-list.php';


// session_start();
// if(isset( $_SESSION['u_name']))
// {
// //   echo"<script>
// //               alert('Logout before logging in');
// //               window.location.href='login.php';
// //           </script> ";

// if(isset($_POST['Rbtn']))
// {


// }
// }
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['u_name'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Include database connection
// include 'db_connection.php'; // Adjust the path based on your setup

// Get the username from the session
$username = $_SESSION['u_name'];

// Get the book title from the form
$bookTitle = $_POST['title'];

// Check if there's already a row for this user
$sql = "SELECT * FROM bookreservation WHERE name = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // There's an existing row for this user
    $row = $result->fetch_assoc();

    // Check for empty slots (where title is "N/A")
    if ($row['title1'] === 'N/A') {
        $updateSql = "UPDATE bookreservation SET title1 = ?  WHERE name = ?";
        $stmt = $con->prepare($updateSql);
        $stmt->bind_param('ss', $bookTitle, $username);
        $stmt->execute();
    } elseif ($row['title2'] === 'N/A') {
        $updateSql = "UPDATE bookreservation SET title2 = ? WHERE name = ?";
        $stmt = $con->prepare($updateSql);
        $stmt->bind_param('ss', $bookTitle, $username);
        $stmt->execute();
    } elseif ($row['title3'] === 'N/A') {
        $updateSql = "UPDATE bookreservation SET title3 = ? WHERE name = ?";
        $stmt = $con->prepare($updateSql);
        $stmt->bind_param('ss', $bookTitle, $username);
        $stmt->execute();
    } else {
        // If all slots are taken, redirect to the dashboard
        echo "<script>
                alert('Reservation limit exceeded');
                window.location.href='user-dashboard.php';
            </script>";
           
        // header("Location: user-dashboard.php");
        exit();
    }
} else {
    // No existing row for this user, create a new row
    $insertSql = "INSERT INTO bookreservation (name, title1, title1_res, title2, title2_res, title3, title3_res) VALUES (?, ?, 'N', 'N/A', 'N', 'N/A', 'N')";
    $stmt = $con->prepare($insertSql);
    $stmt->bind_param('ss', $username, $bookTitle);
    $stmt->execute();
}

$stmt->close();
$con->close();

// Redirect to a success page or back to the book list
header("Location: user-dashboard.php");
exit;
?>

