<?php
include 'admin panel.php';
?>

<?php
include 'connect-w-book-list.php';

$title = $_GET['updateid'];

$sql = "SELECT * FROM `booklist` WHERE Title= '$title'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$title = $row['Title'];
$author = $row['Author'];
$cat = $row['Catagory'];
$tcopy = $row['Total_copy'];
$acopy = $row['Available_copy'];
$cover = $row['cover'];

if (isset($_POST['submit'])) {
    $Title = $_POST['Title'];
    $Author = $_POST['Author'];
    $Catagory = $_POST['Catagory'];
    $Total_copy = $_POST['Total_copy'];
    $Available_copy = $_POST['Available_copy'];
    $cover = $_POST['cover'];

    $sql = "UPDATE `booklist` SET Title='$Title', Author='$Author', Catagory='$Catagory', Total_copy='$Total_copy', Available_copy='$Available_copy', cover='$cover' WHERE Title = '$title'";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>
                alert('Update success');
                window.location.href='display-book-list.php';
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

    <title>Curd operation</title>
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
    <div class="container my-5 ml-5 mr-5">
        <form method="post">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter Book Title" name="Title" autocomplete="off" value="<?php echo $title; ?>">
            </div>

            <div class="form-group">
                <label>Author</label>
                <input type="text" class="form-control" placeholder="Enter Book Author" name="Author" autocomplete="off" value="<?php echo $author; ?>">
            </div>

            <div class="form-group">
                <label>Catagory</label>
                <input type="text" class="form-control" placeholder="Enter Book Catagory" name="Catagory" autocomplete="off" value="<?php echo $cat; ?>">
            </div>

            <div class="form-group">
                <label>Total copy</label>
                <input type="text" class="form-control" placeholder="Enter Total book copy" name="Total_copy" autocomplete="off" value="<?php echo $tcopy; ?>">
            </div>

            <div class="form-group">
                <label>Available copy</label>
                <input type="text" class="form-control" placeholder="Enter Available book copy" name="Available_copy" autocomplete="off" value="<?php echo $acopy; ?>">
            </div>
            <div class="form-group">
                <label>ADD cover url</label>
                <input type="text" class="form-control" placeholder="Enter Cover URL" name="cover" autocomplete="off" value="<?php echo $cover; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
