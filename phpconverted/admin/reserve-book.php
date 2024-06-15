<?php
include 'connect-w-book-list.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Info Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .custom-card {
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            transition: box-shadow 0.3s;
        }

        .custom-card img {
            height: 200px;
            width: 200px;
            margin: auto;
            display: block;
        }

        .book-author {
            color: #777;
            font-size: 1.2em;
            text-align: center;
            margin-top: 5px;
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
            border: 0px;
        }
        .reserved-btn {
            background-color: #28a745;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <?php // php for displaying data in table rowwise
        $SID = $_GET['searchID'];

        $sql = "SELECT * FROM `booklist` WHERE `Title` ='$SID'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // Corrected while loop to fetch a new row on each iteration
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['Title'];
                $author = $row['Author'];
                $cat = $row['Catagory'];
                $tcopy = $row['Total_copy'];
                $acopy = $row['Available_copy'];
                $cover = $row['cover'];
                // $discription=$row['discription'];
                echo '<div class="custom-card text-center">
            <img src=' . $cover . ' alt="Book Cover">
            <h4>' . $title . '</h4>
            <div class="book-author">by ' . $author . '</div> <!-- Author section -->
            <div class="book-description">
               ' . $discription . '
            </div>
            <p>
                Available Copies: ' . $acopy . '<br>Total Copies: ' . $acopy . '
            </p>
            
             <a href="#" class="reserved-btn">Reserved</a>
             <form action="reserve.php" method="POST">
              <input type="hidden" name="title" value='.$title.'>
              <input type="submit" class="reserve-btn" name="Rbtn" value="Reserve This Book"></form>
        </div>';
            }
        } else {
            die("Error executing query: " . mysqli_error($con));
        }
        ?>

    </div>
</body>

</html>