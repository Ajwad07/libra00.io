<?php
include 'admin panel.php';
?>

<?php

include 'connect-w-book-list.php';

if (isset($_POST['submit']))
{
    $Title=$_POST['Title'];
    $Author=$_POST['Author'];
    $Catagory=$_POST['Catagory'];
    $Total_copy=$_POST['Total_copy'];
    $Available_copy=$_POST['Available_copy'];
    $cover=$_POST['cover'];

    // Check if any field is blank
    if (empty($Title) || empty($Author) || empty($Catagory) || empty($Total_copy) || empty($Available_copy) || empty($cover)) {
        echo "<script>
                alert('All fields are required');
                window.location.href='add-book.php';
            </script>";
    } else {
        // Check for duplicate title
        $duplicateCheckSql = "SELECT * FROM `booklist` WHERE Title = '$Title'";
        $duplicateCheckResult = mysqli_query($con, $duplicateCheckSql);

        if (mysqli_num_rows($duplicateCheckResult) > 0) {
            echo "<script>
                    alert('Book with this title already exists');
                    window.location.href='add-book.php';
                </script>";
        } else {
            // Insert the book data
            $sql = "insert into `booklist`(Title,Author,Catagory,Total_copy,Available_copy,cover) values(' $Title','$Author','$Catagory','$Total_copy','$Available_copy','$cover')";
            $result=mysqli_query($con,$sql);

            if($result)
            {
                echo '<script>window.location.href = "display-book-list.php";</script>';
            }
            else{
                die(mysqli_error($con));
            }
        }
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
    <div class="container my-5 ml-5 mr-5 mx-auto">
        <form method="post">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter Book Title" name="Title" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Author</label>
                <input type="text" class="form-control" placeholder="Enter Book Author" name="Author" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Catagory</label>
                <input type="text" class="form-control" placeholder="Enter Book Catagory" name="Catagory" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Total copy</label>
                <input type="text" class="form-control" placeholder="Enter Total book copy" name="Total_copy" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Available copy</label>
                <input type="text" class="form-control" placeholder="Enter Available book copy" name="Available_copy" autocomplete="off">
            </div>

            <div class="form-group">
                <label>ADD cover url</label>
                <input type="text" class="form-control" name="cover" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        </form>
    </div>
</body>

</html>