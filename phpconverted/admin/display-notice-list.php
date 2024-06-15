<?php
include 'connect-w-book-list.php';
?>
<?php
include 'admin panel.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Notices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<style>
    body {
        background-image: url('cbg.jpg');
    }
    .container a {
        text-decoration: none;
    
    }
    .container a:hover{
        text-decoration: none;
    }

    /* custom.css */
    .table {
        background-color: #f8f9fa;
        /* Light gray background color */
        border: 1px solid #343a40;
        /* Dark gray border color */
    }

    .table th,
    .table td {
        border: 1px solid #343a40;
        /* Dark gray border color for table cells */
    }

    .table th {
        background-color: #343a40;
        /* Dark gray background for header */
        color: #ffffff;
        /* White text color for header */
    }

    .table tbody tr:nth-child(even) {
        background-color: #e9ecef;
        /* Light gray background for even rows */
    }
    .ml-5{
        margin-left: 10px;
    }
</style>

<body>
    <div class="ml-5 mr-5">
        <div class="container">
            <button class="btn btn-primary my-5"><a href="add-notices.php" class="text-light">Add Notice</a></button>

            <?php // for search php
            echo '
        <form class="d-flex mb-5">
            <input class="form-control me-2" type="search" placeholder="Search notices by title" name="sid" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        ';
            // include 'connect.php';

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['sid'])) {
                $SID = $_GET['sid'];
                echo '<script>window.location.href = "singledisplay-notice-list.php?searchID=' . $SID . '";</script>';
            }
            
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date Posted</th>
                        <th scope="col">Image</th>
                        <th scope="col">Update/delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php // php for displaying data in table rowwise
                    $sql = "Select * from `notices`";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $content = $row['content'];
                            $author = $row['author'];
                            $date_posted = $row['date_posted'];
                            $image = $row['image'];
                            echo '<tr>
                     <th scope="row">' . $id . '</th>
                     <td>' . $title . '</td>
                     <td>' . $content . '</td>
                     <td>' . $author . '</td>
                     <td>' . $date_posted . '</td>
                     <td><img src="' . $image . '" alt="Notice Image" style="max-width: 100px;height:100px;"></td>
                     <td>
                     <button class
                     ="btn btn-success mt-1" ><a href="update-notice-list.php?updateid=' . $id . '"class
                     ="text-light">update</a></button>
                     <button class
                     ="btn btn-danger mt-1" ><a href="delete-notice-list.php?deleteid=' . $id . '"class
                     ="text-light">delete</a></button>
                 </td>
                   </tr>
                     ';
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>

    </script>
</body>

</html>
