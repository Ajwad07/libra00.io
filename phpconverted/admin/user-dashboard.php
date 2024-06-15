<?php
// Include the database connection
include 'connect-w-reservation-list.php';

// Start the session to get the current user
session_start();

// Check if the user is logged in
if (!isset($_SESSION['u_name'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Get the current user's name
$username = $_SESSION['u_name'];

// SQL to retrieve the reserved book information and related details from the booklist
$sql = "
SELECT br.title1, bl1.Author AS author1,
       br.title2, bl2.Author AS author2,
       br.title3, bl3.Author AS author3
FROM bookreservation br
LEFT JOIN booklist bl1 ON br.title1 = bl1.Title
LEFT JOIN booklist bl2 ON br.title2 = bl2.Title
LEFT JOIN booklist bl3 ON br.title3 = bl3.Title
WHERE br.name = ?
";

// Prepare the SQL statement and bind the username
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .reserved-box {
            width: 300px;
            height: 200px;
            padding: 20px;
            background: white;
            border: 1px solid #ccc;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2); /* 3D effect */
            margin: 10px; /* Space between boxes */
            transition: box-shadow 0.3s;
        }

        .cancel-btn {
            background-color: #dc3545; /* Red color */
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cancel-btn:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        .box-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>User Dashboard</h2>
        <div class="box-container">
            <?php
            // Fetch data from the query and create boxes for reserved books
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Check and display reserved books based on the titles
                if ($row['title1'] !== 'N/A') {
                    echo '<div class="reserved-box">';
                    echo '<h4>' . htmlspecialchars($row['title1']) . '</h4>';
                    echo '<p>Author: ' . htmlspecialchars($row['author1']) . '</p>';
                    echo '<a href="cancel-reservation.php?title=' . urlencode($row['title1']) . '" class="cancel-btn">Cancel Reservation</a>';
                    echo '</div>';
                }

                if ($row['title2'] !== 'N/A') {
                    echo '<div class="reserved-box">';
                    echo '<h4>' . htmlspecialchars($row['title2']) . '</h4>';
                    echo '<p>Author: ' . htmlspecialchars($row['author2']) . '</p>';
                    echo '<a href="cancel-reservation.php?title=' . urlencode($row['title2']) . '" class="cancel-btn">Cancel Reservation</a>';
                    echo '</div>';
                }

                if ($row['title3'] !== 'N/A') {
                    echo '<div class="reserved-box">';
                    echo '<h4>' . htmlspecialchars($row['title3']) . '</h4>';
                    echo '<p>Author: ' . htmlspecialchars($row['author3']) . '</p>';
                    echo '<a href="cancel-reservation.php?title=' . urlencode($row['title3']) . '" class="cancel-btn">Cancel Reservation</a>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
