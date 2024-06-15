<?php
include 'admin panel.php';
?>
<?php
include 'connect-w-book-list.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Display Notice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<style>
    body {
        background-image: url('cbg.jpg');
    }
    .container{
        padding-left: 60px;
        padding-right: 1px;
        padding-top: 30px;
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
    <div class="container  my-5 mr-5 ml-5">
        <table class="table">

            <tbody>
                <thead>
                    <tr>
                        <!-- <th scope="col">Sl no</th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date Posted</th>
                        <th scope="col">Image</th>
                        <th scope="col">Update/delete</th>
                    </tr>
                </thead>
                <?php // php for displaying data in table rowwise
                $SID = $_GET['searchID'];

                $sql = "SELECT * FROM `notices` WHERE `title` LIKE '%$SID%'";
                $result = mysqli_query($con, $sql);
                
                if ($result) {
                    // Corrected while loop to fetch a new row on each iteration
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Retrieve data from the row
                        $id = $row['id'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $author = $row['author'];
                        $date_posted = $row['date_posted'];
                        $image = $row['image'];
                
                        // Display data in table rows
                        echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $title . '</td>
                            <td>' . $content . '</td>
                            <td>' . $author . '</td>
                            <td>' . $date_posted . '</td>
                            <td><img src="' . $image . '" alt="Notice Image" style="max-width: 100px;height:100px;"></td>
                            <td>
                                <button class="btn btn-success mt-1">
                                    <a href="update-notice-list.php?updateid=' . $id . '" class="text-light">Update</a>
                                </button>
                                <button class="btn btn-danger mt-1">
                                    <a href="delete-notice-list.php?deleteid=' . $id . '" class="text-light">Delete</a>
                                </button>
                            </td>
                        </tr>';
                    }
                } else {
                    die("Error executing query: " . mysqli_error($con));
                }
                

                ?>

            </tbody>
        </table>
    </div>
</body>

</html>
