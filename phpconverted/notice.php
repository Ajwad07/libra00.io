<?php
include("header.php");
include 'connect-w-book-list.php';

if (isset($_GET['SID'])) {
    $id = $_GET['SID'];
    $sql = "SELECT * FROM `notices` WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $content = $row['content'];
        $date_posted = $row['date_posted'];
        $image = $row['image'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice</title>
    <!-- <link rel="stylesheet" href="index1.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: 0;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            background-image: url(catbgnd.png);
        }

        .notice-container {
            padding: 0px;
            width: 80%;
            background-color: #ffffff99;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin: 50px auto;
            /* Add this line to center the container */
        }


        .notice-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .notice-content {
            font-size: 16px;
            margin-bottom: 20px;
            text-align: justify;
        }

        .notice-date {
            font-size: 14px;
            color: #3b1818;
            margin-bottom: 20px;
        }

        .notice-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="notice-container">
        <div class="notice-title"><?php echo $title; ?></div>
        <div class="notice-content"><?php echo $content; ?></div>
        <div class="notice-date">Posted on: <?php echo $date_posted; ?></div>
        <img src="<?php echo $image; ?>" alt="Notice Image" class="notice-image">
    </div>

    <?php include("footer.php"); ?>
</body>

</html>