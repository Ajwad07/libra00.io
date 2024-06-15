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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-image: url('cbg.jpg');
        /* margin-top: 160px; */
        /* margin-left: 20px; */
    }
    .container{
        padding-left: 75px;
        padding-right: 1px;
        padding-top: 50px;

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
                        <th scope="col">Title</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Author</th>
                        <th scope="col">Catagory</th>
                        <th scope="col">Total copy</th>
                        <th scope="col">Available copy</th>
                        <th scope="col">Update/delete</th>
                    </tr>
                </thead>
                <?php // php for displaying data in table rowwise
                $SID = $_GET['searchID'];

                $sql = "SELECT * FROM `booklist` WHERE `Title` LIKE '%$SID%'";
                $result = mysqli_query($con, $sql);
                
                if ($result) {
                    // Corrected while loop to fetch a new row on each iteration
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Retrieve data from the row
                        $title = $row['Title'];
                        $author = $row['Author'];
                        $cat = $row['Catagory'];
                        $tcopy = $row['Total_copy'];
                        $acopy = $row['Available_copy'];
                        $cover = $row['cover'];
                
                        // Display data in table rows
                        echo '<tr>
                            <th scope="row">' . $title . '</th>
                            <td><img src="' . $cover . '" alt="Book Cover" style="max-width: 100px; height: 100px;"></td>
                            <td>' . $author . '</td>
                            <td>' . $cat . '</td>
                            <td>' . $tcopy . '</td>
                            <td>' . $acopy . '</td>
                            <td>
                                <button class="btn btn-success mt-1">
                                    <a href="update-book-list.php?updateid=' . $title . '" class="text-light">Update</a>
                                </button>
                                <button class="btn btn-danger mt-1">
                                    <a href="delete-book-list.php?deleteid=' . $title . '" class="text-light">Delete</a>
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

?>