<?php
session_start();
?>

<?php



// Include the database connection
include 'connect-w-reservation-list.php';

// Start the session to get the current user


// Check if the user is logged in
if (!isset($_SESSION['u_name'])) {
    // Redirect to login page if not logged in
    // header("Location: login.php");
    echo '<script> window.location.href = "login.php";</script>';
    exit;
}
include 'UDASH.php';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            background-image: url('udbg00.png');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .reserved-box {
            text-decoration: none;
            width: 260px;
            height: fit-content;
            padding: 20px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 26px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            margin: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .reserved-box:hover {
            transform: translateY(-10px);
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .cancel-btn {
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cancel-btn:hover {
            background-color: #c82333;
            text-decoration: none;
            color: white;
        }

        .box-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 200px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!-- <h2 class="mb-4">User Dashboard</h2> -->
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
                    echo '<a href="del_reservation.php?title=' . urlencode($row['title1']) . '" class="cancel-btn">Cancel Reservation</a>';
                    echo '</div>';
                }

                if ($row['title2'] !== 'N/A') {
                    echo '<div class="reserved-box">';
                    echo '<h4>' . htmlspecialchars($row['title2']) . '</h4>';
                    echo '<p>Author: ' . htmlspecialchars($row['author2']) . '</p>';
                    echo '<a href="del_reservation.php?title=' . urlencode($row['title2']) . '" class="cancel-btn">Cancel Reservation</a>';
                    echo '</div>';
                }

                if ($row['title3'] !== 'N/A') {
                    echo '<div class="reserved-box">';
                    echo '<h4>' . htmlspecialchars($row['title3']) . '</h4>';
                    echo '<p>Author: ' . htmlspecialchars($row['author3']) . '</p>';
                    echo '<a href="del_reservation.php?title=' . urlencode($row['title3']) . '" class="cancel-btn">Cancel Reservation</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No reserved books found.</p>';
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
