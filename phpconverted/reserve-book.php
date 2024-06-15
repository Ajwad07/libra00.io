<?php
include("header.php");
?>
<?php
include 'connect-w-book-list.php';

// Start the session to get the current user
// session_start();

// Check if the user is logged in
if (!isset($_SESSION['u_name'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Get the current user's name
$username = $_SESSION['u_name'];

// Get the book title from GET parameter
if (isset($_GET['SID'])) {
    $SID = intval($_GET['SID']);
}

// SQL query to retrieve book information from booklist
$sql = "SELECT * FROM `booklist` WHERE `id` = '$SID'";
$result = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Info Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('catbgnd.png');
            color: white;
            background-size: cover;
            
        }

        .custom-card {
            box-shadow: 0px 1px 28px rgba(4, 4, 4, 6.2);
            padding: 20px;
            transition: box-shadow 0.3s;
            border-radius: 30px;
            border: 4px outset #47f593a3;
           
        }

        .custom-card>h4 {
            color: #ebebeb;
            font-size: 2em;
            margin-top: 4px;
            font-weight: 600;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        .custom-card>p {
            color: #fff1ce;
            font-size: 1.2em;
            margin-top: 4px;
            font-weight: 500;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        .custom-card:hover {
            box-shadow: 0px 1px 28px rgba(4, 4, 4, 6.2);
        }

        .custom-card img {
            height: 200px;
            width: auto;
            margin: auto;
            display: block;
        }

        .book-author {
            color: #e9ecef;
            font-size: 1.6em;
            text-align: center;
            margin-top: 5px;
            font-weight: 700;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        .book-description {
            text-align: center;
            font-style: italic;
            color: #555;
            margin-top: 10px;
        }

        .reserve-btn {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .reserve-btn:hover {
            background-color: white;
            color: #007bff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .reserved-btn {
            background-color: #28a745;
            /* Green */
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .reserved-btn:hover {
            background-color: #28a745;
            /* Green */
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['Title'];
                $author = $row['Author'];
                $cover = $row['cover'];
                // $description = $row['description'];

                // Check if the book is reserved by the current user
                $checkSql = "SELECT * FROM `bookreservation` WHERE `name` = '$username' AND ('$title' = `title1` OR '$title' = `title2` OR '$title' = `title3`)";
                $checkResult = mysqli_query($con, $checkSql);
                $isReserved = mysqli_num_rows($checkResult) > 0;

                echo '<div class="custom-card text-center">';
                echo '<img src="' . $cover . '" alt="Book Cover">';
                echo '<h4>' . $title . '</h4>';
                echo '<div class="book-author">by ' . $author . '</div>';
                // echo '<div class="book-description">' . $description . '</div>';
                echo '<p>Available Copies: ' . $row['Available_copy'] . '<br>Total Copies: ' . $row['Total_copy'] . '</p>';

                if ($isReserved) {
                    echo '<a href="user-dashboard.php" class="reserved-btn">Reserved</a>';
                } else {
                    echo '<form action="reserve.php" method="POST">';
                    echo '<input type="hidden" name="title" value="' . $title . '">';
                    echo '<input type="submit" class="reserve-btn" name="Rbtn" value="Reserve This Book">';
                    echo '</form>';
                }

                echo '</div>';
            }
        } else {
            die("Error executing query: " . mysqli_error($con));
        }
        ?>
    </div>
</body>

</html>
<?php
include("footer.php");
?>