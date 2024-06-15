<?php
include 'admin panel.php';
?>

<?php
include 'connect-w-book-list.php';

$id = $_GET['updateid'];

$sql = "SELECT * FROM `notices` WHERE id= '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$content = $row['content'];
$author = $row['author'];
$image = $row['image'];

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image = $_POST['image'];

    $sql = "UPDATE `notices` SET title='$title', content='$content', author='$author', image='$image' WHERE id = '$id'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>
                alert('Update success');
                window.location.href='display-notice-list.php';
            </script>";
    } else {
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Update Notice</title>
</head>
<style>
    body {
        background-image: url('cbg.jpg');
        background-size: cover;
    }
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
</style>
<body>
    <div class="container my-5 ml-5 mr-5">
        <form method="post">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter Notice Title" name="title" autocomplete="off" value="<?php echo $title; ?>">
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="5" placeholder="Enter Notice Content" name="content"><?php echo $content; ?></textarea>
            </div>

            <div class="form-group">
                <label>Author</label>
                <input type="text" class="form-control" placeholder="Enter Notice Author" name="author" autocomplete="off" value="<?php echo $author; ?>">
            </div>

            <div class="form-group">
                <label>Image URL</label>
                <input type="text" class="form-control" placeholder="Enter Image URL" name="image" autocomplete="off" value="<?php echo $image; ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
