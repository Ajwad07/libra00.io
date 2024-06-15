<?php
include 'connect-w-book-list.php'; // Include the database connection for user list
session_start(); // Start the session to get the current user

// Check if the user is logged in
if (!isset($_SESSION['u_name'])) {
    // Redirect to login page if not logged in
    echo '<script> window.location.href = "login.php";</script>';
    exit;
}

// Get the current user's name
$username = $_SESSION['u_name'];

// SQL to retrieve the current user's information
$sql = "SELECT * FROM `userlist` WHERE `u_name` = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Include the admin panel
include 'UDASH.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('cbg.jpeg');
        }

        .table {
            background-color: #f8f9fa;
            border: 1px solid #343a40;
        }

        .table th,
        .table td {
            border: 1px solid #343a40;
        }

        .table th {
            background-color: #343a40;
            color: #ffffff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="ml-5 mr-5">
        <div class="container">
            <h2 class="my-5">User Information</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($user) {
                        $u_id = $user['u_id'];
                        $name = $user['name'];
                        $email = $user['email'];
                        $u_name = $user['u_name'];
                        echo '<tr>
                            <th scope="row">' . htmlspecialchars($u_id) . '</th>
                            <td>' . htmlspecialchars($name) . '</td>
                            <td>' . htmlspecialchars($email) . '</td>
                            <td>' . htmlspecialchars($u_name) . '</td>
                            <td>
                                <button class="btn btn-success mt-1">
                                    <a href="update-user.php?updateid=' . urlencode($u_id) . '" class="text-light">Update</a>
                                </button>
                            </td>
                        </tr>';
                    } else {
                        echo '<tr><td colspan="5">No user information found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
