<?php
include 'admin panel.php';
?>
<?php
include 'connect-w-book-list.php';
?>

<?php


if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image = $_POST['image'];

    // Check if any field is blank
    if (empty($title) || empty($content) || empty($author) || empty($image)) {
        echo "<script>
                alert('All fields are required');
                window.location.href='add-notices.php';
            </script>";
    } else {
        // Check for duplicate title
        $duplicateCheckSql = "SELECT * FROM `notices` WHERE title = '$title'";
        $duplicateCheckResult = mysqli_query($con, $duplicateCheckSql);

        if (mysqli_num_rows($duplicateCheckResult) > 0) {
            echo "<script>
                    alert('Notice with this title already exists');
                    window.location.href='add-notices.php';
                </script>";
        } else {
            // Insert the notice data
            $sql = "INSERT INTO `notices` (title, content, author, image) VALUES ('$title', '$content', '$author', '$image')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                // Data inserted successfully
                echo "<script>
                        alert('Notice added successfully');
                        window.location.href='display-notice-list.php';
                    </script>";
            } else {
                die(mysqli_error($con));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Notice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<style>
    body {
        background-image: url('cbg.jpg');
        background-size: cover;
    }
    /* form{
        width: 80%;
    } */
    .form-group label {
        color: white;
        font-weight: bold;
    }
    .form-group {
        margin-left: 50px;
    }
.btn  {
        margin-left: 50px;
    }
    .form-control::placeholder {
        font-weight: bold;
    }
    /* .form-control {
        width: 75%;
    } */
</style>

<body>
    <div class="ml-5 mr-5 my-5">
        <div class="container">
            <button class="btn btn-primary my-5" style="display: none;"><a href="add-notice.php" class="text-light">Add Notice</a></button>

            <form method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Notice Title">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Enter Notice Content"></textarea>
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Enter Notice Author">
                </div>

                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image" placeholder="Enter Image URL">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
    <script>

    </script>
</body>

</html>
